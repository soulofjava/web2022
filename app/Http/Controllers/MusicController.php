<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Music::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('music.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> Edit</a>
                        <a href="' . route('music.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> Delete</a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'tgl',
                    function ($data) {
                        $actionBtn = '<center>' .
                            \Carbon\Carbon::parse($data->date)->toFormattedDateString()
                            . '</center>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action', 'tgl'])
                ->make(true);
        }

        return view('back.a.pages.music.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.a.pages.music.create');
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
            'ranking' => 'required',
            'song' => 'required',
            'years' => 'required',
            'artist' => 'required',
        ]);
        $data = [
            'ranking' => $request->ranking,
            'song' => $request->song,
            'years' => $request->years,
            'artist' => $request->artist,
        ];
        Music::create($data);
        return redirect(route('music.index'))->with(['success' => 'Data added successfully!']);
    }



    /**
     * Display the specified resource.
     
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function show(Music $music)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Music::find($id);
        return view('back.a.pages.music.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ranking' => 'required',
            'song' => 'required',
            'years' => 'required',
            'artist' => 'required',
        ]);
        $data = [
            'ranking' => $request->ranking,
            'song' => $request->song,
            'years' => $request->years,
            'artist' => $request->artist,
        ];
        Music::find($id)->update($data);
        return redirect(route('music.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Music::find($id);
        return $data->delete();
    }
}
