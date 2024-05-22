<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FrontMenu;
use App\Models\News;
use App\Models\Simpeg\Tb01;

class ApiController extends Controller
{
    public function personil()
    {
        return view('api.listperson');
    }

    public function jmlpegawai()
    {
        $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])->count();

        return $data;
    }

    public function jmlpns()
    {
        $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])->where('idstspeg', 2)->count();

        return $data;
    }

    public function jmlstruktural()
    {
        $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])
            ->where('idjenjab', '>', 4)
            ->where('idstspeg', 2)->count();

        return $data;
    }

    public function jmlpelaksana()
    {
        $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])
            ->where('idjenjab', 3)
            ->where('idstspeg', 2)->count();

        return $data;
    }

    public function jmlfungsional()
    {
        $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])
            ->where('idjenjab', 2)
            ->where('idstspeg', 2)->count();

        return $data;
    }

    public function jmlpensiunblnini()
    {
        $data = Tb01::where('idjenkedudupeg', 99)
            ->whereMonth('tmtpens', date('m'))
            ->whereYear('tmtpens', date('Y'))
            ->count();

        return $data;
    }

    public function jmlpppk()
    {
        $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])->where('idstspeg', 3)->count();

        return $data;
    }

    public function jmlcpns()
    {
        $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])->where('idstspeg', 1)->count();

        return $data;
    }

    public function menu()
    {
        return response()->json(FrontMenu::all(), 200);
    }

    public function news()
    {
        return response()->json(News::all(), 200);
    }
}
