<?php

namespace App\Http\Controllers;

use App\Models\ComCodes;
use App\Models\News;
use App\Models\File;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = News::latest('date');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('news.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> Edit</a>
                        <a href="' . route('news.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> Delete</a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'tgl',
                    function ($data) {
                        $actionBtn = '<center>' .
                            \Carbon\Carbon::parse($data->date)->toFormattedDateString()
                            . '</center>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action', 'tgl'])
                ->make(true);
        }
        return view('back.a.pages.news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $highlight = ComCodes::where('code_group', 'highlight_news')->pluck('code_nm');
        return view('back.a.pages.news.create', compact('highlight'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|max:12048',
                'title' => 'required',
                'date' => 'required',
                'description' => 'required',
                'highlight' => 'required',
            ]);

            $file = $request->file('photo');

            $name = uniqid() . '_' . trim($file->getClientOriginalName());

            $path = $file->storeAs('/news/', $name, 'gcs');

            $data = [
                'photo' => $name,
                'path' => $path,
                'title' => $request->title,
                'date' => $request->date,
                'highlight' => $request->highlight,
                'upload_by' => auth()->user()->name,
                'description' => $request->description,
                'slug' => SlugService::createSlug(News::class, 'slug', $request->title),
            ];
        } else {
            $request->validate([
                'title' => 'required',
                'date' => 'required',
                'description' => 'required',
                'highlight' => 'required',
            ]);
            $data = [
                'title' => $request->title,
                'date' => $request->date,
                'upload_by' => auth()->user()->name,
                'description' => $request->description,
                'highlight' => $request->highlight,
                'slug' => SlugService::createSlug(News::class, 'slug', $request->title),
            ];
        }
        News::create($data);
        return redirect(route('news.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = News::find($id);
        $highlight = ComCodes::where('code_group', 'highlight_news')->pluck('code_nm');
        return view('back.a.pages.news.edit', compact('data', 'highlight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|max:12048',
                'title' => 'required',
                'description' => 'required',
                'highlight' => 'required',
                'date' => 'required',
            ]);
            $gambar = News::where('id', $id)->first();
            if ($request->file('photo')->getClientOriginalName() != $gambar->photo) {
                Storage::disk('gcs')->delete($gambar->path);

                $file = $request->file('photo');

                $name = uniqid() . '_' . trim($file->getClientOriginalName());

                $path = $file->storeAs('/news/', $name, 'gcs');

                $data = [
                    'photo' => $name,
                    'path' => $path,
                    'title' => $request->title,
                    'date' => $request->date,
                    'highlight' => $request->highlight,
                    'upload_by' => auth()->user()->name,
                    'description' => $request->description,
                ];
            }
        } else {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'highlight' => 'required',
                'date' => 'required',
            ]);
            $data = [
                'title' => $request->title,
                'date' => $request->date,
                'highlight' => $request->highlight,
                'upload_by' => auth()->user()->name,
                'description' => $request->description,
            ];
        }
        News::find($id)->update($data);
        return redirect(route('news.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = News::where('id', $id)->get();

        if (Storage::disk('gcs')->exists($gambar->path)) {
            // Delete the file
            Storage::disk('gcs')->delete($gambar->path);
        }

        $data = News::find($id);

        return $data->delete();
    }

    public function insert(Request $request)
    {
        $data = DB::table('posting')->get();
        foreach ($data as $dt) {
            $file = DB::table('attachment')
                ->where('id_tabel', $dt->id_posting)
                ->get();
            foreach ($file as $f) {
                $fi = [
                    'id_news' => $f->id_tabel,
                    'file_name' => $f->file_name,
                ];
                File::create($fi);
            }
            $pk = [
                'title' => $dt->judul_posting,
                'date' => $dt->created_time,
                'upload_by' => auth()->user()->name,
                'description' => $dt->isi_posting,
                'attachment' => $dt->id_posting,
                'slug' => SlugService::createSlug(News::class, 'slug', $dt->judul_posting),
            ];
            News::create($pk);
        }
        return 'selesai';
    }
}
