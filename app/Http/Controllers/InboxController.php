<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Inbox::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $data->status == '0' ? $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('inbox.edit', $data->id) . ' " class="btn btn-simple btn-success btn-icon"><i class="material-icons">done_outline</i> Mark As Read</a>
                    </div>' : $actionBtn = '';
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'status',
                    function ($data) {
                        $data->status == '0' ? $st = '<span class="label label-danger">Unread</span>' : $st = '<span class="label label-info">Read</span>';
                        return $st;
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
                ->rawColumns(['action', 'tgl', 'status'])
                ->make(true);
        }
        return view('back.a.pages.inbox.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function show(Inbox $inbox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Inbox::find($id)->update(['status' => 1]);
        return redirect(route('inbox.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Inbox::destroy($id);
        return $data;
    }
}
