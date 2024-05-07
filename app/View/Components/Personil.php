<?php

namespace App\View\Components;

use Closure;
use App\Models\Simpeg\Tb01;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Return_;

class Personil extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // $kadis = Tb01::with(['skpd'])->select('tmlhr', 'photo', 'tb_01.tglhr', 'nip', 'tb_01.kdunit', 'email', 'gdp', 'gdb', 'email_dinas', 'nama', 'tb_01.idskpd', "jabatan.skpd", 'a_golruang.idgolru',  DB::Raw("
        //  case when jabfung is null and jabfungum is null then jabatan.jab
        //     when jabfung is null then jabfungum
        //     else  jabfung end as jabatan
        // "), DB::Raw("a_jenjurusan.jenjurusan as pendidikan"), DB::Raw("a_golruang.pangkat as pangkat"), DB::Raw("a_golruang.golru as golru"), DB::Raw("induk.skpd as unor"))
        //     ->leftJoin('a_skpd as jabatan', "tb_01.idskpd", "jabatan.idskpd")
        //     ->leftJoin('a_jenjurusan', "tb_01.idjenjurusan", "a_jenjurusan.idjenjurusan")
        //     ->leftJoin('a_skpd as induk', DB::Raw("substring(tb_01.idskpd,1,2)"), '=', "induk.idskpd")
        //     ->leftJoin('a_golruang', "tb_01.idgolrupkt", "a_golruang.idgolru")
        //     ->leftJoin('a_jabfungum', "tb_01.idjabfungum", "a_jabfungum.idjabfungum")
        //     ->leftJoin('a_jabfung', "tb_01.idjabfung", "a_jabfung.idjabfung")
        //     ->where('tb_01.kdunit', 18) //kode opd
        //     ->where('idjenkedudupeg', 1) //aktif / tidak
        //     ->where('idjenjab', 20) //kode kepala dinas
        //     ->where('jabatan.jab', 'Kepala Dinas Kearsipan dan Perpustakaan Daerah')
        //     ->get();

        // $struktural = Tb01::with(['skpd'])->select('tmlhr', 'photo', 'tb_01.tglhr', 'nip', 'tb_01.kdunit', 'email', 'gdp', 'gdb', 'email_dinas', 'nama', 'tb_01.idskpd', "jabatan.skpd", 'a_golruang.idgolru',  DB::Raw("
        //  case when jabfung is null and jabfungum is null then jabatan.jab
        //     when jabfung is null then jabfungum
        //     else  jabfung end as jabatan
        // "), DB::Raw("a_jenjurusan.jenjurusan as pendidikan"), DB::Raw("a_golruang.pangkat as pangkat"), DB::Raw("a_golruang.golru as golru"), DB::Raw("induk.skpd as unor"))
        //     ->leftJoin('a_skpd as jabatan', "tb_01.idskpd", "jabatan.idskpd")
        //     ->leftJoin('a_jenjurusan', "tb_01.idjenjurusan", "a_jenjurusan.idjenjurusan")
        //     ->leftJoin('a_skpd as induk', DB::Raw("substring(tb_01.idskpd,1,2)"), '=', "induk.idskpd")
        //     ->leftJoin('a_golruang', "tb_01.idgolrupkt", "a_golruang.idgolru")
        //     ->leftJoin('a_jabfungum', "tb_01.idjabfungum", "a_jabfungum.idjabfungum")
        //     ->leftJoin('a_jabfung', "tb_01.idjabfung", "a_jabfung.idjabfung")
        //     ->where('tb_01.kdunit', env('ID_OPD')) //kode opd
        //     ->where('idjenkedudupeg', 1) //aktif / tidak
        //     ->where('idjenjab', '>', '4')
        //     ->orderBy('idesljbt', 'ASC')
        //     ->orderBy('idgolrupkt', 'DESC')
        //     ->get();
        //kolom = idstspeg 2,3,1 2=PNS 3=PPPK 1=CPNS

        // $non_struktural = Tb01::with(['skpd'])->select('tmlhr', 'photo', 'tb_01.tglhr', 'nip', 'tb_01.kdunit', 'email', 'gdp', 'gdb', 'email_dinas', 'nama', 'tb_01.idskpd', "jabatan.skpd", 'a_golruang.idgolru',  DB::Raw("
        //  case when jabfung is null and jabfungum is null then jabatan.jab
        //     when jabfung is null then jabfungum
        //     else  jabfung end as jabatan
        // "), DB::Raw("a_jenjurusan.jenjurusan as pendidikan"), DB::Raw("a_golruang.pangkat as pangkat"), DB::Raw("a_golruang.golru as golru"), DB::Raw("induk.skpd as unor"))
        //     ->leftJoin('a_skpd as jabatan', "tb_01.idskpd", "jabatan.idskpd")
        //     ->leftJoin('a_jenjurusan', "tb_01.idjenjurusan", "a_jenjurusan.idjenjurusan")
        //     ->leftJoin('a_skpd as induk', DB::Raw("substring(tb_01.idskpd,1,2)"), '=', "induk.idskpd")
        //     ->leftJoin('a_golruang', "tb_01.idgolrupkt", "a_golruang.idgolru")
        //     ->leftJoin('a_jabfungum', "tb_01.idjabfungum", "a_jabfungum.idjabfungum")
        //     ->leftJoin('a_jabfung', "tb_01.idjabfung", "a_jabfung.idjabfung")
        //     ->where('tb_01.kdunit', env('ID_OPD')) //kode opd
        //     ->where('idjenkedudupeg', 1) //aktif / tidak
        //     ->where('idjenjab', '<=', '4')
        //     ->orderBy('idstspeg', 'ASC')
        //     ->orderBy('idjenjab', 'ASC')
        //     ->orderBy('idgolrupkt', 'DESC')
        //     ->get();
        // return $non_struktural;

        // $sekdin = Tb01::with(['skpd'])->select('tmlhr', 'photo', 'tb_01.tglhr', 'nip', 'tb_01.kdunit', 'email', 'gdp', 'gdb', 'email_dinas', 'nama', 'tb_01.idskpd', "jabatan.skpd", 'a_golruang.idgolru',  DB::Raw("
        //  case when jabfung is null and jabfungum is null then jabatan.jab
        //     when jabfung is null then jabfungum
        //     else  jabfung end as jabatan
        // "), DB::Raw("a_jenjurusan.jenjurusan as pendidikan"), DB::Raw("a_golruang.pangkat as pangkat"), DB::Raw("a_golruang.golru as golru"), DB::Raw("induk.skpd as unor"))
        //     ->leftJoin('a_skpd as jabatan', "tb_01.idskpd", "jabatan.idskpd")
        //     ->leftJoin('a_jenjurusan', "tb_01.idjenjurusan", "a_jenjurusan.idjenjurusan")
        //     ->leftJoin('a_skpd as induk', DB::Raw("substring(tb_01.idskpd,1,2)"), '=', "induk.idskpd")
        //     ->leftJoin('a_golruang', "tb_01.idgolrupkt", "a_golruang.idgolru")
        //     ->leftJoin('a_jabfungum', "tb_01.idjabfungum", "a_jabfungum.idjabfungum")
        //     ->leftJoin('a_jabfung', "tb_01.idjabfung", "a_jabfung.idjabfung")
        //     ->where('tb_01.idskpd', '18.01')
        //     ->where('idjenkedudupeg', 1)
        //     ->get();


        // $staff = Tb01::with(['skpd'])->select('tmlhr', 'photo', 'tb_01.tglhr', 'nip', 'tb_01.kdunit', 'email', 'gdp', 'gdb', 'email_dinas', 'nama', 'tb_01.idskpd', "jabatan.skpd", 'a_golruang.idgolru',  DB::Raw("
        //  case when jabfung is null and jabfungum is null then jabatan.jab
        //     when jabfung is null then jabfungum
        //     else  jabfung end as jabatannya
        // "), DB::Raw("a_jenjurusan.jenjurusan as pendidikan"), DB::Raw("a_golruang.pangkat as pangkat"), DB::Raw("a_golruang.golru as golru"), DB::Raw("induk.skpd as unor"))
        //     ->leftJoin('a_skpd as jabatan', "tb_01.idskpd", "jabatan.idskpd")
        //     ->leftJoin('a_jenjurusan', "tb_01.idjenjurusan", "a_jenjurusan.idjenjurusan")
        //     ->leftJoin('a_skpd as induk', DB::Raw("substring(tb_01.idskpd,1,2)"), '=', "induk.idskpd")
        //     ->leftJoin('a_golruang', "tb_01.idgolrupkt", "a_golruang.idgolru")
        //     ->leftJoin('a_jabfungum', "tb_01.idjabfungum", "a_jabfungum.idjabfungum")
        //     ->leftJoin('a_jabfung', "tb_01.idjabfung", "a_jabfung.idjabfung")
        //     ->where('tb_01.kdunit', 14)
        //     ->where('idjenkedudupeg', 1)
        //     ->orderBy('a_golruang.idgolru', 'desc')
        //     ->get();

        // $staff_diskominfo = $staff->wherenotin('jabatannya', ['Kepala Dinas Komunikasi dan Informatika', 'Sekretaris Dinas Komunikasi dan Informatika', 'Kepala Bidang Informatika Dinas Komunikasi dan Informatika', 'Kepala Bidang Informasi dan Komunikasi Publik Dinas Komunikasi dan Informatika']);

        // $informatika = Tb01::with(['skpd'])->select('tmlhr', 'photo', 'tb_01.tglhr', 'nip', 'tb_01.kdunit', 'email', 'gdp', 'gdb', 'email_dinas', 'nama', 'tb_01.idskpd', 'a_golruang.idgolru',  DB::Raw("
        //  case when jabfung is null and jabfungum is null then jabatan.jab
        //     when jabfung is null then jabfungum
        //     else  jabfung end as jabatannya
        // "), DB::Raw("a_jenjurusan.jenjurusan as pendidikan"), DB::Raw("a_golruang.pangkat as pangkat"), DB::Raw("a_golruang.golru as golru"), DB::Raw("induk.skpd as unor"))
        //     ->leftJoin('a_skpd as jabatan', "tb_01.idskpd", "jabatan.idskpd")
        //     ->leftJoin('a_jenjurusan', "tb_01.idjenjurusan", "a_jenjurusan.idjenjurusan")
        //     ->leftJoin('a_skpd as induk', DB::Raw("substring(tb_01.idskpd,1,2)"), '=', "induk.idskpd")
        //     ->leftJoin('a_golruang', "tb_01.idgolrupkt", "a_golruang.idgolru")
        //     ->leftJoin('a_jabfungum', "tb_01.idjabfungum", "a_jabfungum.idjabfungum")
        //     ->leftJoin('a_jabfung', "tb_01.idjabfung", "a_jabfung.idjabfung")
        //     ->where('tb_01.idskpd', '14.02')
        //     ->where('idjenkedudupeg', 1)
        //     ->orderBy('a_golruang.idgolru', 'desc')
        //     ->get();

        // $kabid_informatika = $informatika->where('jabatannya', 'Kepala Bidang Informatika Dinas Komunikasi dan Informatika');


        // $ikp = Tb01::with(['skpd'])->select('tmlhr', 'photo', 'tb_01.tglhr', 'nip', 'tb_01.kdunit', 'email', 'gdp', 'gdb', 'email_dinas', 'nama', 'tb_01.idskpd', "jabatan.skpd", 'a_golruang.idgolru',  DB::Raw("
        //  case when jabfung is null and jabfungum is null then jabatan.jab
        //     when jabfung is null then jabfungum
        //     else  jabfung end as jabatannya
        // "), DB::Raw("a_jenjurusan.jenjurusan as pendidikan"), DB::Raw("a_golruang.pangkat as pangkat"), DB::Raw("a_golruang.golru as golru"), DB::Raw("induk.skpd as unor"))
        //     ->leftJoin('a_skpd as jabatan', "tb_01.idskpd", "jabatan.idskpd")
        //     ->leftJoin('a_jenjurusan', "tb_01.idjenjurusan", "a_jenjurusan.idjenjurusan")
        //     ->leftJoin('a_skpd as induk', DB::Raw("substring(tb_01.idskpd,1,2)"), '=', "induk.idskpd")
        //     ->leftJoin('a_golruang', "tb_01.idgolrupkt", "a_golruang.idgolru")
        //     ->leftJoin('a_jabfungum', "tb_01.idjabfungum", "a_jabfungum.idjabfungum")
        //     ->leftJoin('a_jabfung', "tb_01.idjabfung", "a_jabfung.idjabfung")
        //     ->where('tb_01.idskpd', '14.03')
        //     ->where('idjenkedudupeg', 1)
        //     ->orderBy('a_golruang.idgolru', 'desc')
        //     ->get();

        // $kabid_ikp = $ikp->where('jabatannya', 'Kepala Bidang Informasi dan Komunikasi Publik Dinas Komunikasi dan Informatika');

        //  return $kabid_informatika;

        $opdId = env('ID_OPD'); // Mengambil nilai OPD_ID dari variabel lingkungan

        $response = Http::withoutVerifying()->get('https://api.wonosobokab.go.id/api/list-personil/' . $opdId);

        if (!$response->successful()) {
            return '<center><h1>Koneksi Gagal...</h1></center>';
        }

        $data = $response->json();

        $struktural = $data['struktural'];
        // dd($struktural);
        $non_struktural = $data['non_struktural'];

        return view('components.personil', compact('struktural', 'non_struktural'));
    }
}
