<?php

namespace App\Http\Controllers;

use App\Models\ComRegion;
use Illuminate\Http\Request;

class ComRegionController extends Controller
{
    public function kabupaten(Request $request)
    {
        $kabupaten = ComRegion::where("region_root", $request->kabupaten)->pluck('region_nm', 'region_cd');
        return response()->json($kabupaten);
    }

    public function kecamatan(Request $request)
    {
        $kecamatan = ComRegion::where("region_root", $request->kecamatan)->pluck('region_nm', 'region_cd');
        return response()->json($kecamatan);
    }

    public function kelurahan(Request $request)
    {
        $kelurahan = ComRegion::where("region_root", $request->kelurahan)->pluck('region_nm', 'region_cd');
        return response()->json($kelurahan);
    }
}
