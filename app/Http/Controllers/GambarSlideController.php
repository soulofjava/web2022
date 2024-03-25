<?php

namespace App\Http\Controllers;

use App\Models\GambarSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.sneat.pages.slide.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $path = $file->storeAs('gambar_slide', $name, 'gcs');

        GambarSlide::insert([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
            'path' => $path
        ]);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
            'path' => $path
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = GambarSlide::where('idne', $id)->get();
        foreach ($data as $d) {
            $fileList[] = [
                'name'          => $d->name,
                'size'          => Storage::size(($d->path)),
                'path'          => route('helper.show-picture', array('path' => $d->path))
            ];
        }
        return json_encode($fileList ?? []);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GambarSlide $gambarSlide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GambarSlide $gambarSlide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = GambarSlide::where('name', $id)->first();

        if ($data) {
            $data->delete();
        }

        // Delete the file
        Storage::delete('gambar_slide/' . $id);

        return response()->json([
            'response' => 'File terhapus'
        ]);
    }
}
