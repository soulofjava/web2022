<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\Gallery;
use App\Models\News;
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
        $data_website = Website::first();
        $news_all = News::all()->count();
        $gallery_all = Gallery::all()->count();
        $counter_web = Visitor::all()->count();
        $counterH = Visitor::whereDate('created_at', Carbon::today())->count();
        $counterK = Visitor::whereDate('created_at', Carbon::yesterday())->count();
        $counterM = Visitor::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $counterB = Visitor::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        // Sharing is caring
        view()->share(compact(
            'data_website',
            'gallery_all',
            'news_all',
            'counter_web',
            'counterH',
            'counterK',
            'counterM',
            'counterB'
        ));
        return $next($request);
    }
}
