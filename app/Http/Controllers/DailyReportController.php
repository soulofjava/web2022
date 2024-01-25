<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DailyReport::latest('date');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('daily.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> Edit</a>
                        <a href="' . route('daily.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> Delete</a>
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
                ->addColumn(
                    'jam',
                    function ($data) {
                        $actionBtn = '<center>' .
                            $data->t_start . ' - ' . $data->t_end
                            . ' WIB </center>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action', 'tgl', 'jam'])
                ->make(true);
        }
        return view('back.a.pages.daily.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.a.pages.daily.create');
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
            'date' => 'required',
            't_start' => 'required',
            't_end' => 'required',
            'location' => 'required',
            'personnel' => 'required',
            'report' => 'required'
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|max:12048',
            ]);

            $file = $request->file('photo');

            $name = uniqid() . '_' . trim($file->getClientOriginalName());

            $path = $file->storeAs('/gallery/', $name, 'gcs');

            $data = [
                'pic_name' => $name,
                'path' => $path,
                'date' => $request->date,
                't_start' => $request->t_start,
                't_end' => $request->t_end,
                'location' => $request->location,
                'personnel' => $request->personnel,
                'report' => $request->report
            ];
        } else {
            $data = [
                'date' => $request->date,
                't_start' => $request->t_start,
                't_end' => $request->t_end,
                'location' => $request->location,
                'personnel' => $request->personnel,
                'report' => $request->report,
            ];
        }

        DailyReport::create($data);

        return redirect(route('daily.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DailyReport  $dailyReport
     * @return \Illuminate\Http\Response
     */
    public function show(DailyReport $dailyReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DailyReport  $dailyReport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DailyReport::find($id);
        return view('back.a.pages.daily.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DailyReport  $dailyReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            't_start' => 'required',
            't_end' => 'required',
            'location' => 'required',
            'personnel' => 'required',
            'report' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|max:12048',
            ]);
            $gambar = DailyReport::where('id', $id)->first();
            if ($request->file('photo')->getClientOriginalName() != $gambar->pic_name) {
                Storage::disk('gcs')->delete($gambar->path);

                $file = $request->file('photo');

                $name = uniqid() . '_' . trim($file->getClientOriginalName());

                $path = $file->storeAs('/gallery/', $name, 'gcs');
                $data = [
                    'pic_name' => $name,
                    'path' => $path,
                    'date' => $request->date,
                    't_start' => $request->t_start,
                    't_end' => $request->t_end,
                    'location' => $request->location,
                    'personnel' => $request->personnel,
                    'report' => $request->report
                ];
            }
        } else {
            $data = [
                'date' => $request->date,
                't_start' => $request->t_start,
                't_end' => $request->t_end,
                'location' => $request->location,
                'personnel' => $request->personnel,
                'report' => $request->report,
            ];
        }

        DailyReport::find($id)->update($data);
        return redirect(route('daily.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyReport  $dailyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = DailyReport::where('id', $id)->get();

        if (Storage::disk('gcs')->exists($gambar->path)) {
            // Delete the file
            Storage::disk('gcs')->delete($gambar->path);
        }

        $data = DailyReport::find($id);

        return $data->delete();
    }
}
