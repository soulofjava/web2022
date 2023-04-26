<?php

namespace App\Http\Controllers;

use App\Models\DownloadArea;
use App\Models\DownloadAreaFile;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use File;
use Illuminate\Support\Facades\Storage;

class DownloadAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DownloadArea::with('usernya', 'files')->orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('download_area.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> Edit</a>
                        <a href="' . route('download_area.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> Delete</a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'tgl',
                    function ($data) {
                        $actionBtn = '<center>' .
                            \Carbon\Carbon::parse($data->created_at)->toFormattedDateString()
                            . '</center>';
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'filenya',
                    function ($data) {
                        $actionBtn = '<a href="' . Storage::url($data->files->file_path)  . '">' . $data->files->file_name . '</a>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action', 'tgl', 'filenya'])
                ->make(true);
        }
        return view('back.a.pages.download_area.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.a.pages.download_area.create');
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
            'judul' => 'required',
            'sumber' => 'required',
        ]);

        $id = DownloadArea::create($validated + ['upload_by' => auth()->user()->id]);

        if ($request->document) {
            foreach ($request->document as $df) {
                $path = storage_path('app/public/download-area');

                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                File::move(storage_path('tmp/uploads/') . $df, storage_path('app/public/download-area/') . $df);
                DownloadAreaFile::create([
                    'download_area_id' => $id->id,
                    'file_path' => 'download-area/' . $df,
                    'file_name' => $df
                ]);
            }
        }
        return redirect(route('download_area.index'))->with(['success' => 'Data berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DownloadArea  $downloadArea
     * @return \Illuminate\Http\Response
     */
    public function show(DownloadArea $downloadArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DownloadArea  $downloadArea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DownloadArea::find($id);
        return view('back.a.pages.download_area.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DownloadArea  $downloadArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'sumber' => 'required',
        ]);

        DownloadArea::find($id)->update($validated + ['upload_by' => auth()->user()->id]);

        if ($request->document) {
            foreach ($request->document as $df) {
                File::move(storage_path('tmp/uploads/') . $df, storage_path('app/public/download-area/') . $df);
                DownloadAreaFile::create([
                    'download_area_id' => $id,
                    'file_path' => 'download-area/' . $df,
                    'file_name' => $df
                ]);
            }
        }

        return redirect(route('download_area.index'))->with(['success' => 'Data berhasil diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DownloadArea  $downloadArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(DownloadArea $downloadArea)
    {
        //
    }
}
