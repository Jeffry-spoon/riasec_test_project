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
            if (session('quiz_completed')) {
                return redirect('/result')->with('success', 'Anda telah menyelesaikan kuis!');
            }
            // Lanjutkan ke tujuan asli jika pengguna sudah terdaftar.
            return $next($request);
        }
        // // Cek apa  kah pengguna telah menyelesaikan semua langkah (registrasi, quiz, result)
        // if (!$this->userCompletedSession($request)) {
        //     // Jika tidak, arahkan ke halaman registrasi
        //     return redirect()->route('register');
        // }

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