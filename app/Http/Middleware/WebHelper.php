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
use App\Models\Visitor;
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
        $public_complaints = Complaint::all()->count();
        $gallery = Gallery::all()->count();
        $counter = Visitor::all()->count();
        $inbox = Inbox::all()->count();
        $related = RelatedLink::all();
        // Sharing is caring
        view()->share('data_website', $data);
        view()->share('nav_menu', $menu);
        view()->share('news_all', $news);
        view()->share('public_complaints', $public_complaints);
        view()->share('gallery_all', $gallery);
        view()->share('counter_web', $counter);
        view()->share('related', $related);
        view()->share('inbox', $inbox);
        view()->share('agenda', $agenda);
        return $next($request);
    }
}
