<?php

use App\Models\Simpeg\Tb01;

if (!function_exists('get_code_group')) {
    function get_code_group($code)
    {
        return \App\Models\ComCodes::where('code_group', $code)->pluck('code_nm', 'code_cd');
    }
}

// if (!function_exists('provinsi')) {
//     function provinsi($code)
//     {
//         return \App\Models\ComRegion::where("region_level", 1)->where("region_cd", $code)->pluck('region_nm', 'region_cd');
//     }
// }

if (!function_exists('get_prov')) {
    function get_prov()
    {
        return \App\Models\ComRegion::where("region_level", 1)->pluck('region_nm', 'region_cd');
    }
}

if (!function_exists('get_kab')) {
    function get_kab($code)
    {
        return \App\Models\ComRegion::where("region_root", $code)->pluck('region_nm', 'region_cd');
    }
}

if (!function_exists('get_kec')) {
    function get_kec($code)
    {
        return \App\Models\ComRegion::where("region_root", $code)->pluck('region_nm', 'region_cd');
    }
}

if (!function_exists('get_kel')) {
    function get_kel($code)
    {
        return \App\Models\ComRegion::where("region_root", $code)->pluck('region_nm', 'region_cd');
    }
}

function jmlpegawai()
{
    $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])->count();

    return $data;
}

function jmlpns()
{
    $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])->where('idstspeg', 2)->count();

    return $data;
}

function jmlstruktural()
{
    $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])
        ->where('idjenjab', '>', 4)
        ->where('idstspeg', 2)->count();

    return $data;
}

function jmlpelaksana()
{
    $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])
        ->where('idjenjab', 3)
        ->where('idstspeg', 2)->count();

    return $data;
}

function jmlfungsional()
{
    $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])
        ->where('idjenjab', 2)
        ->where('idstspeg', 2)->count();

    return $data;
}

function jmlpensiunblnini()
{
    $data = Tb01::where('idjenkedudupeg', 99)
        ->whereMonth('tmtpens', date('m'))
        ->whereYear('tmtpens', date('Y'))
        ->count();

    return $data;
}

function jmlpppk()
{
    $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])->where('idstspeg', 3)->count();

    return $data;
}

function jmlcpns()
{
    $data = Tb01::whereNotIn('idjenkedudupeg', [21, 99])->where('idstspeg', 1)->count();

    return $data;
}
