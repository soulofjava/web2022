<?php

namespace App\Http\Controllers;

use App\Models\Personil;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PersonilController extends Controller
{
    public function __construct()
    {
        $this->themes = Website::all()->first();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Personil::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="text-center">
                        <a href="' . route('personil.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="bx bx-edit"></i> </a>
                        <a href="' . route('personil.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="bx bxs-trash"></i> </a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.' . $this->themes->themes_back . '.pages.personil.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.' . $this->themes->themes_back . '.pages.personil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'required'
        ]);

        $file = $request->file('foto');
        $name = $request->file('foto')->getClientOriginalName();
        $path = $file->storeAs('foto_personil', $name, 'gcs');

        Personil::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'path_foto' => $path
        ]);

        return redirect(route('personil.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Personil $personil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Personil::find($id);
        return view('back.' . $this->themes->themes_back . '.pages.personil.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required'
        ]);
        
        $isa =  Personil::find($id);

        // Handle the file upload if a new file is provided
        if ($file = $request->file('foto')) {
            Storage::delete($isa->path_foto); // Delete the old file
            $path = $file->storeAs('foto_personil', $file->getClientOriginalName(), 'gcs');
            $isa->path_foto = $path;
        }

        // Update the remaining fields
        $isa->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'path_foto' => $isa->path_foto ?? $isa->getOriginal('path_foto') // Retain the original if no new file
        ]);

        return redirect(route('personil.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Personil::find($id)->first();

        if ($data) {
            // Delete the file
            Storage::delete($data->path_foto);
            $data->delete();
        }

        return response()->json([
            'response' => 'File terhapus'
        ]);
    }
}
