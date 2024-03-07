<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\DownloadAreaFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Download::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="text-center">
                        <a href="' . route('download.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="bx bx-edit"></i> </a>
                        <a href="' . route('download.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="bx bxs-trash"></i> </a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.sneat.pages.download.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.sneat.pages.download.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
        ]);

        $id = Download::create($validated + ['upload_by' => auth()->user()->id]);

        if ($request->document) {
            foreach ($request->document as $df) {
                DownloadAreaFile::create([
                    'download_area_id' => $id->id,
                    'file_path' =>  'download-area/' . $df,
                    'file_name' => $df
                ]);
            }
        }

        return redirect(route('download.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Download $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Download::find($id);
        return view('back.sneat.pages.download.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
        ]);

        Download::find($id)->update($validated + ['upload_by' => auth()->user()->id]);

        if ($request->document) {
            foreach ($request->document as $df) {
                DownloadAreaFile::create([
                    'download_area_id' => $id,
                    'file_path' =>  'download-area/' . $df,
                    'file_name' => $df
                ]);
            }
        }

        return redirect(route('download.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gambar = Download::with('files')->where('id', $id)->first();

        // delete files
        foreach ($gambar->files as $value) {
            Storage::disk('gcs')->delete('download-area/' . $value->file_name);
        }

        // delete related
        $gambar->files()->delete();

        $data = Download::find($id);
        return $data->delete();
    }
}
