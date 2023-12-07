<?php

namespace App\Http\Middleware;

use App\Models\Agenda;
use App\Models\Complaint;
use App\Models\Counter;
use Closure;
use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\FrontMenu;
use App\Models\Gallery;
use App\Models\Inbox;
use App\Models\News;
use App\Models\RelatedLink;
use Illuminate\Support\Facades\DB;

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
        //its just a dummy data object.
        $data = Website::first();
        $menu = FrontMenu::all();
        $agenda = Agenda::all()->count();
        $news = News::all()->count();
        $counter = Counter::all()->count();
        $inbox = Inbox::all()->count();
        $related = RelatedLink::all();
        $berita = News::where('kategori', 'KATEGORI_NEWS_4')->count();
        $dokumentasi = News::where('kategori', 'KATEGORI_NEWS_1')->count();
        $notulensi = News::where('kategori', 'KATEGORI_NEWS_3')->count();
        $press = News::where('kategori', 'KATEGORI_NEWS_2')->count();
        $sambutan = News::where('kategori', 'KATEGORI_NEWS_0')->count();

        // Sharing is caring
        view()->share('data_website', $data);
        view()->share('nav_menu', $menu);
        view()->share('news_all', $news);
        view()->share('counter_web', $counter);
        view()->share('related', $related);
        view()->share('inbox', $inbox);
        view()->share('agenda', $agenda);
        view()->share('berita', $berita);
        view()->share('dokumentasi', $dokumentasi);
        view()->share('notulensi', $notulensi);
        view()->share('press', $press);
        view()->share('sambutan', $sambutan);
        return $next($request);
    }
}
