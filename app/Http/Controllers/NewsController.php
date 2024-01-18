<?php

namespace App\Http\Controllers;

use App\Models\ComCodes;
use App\Models\News;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\File as Files;
use Illuminate\Support\Facades\Storage;

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
        $categori = ComCodes::where('code_group', 'kategori_news')->orderBy('code_nm', 'ASC')->pluck('code_nm', 'code_cd');
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
        $validated = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
        ]);

        $id = News::create($validated + ['upload_by' => auth()->user()->id]);

        if ($request->document) {
            foreach ($request->document as $df) {
                Files::create([
                    'id_news' => $id->id,
                    'path' => env('LOKASI_FILE') . '/news/' . $df,
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
        $categori = ComCodes::where('code_group', 'kategori_news')->orderBy('code_nm', 'ASC')->pluck('code_nm', 'code_cd');
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

        $data = News::find($id);
        $data->slug = null;

        $data->update($validated + ['upload_by' => auth()->user()->id]);

        if ($request->document) {
            foreach ($request->document as $df) {
                Files::create([
                    'id_news' => $id,
                    'path' => env('LOKASI_FILE') . '/news/' . $df,
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
                // Delete the file
                Storage::disk('gcs')->delete(env('LOKASI_FILE') . '/news/' . $value->file_name);
            }
        }

        $data = News::find($id);
        // delete related
        $data->gambar()->delete();

        return $data->delete();
    }
}
