<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RegisteredMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Pemeriksaan apakah pengguna sudah terdaftar
        if (!$request->user() || !$request->user()->isRegistered()) {
            // Jika tidak terdaftar, arahkan ke halaman registrasi
            return redirect()->route('register');
        }

        // Jika terdaftar, lanjutkan permintaan
        return redirect()->route('quiz.create');
    }
}