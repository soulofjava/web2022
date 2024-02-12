<?php

namespace App\Http\Controllers;

use App\Models\ComCodes;
use App\Models\News;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use App\Models\File as Files;
use Conner\Tagging\Model\Tag;
use File;

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
            $data = News::orderBy('date', 'DESC');
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
                ->addColumn(
                    'publish',
                    function ($data) {
                        if ($data->publish) {
                            $actionBtn = '<center>Ya</center>';
                        } else {
                            $actionBtn = '<center>Tidak</center>';
                        }
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action', 'tgl', 'publish'])
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
        $categori = Tag::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('back.a.pages.news.create', compact('highlight', 'categori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
        ]);

        if ($request->datadip) {
            $id = News::create($request->except(['_token', 'datadip']) + ['dip' => true, 'upload_by' => auth()->user()->id]);
        } else {
            $id = News::create($val + [
                'kategori' => 'INFORMASI_ST_02',
                'upload_by' => auth()->user()->id,
                'publish' => $request->publish ?? 0
            ]);
        }

        if ($request->document) {
            foreach ($request->document as $df) {
                Files::create([
                    'id_news' => $id->id,
                    'path' => 'news/' . $df,
                    'file_name' => $df
                ]);
            }
        }
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
        $categori = Tag::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('back.a.pages.news.edit', compact('data', 'highlight', 'categori'));
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
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $isa =  News::with('gambar')->get()->find($id);
        $isa->slug =  null;

        if ($request->datadip) {
            foreach ($isa->gambar as $key) {
                if (Storage::exists($key->path)) {
                    Storage::delete($key->path);
                }
                Files::destroy($key->id);
            }

            $isa->update($request->except(['_token', 'datadip']) + ['dip' => true, 'upload_by' => auth()->user()->id]);
        } else {
            $isa->update($validated + [
                'kategori' => 'INFORMASI_ST_02',
                'dip' => false,
                'dip_tahun' => null,
                'upload_by' => auth()->user()->id,
                'publish' => $request->publish ?? 0
            ]);
        }

        if ($request->document) {
            foreach ($request->document as $df) {
                Files::create([
                    'id_news' => $id,
                    'path' => 'news/' . $df,
                    'file_name' => $df
                ]);
            }
        }

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
        $gambar = News::with('gambar')->where('id', $id)->get();
        foreach ($gambar as $key) {
            foreach ($key->gambar as $value) {
                if (Storage::exists($value->path)) {
                    Storage::delete($value->path);
                }
            }
        }

        $data = News::find($id);
        // delete related
        $data->gambar()->delete();

        return $data->delete();
    }
}
