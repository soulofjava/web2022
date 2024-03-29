<?php

namespace App\Http\Controllers;

use App\Models\FrontMenu;
use App\Models\Website;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Efectn\Menu\Models\Menus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FrontMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FrontMenu::with('menu_induk')->where('id', '>', 1);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '<div class="text-center">
                        <a href="' . route('frontmenu.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="bx bx-edit"></i> </a>
                          <a href="' . route('frontmenu.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="bx bxs-trash"></i> </a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'orang_tua',
                    function ($data) {
                        $actionBtn = $data->menu_induk->menu_name;
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'aksi',
                    function ($data) {

                        if ($data->active == 1) {
                            $actionBtn = '<center><div class="togglebutton">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked onclick="centang('  . $data->id . ')">
                                </label>
                                </div></center>';
                        } else {
                            $actionBtn = '<center><div class="togglebutton">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" onclick="centang('  . $data->id . ')">
                                </label>
                                </div></center>';
                        }
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action', 'orang_tua', 'aksi'])
                ->make(true);
        }
        return view('back.pages.frontmenu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $root = FrontMenu::pluck('menu_name', 'id');
        return view('back.pages.frontmenu.create', compact('root'));
    }

    public function menu_builder()
    {
        $menulist = Menus::all()->pluck('name', 'id');
        return view('back.pages.frontmenu.menu', compact('menulist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->acb) {
            $data = [
                'menu_parent' => $request->menu_parent,
                'menu_name' => $request->menu_name,
                'menu_url' => $request->menu_url,
                'link' => 1
            ];
        } else {
            $data = [
                'menu_parent' => $request->menu_parent,
                'menu_name' => $request->menu_name,
                'menu_url' => Str::slug($request->menu_name),
                'content' => $request->content,
                'link' => 0
            ];
        }

        FrontMenu::insert($data);

        return redirect(route('frontmenu.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontMenu  $frontMenu
     * @return \Illuminate\Http\Response
     */
    public function show(FrontMenu $frontMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontMenu  $frontMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FrontMenu::find($id);
        $root = FrontMenu::pluck('menu_name', 'id');
        return view('back.pages.frontmenu.edit', compact('data', 'root'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontMenu  $frontMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $o = FrontMenu::find($id);

        if ($request->acb) {
            $o->content = null;
            $data = [
                'menu_parent' => $request->menu_parent,
                'menu_name' => $request->menu_name,
                'menu_url' => $request->menu_url,
                'link' => 1
            ];
        } else {
            $data = [
                'menu_parent' => $request->menu_parent,
                'menu_name' => $request->menu_name,
                'menu_url' => Str::slug($request->menu_name),
                'content' => $request->content,
                'link' => 0
            ];
        }

        $o->update($data);

        return redirect(route('frontmenu.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontMenu  $frontMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FrontMenu::find($id);

        if ($data->anaknya()->count() > 0) {
            // Prevent deletion because there are associated children
            return back()->with('message', 'Cannot delete parent with associated children.');
        } else {
            $data = FrontMenu::destroy($id);
        }

        return $data;
    }

    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = FrontMenu::select('id', 'menu_name')->where('menu_name', 'LIKE', '%' . $cari . '%')->get();
        } else {
            $data = FrontMenu::all();
        }
        return response()->json($data);
    }

    public function changeAccess(Request $request)
    {
        $comp = FrontMenu::find($request->id);
        if ($comp->active == 1) {
            DB::table('front_menus')
                ->where('id', $comp->id)
                ->update(['active' => 0]);
        } else {
            DB::table('front_menus')
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
