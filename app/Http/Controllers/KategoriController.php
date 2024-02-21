<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Website;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
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
            $data = Kategori::orderBy('name', 'ASC');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="text-center">
                        <a href="' . route('kategori.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="bx bx-edit"></i> </a>
                        <a href="' . route('kategori.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="bx bxs-trash"></i> </a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.' . $this->themes->themes_back . '.pages.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.sneat.pages.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Kategori::create([
            'name' => $request->name,
        ]);
        return redirect(route('kategori.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Kategori::find($id);
        return view('back.' . $this->themes->themes_back . '.pages.kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        Kategori::find($id)->update($data);
        return redirect(route('kategori.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kategori::destroy($id);
    }
}
