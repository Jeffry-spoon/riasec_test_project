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
        // Pemeriksaan apakah pengguna sudah terdaftar
        if (!$request->user()) {
            // Debugging
            return redirect()->route('register');
        }
        // Cek apa  kah pengguna telah menyelesaikan semua langkah (registrasi, quiz, result)
        if (!$this->userCompletedSession($request)) {
            // Jika tidak, arahkan ke halaman registrasi
            return redirect()->route('register');
        }

        // Jika pengguna terdaftar dan telah menyelesaikan sesi, lanjutkan ke permintaan berikutnya
        return $next($request);
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