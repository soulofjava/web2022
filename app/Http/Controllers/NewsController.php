<?php

namespace App\Http\Controllers;

use App\Models\ComCodes;
use App\Models\News;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use App\Models\File as Files;
use File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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
                    'link',
                    function ($data) {
                        $actionBtn = '
                    <div>
                        <a target="_blank" href="' . url('news-detail', $data->slug) . ' " >' . $data->title . ' </a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
<<<<<<< HEAD
                        <a href="' . route('news.edit', $data->id) . ' " class="mdc-button mdc-button--outlined shaped-button outlined-button--primary mdc-ripple-upgraded">Edit</a>
                        <a href="' . route('news.destroy', $data->id) . ' " class="mdc-button mdc-button--outlined shaped-button outlined-button--primary mdc-ripple-upgraded delete-data-table">Delete</a>
                    ';
=======
                    <div class="text-center">
                        <a href="' . route('news.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="bx bx-edit"></i> </a>
                        <a href="' . route('news.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="bx bxs-trash"></i> </a>
                    </div>';
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
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
                ->rawColumns(['action', 'tgl', 'link'])
                ->make(true);
        }
<<<<<<< HEAD
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('back.a.pages.news.index');
=======
        return view('back.pages.news.index');
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
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
        return view('back.pages.news.create', compact('highlight', 'categori'));
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

<<<<<<< HEAD
        $id = News::create($request->except(['_token', 'document', 'tag']) + ['upload_by' => auth()->user()->id]);

        // tagging postingan
        $id->tag($request->tag);
=======
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
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e

        if ($request->document) {
            foreach ($request->document as $df) {
                Files::create([
                    'id_news' => $id->id,
                    'path' =>  '/news/' . $df,
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
    public function show($id)
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
<<<<<<< HEAD
        $terpilih = [];

        $highlight = ComCodes::where('code_group', 'HIGHLIGHT_NEWS')->pluck('code_nm');
        $categori = ComCodes::where('code_group', 'KATEGORI_NEWS')->orderBy('code_nm', 'ASC')->pluck('code_nm', 'code_cd');

        // untuk list yang terpilih
        foreach ($data->tagged as $key => $value) {
            array_push($terpilih, strtoupper($value->tag_name));
        }

        return view('back.a.pages.news.edit', compact('data', 'highlight', 'categori', 'terpilih'));
=======
        $highlight = ComCodes::where('code_group', 'highlight_news')->pluck('code_nm');
        $categori = ComCodes::where('code_group', 'kategori_news')->orderBy('code_nm', 'ASC')->pluck('code_nm', 'code_cd');
        return view('back.pages.news.edit', compact('data', 'highlight', 'categori'));
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
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

<<<<<<< HEAD
        $data = News::find($id);
        $data->slug = null;

        $data->update($request->except(['_token', 'document', 'tag']) + ['upload_by' => auth()->user()->id]);

        // tag ulang postingan
        $data->retag($request->tag);
=======
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
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e

        if ($request->document) {
            foreach ($request->document as $df) {
                Files::create([
                    'id_news' => $id,
                    'path' =>  '/news/' . $df,
                    'file_name' => $df
                ]);
            }
        }
        Alert::success('Sukses', 'Data berhasil diubah.');
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
                Storage::disk('gcs')->delete('/news/' . $value->file_name);
            }
        }

        $data = News::find($id);
        // delete related
        $data->gambar()->delete();
        $data->delete();
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
