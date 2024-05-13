<?php

namespace App\Http\Middleware;

use App\Models\Agenda;
use App\Models\Website;
use App\Models\FrontMenu;
use App\Models\Inbox;
use App\Models\News;
use App\Models\RelatedLink;
use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WebHelper
{
    public function handle(Request $request, Closure $next)
    {
        // Menginisialisasi array untuk menyimpan data pengunjung per hari
        $statPengPerHari = [];

        // Mengisi array dengan data pengunjung per hari untuk 7 hari terakhir
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::now()->subDays($i)->format('Y-m-d');
            $jumlahPengunjung = Visitor::whereDate('created_at', $tanggal)->count();
            $hari = Carbon::parse($tanggal)->translatedFormat('l');
            $statPengPerHari[$hari] = $jumlahPengunjung;
        }

        // Memasukkan data pengunjung per hari ke dalam request agar dapat diakses di kontroler atau view
        $request->merge(['statistik_pengunjung' => $statPengPerHari]);

        // Mengambil data
        $data_website = Website::first();
        $nav_menu = FrontMenu::all();
        $news_all = News::count();
        $counter_web = Visitor::count();
        $inbox = Inbox::count();
        $related = RelatedLink::all();

        // Jumlah agenda
        $agenda = Agenda::count();

        // Jumlah berita berdasarkan kategori
        $berita = News::where('kategori', 'KATEGORI_NEWS_4')->count();
        $dokumentasi = News::where('kategori', 'KATEGORI_NEWS_1')->count();
        $notulensi = News::where('kategori', 'KATEGORI_NEWS_3')->count();
        $press = News::where('kategori', 'KATEGORI_NEWS_2')->count();
        $sambutan = News::where('kategori', 'KATEGORI_NEWS_0')->count();

        // Sharing data ke view
        view()->share(compact('data_website', 'nav_menu', 'news_all', 'counter_web', 'related', 'inbox', 'agenda', 'berita', 'dokumentasi', 'notulensi', 'press', 'sambutan', 'statPengPerHari'));

        return $next($request);
    }
}
