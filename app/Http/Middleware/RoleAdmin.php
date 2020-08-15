<?php

namespace App\Http\Middleware;

use Closure;

class RoleAdmin
{
    public function handle($request, Closure $next)
    {
      if (auth()->check() && auth()->user()->roleId == 1){
        return $next($request);
      }
      return redirect('/home');
    }
}
