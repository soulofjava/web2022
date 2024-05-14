<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FrontMenu;
use App\Models\News;
use App\Models\Simpeg\Tb01;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function personil()
    {
        return view('api.listperson');
    }

    public function getpersonil($id)
    {
        $data = [];

        $struktural = Tb01::with(['skpd'])->select('tmlhr', 'photo', 'tb_01.tglhr', 'tb_01.kdunit', 'email', 'gdp', 'gdb', 'email_dinas', 'nama', 'tb_01.idskpd', "jabatan.skpd", 'a_golruang.idgolru',  DB::Raw("
         case when jabfung is null and jabfungum is null then jabatan.jab
            when jabfung is null then jabfungum
            else  jabfung end as jabatan
        "), DB::Raw("a_jenjurusan.jenjurusan as pendidikan"), DB::Raw("a_golruang.pangkat as pangkat"), DB::Raw("a_golruang.golru as golru"), DB::Raw("induk.skpd as unor"))
            ->leftJoin('a_skpd as jabatan', "tb_01.idskpd", "jabatan.idskpd")
            ->leftJoin('a_jenjurusan', "tb_01.idjenjurusan", "a_jenjurusan.idjenjurusan")
            ->leftJoin('a_skpd as induk', DB::Raw("substring(tb_01.idskpd,1,2)"), '=', "induk.idskpd")
            ->leftJoin('a_golruang', "tb_01.idgolrupkt", "a_golruang.idgolru")
            ->leftJoin('a_jabfungum', "tb_01.idjabfungum", "a_jabfungum.idjabfungum")
            ->leftJoin('a_jabfung', "tb_01.idjabfung", "a_jabfung.idjabfung")
            ->where('tb_01.kdunit', $id) //kode opd
            ->where('idjenkedudupeg', 1) //aktif / tidak
            ->where('idjenjab', '>', '4')
            ->orderBy('idesljbt', 'ASC')
            ->orderBy('idgolrupkt', 'DESC')
            ->get();

        $non_struktural = Tb01::with(['skpd'])->select('tmlhr', 'photo', 'tb_01.tglhr', 'tb_01.kdunit', 'email', 'gdp', 'gdb', 'email_dinas', 'nama', 'tb_01.idskpd', "jabatan.skpd", 'a_golruang.idgolru',  DB::Raw("
         case when jabfung is null and jabfungum is null then jabatan.jab
            when jabfung is null then jabfungum
            else  jabfung end as jabatan
        "), DB::Raw("a_jenjurusan.jenjurusan as pendidikan"), DB::Raw("a_golruang.pangkat as pangkat"), DB::Raw("a_golruang.golru as golru"), DB::Raw("induk.skpd as unor"))
            ->leftJoin('a_skpd as jabatan', "tb_01.idskpd", "jabatan.idskpd")
            ->leftJoin('a_skpd as unit', "tb_01.idskpd", "unit.idskpd")
            ->leftJoin('a_jenjurusan', "tb_01.idjenjurusan", "a_jenjurusan.idjenjurusan")
            ->leftJoin('a_skpd as induk', DB::Raw("substring(tb_01.idskpd,1,2)"), '=', "induk.idskpd")
            ->leftJoin('a_golruang', "tb_01.idgolrupkt", "a_golruang.idgolru")
            ->leftJoin('a_jabfungum', "tb_01.idjabfungum", "a_jabfungum.idjabfungum")
            ->leftJoin('a_jabfung', "tb_01.idjabfung", "a_jabfung.idjabfung")
            ->where('tb_01.kdunit', $id) //kode opd
            ->where('idjenkedudupeg', 1) //aktif / tidak
            ->where('idjenjab', '<=', '4')
            ->where('unit.skpd', 'NOT LIKE', '%puskesmas%')
            ->orderBy('idstspeg', 'ASC')
            ->orderBy('idjenjab', 'ASC')
            ->orderBy('idgolrupkt', 'DESC')
            ->get();

        $data['struktural'] = $struktural;
        $data['non_struktural'] = $non_struktural;

        return response()->json($data);
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
