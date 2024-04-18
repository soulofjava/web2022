<?php

namespace App\Http\Controllers;

use App\Models\PinjamTempat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;
use App\Mail\UpdateStatusNotification;



class PinjamTempatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PinjamTempat::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('pinjamtempat.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> Edit</a>
                        <a href="' . route('pinjamtempat.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> Delete</a>
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
                    'stat',
                    function ($data) {
                        if ($data->status == 'STATUS_ST_01') {
                            $actionBtn = '<center><span class="badge" style="background-color:grey">Menunggu Persetujuan</span></center>';
                        } elseif ($data->status == 'STATUS_ST_02') {
                            $actionBtn = '<center><span class="badge" style="background-color:green">Disetujui</span></center>';
                        } elseif ($data->status == 'STATUS_ST_03') {
                            $actionBtn = '<center><span class="badge" style="background-color:red">Ditolak</span></center>';
                        } else {
                            $actionBtn = '<center><span class="badge" style="background-color:blue">Dibatalkan</span></center>';
                        }
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action', 'tgl', 'stat'])
                ->make(true);
        }
        return view('back.a.pages.pinjamtempat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect(route('pinjamtempat.index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = PinjamTempat::find($id);
        return view('back.a.pages.pinjamtempat.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        PinjamTempat::find($id)->update([
            'status' => $request->status,
            'catatan' => $request->catatan
        ]);

        // Kirim email notifikasi setelah update
        $data = PinjamTempat::with('statuse')->find($id); // Ambil data pinjaman yang telah diupdate
        $email = $data->email; // Ambil alamat email dari data pinjaman

        // Kirim email hanya jika alamat email tersedia
        if ($email) {
            Mail::to($email)->send(new UpdateStatusNotification($data)); // Kirim email menggunakan template mail UpdateStatusNotification
        }

        return redirect(route('pinjamtempat.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PinjamTempat::destroy($id);
    }
}
