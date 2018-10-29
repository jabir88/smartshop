<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PasswordMiddleware
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
        if (empty(Auth::user()->password)) {
            return redirect('admin/permission');
            // abort('440');
        }
        return $next($request);
    }
}
