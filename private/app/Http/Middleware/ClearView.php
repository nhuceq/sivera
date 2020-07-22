<?php

namespace App\Http\Middleware;

use Closure;
use Artisan;

class ClearView
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
        try {
            if (env('APP_DEBUG') || env('APP_ENV') === 'local') {            
                Artisan::call('view:clear');
            }
        } catch (\Throwable $th) { }
        
        return $next($request);
    }
}
