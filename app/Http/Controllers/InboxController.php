<?php

namespace App\Http\Controllers;

use App\Jobs\BalasEmailInbox;
use App\Jobs\KirimEmailInbox;
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
            $data = Inbox::orderBy('created_at', 'DESC');
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
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Inbox::find($id);
        return view('back.a.pages.inbox.edit', compact('data'));
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
        $validated = $request->validate([
            'balasan' => 'required',
        ]);

        $data = Inbox::find($id);
        $data->update($validated + ['status' => 1]);
        BalasEmailInbox::dispatch($data);
        return redirect(route('inbox.index'))->with(['success' => 'Balasan sudah berhasil dikirim!']);
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
