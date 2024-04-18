<?php

namespace App\Http\Controllers;

use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tag::orderBy('name', 'ASC');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'kategorine',
                    function ($data) {
                        return strtoupper($data->name);
                    }
                )
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('kategori.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> Edit</a>
                        <a href="' . route('kategori.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> Delete</a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action', 'kategorine'])
                ->make(true);
        }
        return view('back.a.pages.kategori.index');
    }

    public function create()
    {
        return view('back.a.pages.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Tag::create([
            'name' => $request->name,
        ]);

        return redirect(route('kategori.index'))->with(['success' => 'Data added successfully!']);
    }

    public function edit($id)
    {
        $data = Tag::find($id);
        return view('back.a.pages.kategori.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Tag::find($id)->update([
            'name' => $request->name,
        ]);

        return redirect(route('kategori.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    public function destroy($id)
    {
        Tag::destroy($id);
    }
}
