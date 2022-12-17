<?php

namespace App\Http\Middleware;

use App\Models\RiwayatUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Status
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->status == 'Pendonor') {
            $data = RiwayatUser::query()->where('id_user', Auth::user()->id)->get();
            if (count($data) == 1) {
                return redirect()->route('pertanyaan');
            }
        }
        return $next($request);
    }
}
