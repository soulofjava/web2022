<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Testimonial::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="text-center">
                        <a href="' . route('testimoni.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="bx bx-edit"></i> </a>
                        <a href="' . route('testimoni.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="bx bxs-trash"></i> </a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.pages.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'profile_photo_path' => 'required|image|max:12048',
            'nama' => 'required',
            'pesan' => 'required',
            'jabatan' => 'required',
        ]);

        $myimage = $request->profile_photo_path->getClientOriginalName();
        $path = $request->profile_photo_path->storeAs('/news/', $myimage, 'gcs');

        Testimonial::insert([
            'nama' => $request->nama,
            'pesan' => $request->pesan,
            'jabatan' => $request->jabatan,
            'nama_foto' => $myimage,
            'lokasi_foto' => $path,
        ]);

        return redirect(route('testimoni.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Testimonial::find($id);
        return view('back.pages.testimonial.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile(['profile_photo_path'])) {
            $request->validate([
                'profile_photo_path' => 'required|image|max:12048',
                'nama' => 'required',
                'pesan' => 'required',
                'jabatan' => 'required',
            ]);
            $gambar = Testimonial::find($id);
            if (Storage::disk('gcs')->exists($gambar->lokasi_foto)) {
                Storage::disk('gcs')->delete($gambar->lokasi_foto);
            }
            $myimage = $request->profile_photo_path->getClientOriginalName();
            $path = $request->profile_photo_path->storeAs('/news/', $myimage, 'gcs');
            $data = ([
                'nama' => $request->nama,
                'pesan' => $request->pesan,
                'jabatan' => $request->jabatan,
                'nama_foto' => $myimage,
                'lokasi_foto' => $path,
            ]);
        } else {
            $request->validate([
                'nama' => 'required',
                'pesan' => 'required',
                'jabatan' => 'required',
            ]);
            $data = ($request->except('_method', '_token'));
        }
        Testimonial::find($id)->update($data);
        return redirect(route('testimoni.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Testimonial::find($id);

        if (Storage::disk('gcs')->exists($data->lokasi_foto)) {
            Storage::disk('gcs')->delete($data->lokasi_foto);
        }

        return $data->delete();
    }
}
