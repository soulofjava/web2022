<?php

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
