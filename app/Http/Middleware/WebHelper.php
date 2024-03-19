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
        //its just a dummy data object.
        $data = Website::first();
        $menu = FrontMenu::all();
        $agenda = Agenda::all()->count();
        $news = News::all()->count();
        $counter = Visitor::all()->count();
        $counterH = Visitor::whereDate('created_at', Carbon::today())->count();
        $counterK = Visitor::whereDate('created_at', Carbon::yesterday())->count();
        $counterM = Visitor::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $counterB = Visitor::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $inbox = Inbox::all()->count();
        $related = RelatedLink::all();

        // Sharing is caring
        view()->share('data_website', $data);
        view()->share('nav_menu', $menu);
        view()->share('news_all', $news);
        view()->share('counter_web', $counter);
        view()->share('counter_webh', $counterH);
        view()->share('counter_webk', $counterK);
        view()->share('counter_webm', $counterM);
        view()->share('counter_webb', $counterB);
        view()->share('related', $related);
        view()->share('inbox', $inbox);
        view()->share('agenda', $agenda);
        return $next($request);
    }
}
