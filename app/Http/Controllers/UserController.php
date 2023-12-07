<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (Auth::user()->getRoleNames()->first() == 'superadmin') {
                $data = User::where('id', '!=', auth()->user()->id);
            } else if (Auth::user()->getRoleNames()->first() == 'admin') {
                $data = User::role(['admin', 'user'])->where('id', '!=', auth()->user()->id);
            } else {
                $data = User::role('user')->where('id', '!=', auth()->user()->id);
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('user.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> edit</a>
                        <a href="' . route('user.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> delete</a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'rrole',
                    function ($data) {
                        return $data->getRoleNames()->first();
                    }
                )
                ->rawColumns(['action', 'rrole'])
                ->make(true);
        }
        return view('back.a.pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = ModelsRole::all()->pluck('name', 'id')->skip(1);
        $permission = Permission::all()->pluck('name', 'id');
        $bidang = Bidang::orderBy('name', 'asc')->pluck('name', 'id');
        return view('back.a.pages.user.create', compact('role', 'bidang', 'permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed']
            ]
        );

        $data = [
            'name' => $request->name,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'bidang_id' => $request->bidang_id,
            'user_phone' => $request->user_phone,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($data);

        if ($request->role) {
            $user->assignRole($request->role);
        } else {
            $user->assignRole('user');
        }

        if ($request->permission) {
            $user->givePermissionTo($request->permission);
        }

        return redirect(route('user.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        $role = ModelsRole::all()->pluck('name', 'id');
        $user_role = $data->roles->pluck('id');
        $bidang = Bidang::orderBy('name', 'asc')->pluck('name', 'id');
        $permission = Permission::all()->pluck('name', 'id');
        $permis = $data->getAllPermissions();
        return view('back.a.pages.user.edit', compact('data', 'role', 'user_role', 'bidang', 'permission', 'permis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => 'required|email|unique:users,email,' . $id . ',id',
                // 'bidang_id' => ['required']
            ]
        );

        if ($request->filled('current_password') || $request->filled('new_password') || $request->filled('new_confirm_password')) {
            $request->validate([
                'current_password' => ['required', Hash::check($request->password, $user->password)],
                'new_password' => ['required', 'min:8'],
                'new_confirm_password' => ['same:new_password'],
            ]);
            $data = ($request->except('_method', '_token', 'current_password', 'new_password', 'new_confirm_password') + ['password' => Hash::make($request->new_password)]);
        } else {
            $data = ($request->except('_method', '_token', 'current_password', 'new_password', 'new_confirm_password'));
        }

        if ($request->role) {
            $user->syncRoles($request->role);
        } else {
            $user->syncRoles('user');
        }

        if ($request->permission) {
            $user->syncPermissions($request->permission);
        }

        $user->update($data);
        return redirect(route('user.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::destroy($id);
        return $data;
    }
}
