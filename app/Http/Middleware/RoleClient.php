<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleClient
{
    public function handle($request, Closure $next)
    {
      if (auth()->check() && auth()->user()->roleId == 2){
        return $next($request);
      }
      return redirect('/home');

    }
}
