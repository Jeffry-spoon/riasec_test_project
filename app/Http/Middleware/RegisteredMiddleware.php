<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        // Periksa apakah pengguna telah melakukan registrasi.
        if (auth()->check()) {

            return $next($request);
        }

         // Redirect atau kirim tanggapan kesalahan jika pengguna belum terdaftar.
         return redirect('/register')->with('error', 'Anda harus registrasi terlebih dahulu.');
    }

    /**
     * Check if the user has completed all necessary steps (registration, quiz, result).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    private function userCompletedSession(Request $request)
    {
        // Anda dapat menggunakan sesi atau menyimpan informasi di database, tergantung kebutuhan aplikasi Anda
        // Contoh menggunakan sesi untuk menyimpan status langkah-langkah
        $registrationCompleted = Session::get('registration_completed', false);
        $quizCompleted = Session::get('quiz_completed', false);
        $resultCompleted = Session::get('result_completed', false);

        // Sesuaikan dengan langkah-langkah sesi Anda
        return $registrationCompleted && $quizCompleted && $resultCompleted;
    }
}