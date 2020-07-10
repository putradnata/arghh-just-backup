<?php

namespace App\Http\Middleware;

use Closure;

class isPenduduk
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
        if (auth()->user()->jabatan == 'p') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Anda bukan User Sistem Desa Sumerta Kaja');
    }
}
