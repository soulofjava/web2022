<?php

namespace App\Http\Controllers;

use App\Models\BukuPedoman;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BukuPedomanController extends Controller
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
            $data = BukuPedoman::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="text-center">
                        <a href="' . route('bukupetunjuk.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="bx bx-edit"></i> </a>
                        <a href="' . route('bukupetunjuk.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="bx bxs-trash"></i> </a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.' . $this->themes->themes_back . '.pages.bukupetunjuk.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.' . $this->themes->themes_back . '.pages.bukupetunjuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'foto' => 'required'
        ]);

        $file = $request->file('foto');
        $name = $request->file('foto')->getClientOriginalName();
        $path = $file->storeAs('struktur', $name, 'gcs');

        BukuPedoman::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'path_foto' => $path
        ]);

        return redirect(route('bukupetunjuk.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(BukuPedoman $bukuPedoman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = BukuPedoman::find($id);
        return view('back.' . $this->themes->themes_back . '.pages.bukupetunjuk.edit', compact('data'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BukuPedoman $bukuPedoman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = BukuPedoman::find($id)->first();
        
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
