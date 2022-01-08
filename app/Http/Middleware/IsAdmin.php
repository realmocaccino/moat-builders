<?php
namespace App\Http\Middlewares;

use Closure;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if(!$request->user()->isAdmin()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}