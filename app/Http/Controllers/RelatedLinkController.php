<?php

namespace App\Http\Controllers;

use App\Models\RelatedLink;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class RelatedLinkController extends Controller
{
    public function __construct()
    {
        $this->themes = Website::all()->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RelatedLink::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="text-center">
                        <a href="' . route('relatedlink.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="bx bx-edit"></i> </a>
                        <a href="' . route('relatedlink.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="bx bxs-trash"></i> </a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.' . $this->themes->themes_back . '.pages.related.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.' . $this->themes->themes_back . '.pages.related.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = $request->file('logo')->getClientOriginalName();
            $path = $file->storeAs('link_terkait', $name, 'gcs');
        }

        RelatedLink::create([
            'name' => $request->name,
            'url' => $request->url,
            'logo' => $name ?? '',
            'path_logo' => $path ?? ''
        ]);

        return redirect(route('relatedlink.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RelatedLink  $relatedLink
     * @return \Illuminate\Http\Response
     */
    public function show(RelatedLink $relatedLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RelatedLink  $relatedLink
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RelatedLink::find($id);
        return view('back.' . $this->themes->themes_back . '.pages.related.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RelatedLink  $relatedLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);

        $data = RelatedLink::where('id', $id)->first();

        if ($request->hasFile('logo')) {
            if (Storage::exists($data->path_logo)) {
                Storage::delete($data->path_logo);
            }

            $file = $request->file('logo');
            $name = $request->file('logo')->getClientOriginalName();
            $path = $file->storeAs('link_terkait', $name, 'gcs');

            $data->update([
                'name' => $request->name,
                'url' => $request->url,
                'logo' => $name,
                'path_logo' => $path
            ]);
        } else {
            $data->update([
                'name' => $request->name,
                'url' => $request->url,
            ]);
        }

        return redirect(route('relatedlink.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RelatedLink  $relatedLink
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = RelatedLink::find($id)->first();
        if (Storage::exists($gambar->path_logo)) {
            Storage::delete($gambar->path_logo);
        }
        $data = RelatedLink::destroy($id);
        return $data;
    }
}
