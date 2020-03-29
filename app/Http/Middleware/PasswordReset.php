<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PasswordReset
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
        $ispasswordchange = Auth::user()->ispasswordchange;

        if(!$ispasswordchange) {
            return redirect('profil');
        }

        return $next($request);
    }
}
