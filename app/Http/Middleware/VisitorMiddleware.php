<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Jenssegers\Agent\Agent;

class VisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get user agent string from the request
        $userAgent = $request->header('User-Agent');

        // Initialize Agent library
        $agent = new Agent();

        // Parse user agent string
        $agent->setUserAgent($userAgent);

        // Log visitor information
        Visitor::create([
            'ip' => $request->ip(),
            'useragent' => $userAgent,
            'browser' => $agent->browser(),
            'device' => $agent->device(),
            'languages' => $request->server('HTTP_ACCEPT_LANGUAGE'),
            'platform' => $agent->platform(),
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'referer' => $request->header('referer'),
            'headers' => json_encode($request->headers->all()),
            // You can add more information here as needed
        ]);

        return $next($request);
    }
}
