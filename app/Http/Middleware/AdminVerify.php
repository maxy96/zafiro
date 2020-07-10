<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class AdminVerify
{
    public function handle($request, Closure $next)
    {
        if($request->user() == null || !$request->user()->perfil_id == 1){
            return redirect(RouteServiceProvider::LOGIN);
        }
        return $next($request);
    }
}
