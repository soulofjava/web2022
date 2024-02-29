<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ComponentController extends Controller
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
            $data = Component::orderBy('name', 'ASC');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        if ($data->active == 1) {
                            $actionBtn = '<center><div class="togglebutton">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" checked onclick="centang('  . $data->id . ')">
                                                    <span class="toggle"></span>
                                                </label>
                                            </div></center>';
                        } else {
                            $actionBtn = '<center>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" onclick="centang('  . $data->id . ')">
                                                    <span class="toggle"></span>
                                                </label>
                                            </div></center>';
                        }
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.' . $this->themes->themes_back . '.pages.component.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.a.pages.component.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function show(Component $component)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function edit(Component $component)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Component $component)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Component::destroy($id);
        return $data;
    }

    public function changeAccess(Request $request)
    {
        $comp = Component::find($request->id);
        if ($comp->active == 1) {
            DB::table('components')
                ->where('id', $comp->id)
                ->update(['active' => 0]);
        } else {
            DB::table('components')
                ->where('id', $comp->id)
                ->update(['active' => 1]);
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'Data has been successfully changed!'
            ]
        );
    }
}
