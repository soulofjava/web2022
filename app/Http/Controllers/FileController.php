<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $path = $file->storeAs(env('LOKASI_FILE') . '/news/', $name, 'gcs');

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
            'path' => $path
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\file  $file
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = News::with('gambar')->where('id', $id)->first();
        foreach ($data->gambar as $d) {
            $fileList[] = [
                'name'          => $d->file_name,
                'size'          => Storage::disk('gcs')->url($d->path),
                'path'          => $d->path
            ];
        }
        return json_encode($fileList ?? []);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\file  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(file $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\file  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, file $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\file  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = File::where('file_name', $id)->first();

        if ($data) {
            $data->delete();
        }

        // Delete the file
        Storage::disk('gcs')->delete(env('LOKASI_FILE') . '/news/' . $id);

        return response()->json([
            'response' => 'File terhapus'
        ]);
    }
}
