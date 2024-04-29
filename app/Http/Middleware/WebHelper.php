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
        $inbox = Inbox::all()->count();
        $related = RelatedLink::all();

        // Sharing is caring
        view()->share('data_website', $data);
        view()->share('nav_menu', $menu);
        view()->share('news_all', $news);
        view()->share('counter_web', $counter);
        view()->share('related', $related);
        view()->share('inbox', $inbox);
        view()->share('agenda', $agenda);
        return $next($request);
    }
}
