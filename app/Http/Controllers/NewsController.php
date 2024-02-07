<?php

namespace App\Http\Controllers;

use App\Models\ComCodes;
use App\Models\News;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Models\File as Files;
use App\Models\Website;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->themes = Website::all()->first();
    }

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
                    <div class="text-center">
                        <a href="' . route('news.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="bx bx-edit"></i> </a>
                        <a href="' . route('news.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="bx bxs-trash"></i> </a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'tgl',
                    function ($data) {
                        $actionBtn = '<center>' .
                            \Carbon\Carbon::parse($data->date)->isoFormat('dddd, D MMMM Y')
                            . '</center>';
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'link',
                    function ($data) {
                        $actionBtn = '
                    <div>
                        <a target="_blank" href="' . url('news-detail', $data->slug) . ' " >' . $data->title . ' </a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action', 'tgl', 'link'])
                ->make(true);
        }
        return view('back.' . $this->themes->themes_back . '.pages.news.index');
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
        return view('back.' . $this->themes->themes_back . '.pages.news.create', compact('highlight', 'categori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'content' => 'required',
        ]);

        if ($request->datadip) {
            $id = News::create([
                'title' => $request->title,
                'date' => $request->date,
                'content' => $request->content,
                'terbit' => $request->terbit ?? 0,
                'komentar' => $request->komentar ?? 0,
                'highlight' => $request->highlight ?? 0,
                'kategori' => $request->kategori,
                'dip' => true,
                'dip_tahun' => $request->dip_tahun,
                'upload_by' => auth()->user()->id
            ]);
        } else {
            $id = News::create([
                'title' => $request->title,
                'date' => $request->date,
                'content' => $request->content,
                'terbit' => $request->terbit ?? 0,
                'komentar' => $request->komentar ?? 0,
                'highlight' => $request->highlight ?? 0,
                'kategori' => 'INFORMASI_ST_02',
                'dip' => false,
                'dip_tahun' => null,
                'upload_by' => auth()->user()->id
            ]);
        }

        if ($request->document) {
            foreach ($request->document as $df) {
                Files::create([
                    'id_news' => $id->id,
                    'path' =>  'news/' . $df,
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
        return view('back.' . $this->themes->themes_back . '.pages.news.edit', compact('data', 'highlight', 'categori'));
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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
        ]);

        $isa =  News::find($id);

        if ($request->datadip) {
            $isa->slug =  null;
            $isa->update([
                'title' => $request->title,
                'date' => $request->date,
                'content' => $request->content,
                'terbit' => $request->terbit ?? 0,
                'komentar' => $request->komentar ?? 0,
                'highlight' => $request->highlight ?? 0,
                'kategori' => $request->kategori,
                'dip' => true,
                'dip_tahun' => $request->dip_tahun,
                'upload_by' => auth()->user()->id
            ]);
        } else {
            $isa->slug =  null;
            $isa->update([
                'title' => $request->title,
                'date' => $request->date,
                'content' => $request->content,
                'terbit' => $request->terbit ?? 0,
                'komentar' => $request->komentar ?? 0,
                'highlight' => $request->highlight ?? 0,
                'kategori' => 'INFORMASI_ST_02',
                'dip' => false,
                'dip_tahun' => null,
                'upload_by' => auth()->user()->id
            ]);
        }

        if ($request->document) {
            foreach ($request->document as $df) {
                Files::create([
                    'id_news' => $id,
                    'path' =>  '/news/' . $df,
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
