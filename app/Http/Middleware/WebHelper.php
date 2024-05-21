<?php

namespace App\Http\Middleware;

use App\Models\Agenda;
use Closure;
use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\FrontMenu;
use App\Models\Inbox;
use App\Models\News;
use App\Models\RelatedLink;
use App\Models\Visitor;
use Carbon\Carbon;

class WebHelper
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
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
        $counterH = Visitor::whereDate('created_at', Carbon::today())->count();
        $counterK = Visitor::whereDate('created_at', Carbon::yesterday())->count();
        $counterM = Visitor::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $counterB = Visitor::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        // Jumlah agenda
        $agenda = Agenda::count();

        // Sharing data ke view
        view()->share(compact(
            'data_website',
            'nav_menu',
            'news_all',
            'counter_web',
            'related',
            'inbox',
            'agenda',
            'statPengPerHari',
            'counterH',
            'counterK',
            'counterM',
            'counterB'
        ));

        return $next($request);
    }
}
