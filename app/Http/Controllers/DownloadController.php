<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use File;
use Illuminate\Support\Facades\Storage;

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
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('download.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> Edit</a>
                        <a href="' . route('download.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> Delete</a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.a.pages.download.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.a.pages.download.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required',
        ]);

        $file = $request->file('file');
        $path = $file->store('download-area', 'public');

        Download::create([
            'judul' => $request->judul,
            'path' => $path,
            'upload_by' => auth()->user()->id
        ]);
        return redirect(route('download.index'))->with(['success' => 'Data berhasil ditambahkan!']);
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
        return view('back.a.pages.download.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required'
        ]);

        $datane = Download::find($id);

        if ($request->file) {
            if (Storage::exists($datane->path)) {
                Storage::delete($datane->path);
            }

            $file = $request->file('file');
            $path = $file->store('download-area', 'public');

            $datane->update([
                'judul' => $request->judul,
                'path' => $path,
            ]);
        }

        $datane->update(['judul' => $request->judul]);

        return redirect(route('download.index'))->with(['success' => 'Data berhasil ditambahkan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Download::find($id);

        if (Storage::exists($data->path)) {
            Storage::delete($data->path);
        }

        return $data->delete();
    }
}
