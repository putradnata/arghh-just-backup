<?php

namespace App\Http\Middleware;

use Closure;

class isOperator
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
        if (auth()->user()->jabatan == 'o') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Anda bukan Operator Kantor Desa Sumerta Kaja');
    }
}
