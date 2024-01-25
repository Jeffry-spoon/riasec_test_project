<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersDetail;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Types;
use Illuminate\Support\Facades\Session;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {



        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:dns',
            // 'birth-date' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'phone-number' => 'required|min:12|max:13',
            'grade' => 'required|string',
            // 'domicile' => 'required|string',
            'school-name' => 'required|string',
            // 'major' => 'required|string',
            'occupation' => 'required|string',
        ]);

        $existingUser = User::where('email', $request->input('email'))->first();

        // Periksa apakah pengguna sudah terdaftar sebelumnya.
        if ($existingUser) {
            Auth::login($existingUser);

            return redirect()->route('quiz.create')->with('info', 'Anda sudah terdaftar sebelumnya.');
        }

        $userData = [
            'name' => $request['name'],
            'email' => $request['email'],
        ];

        $userDetailData = [
            // 'birth-date' => $request['birth-date'],
            'gender' => $request['gender'],
            'phone-number' => $request['phone-number'],
            'grade' => $request['grade'],
            // 'domicile' => $request['domicile'],
            'school-name' => $request['school-name'],
            // 'major' => $request['major'],
            'occupation' => $request['occupation'],
        ];

        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
        ]);

        $user->userDetail()->create([
            // 'birth_date' => $userDetailData['birth-date'],
            'gender' => $userDetailData['gender'],
            'phone_number' => $userDetailData['phone-number'],
            'education_level' => $userDetailData['grade'],
            // 'domicile' => $userDetailData['domicile'],
            'school_name' => $userDetailData['school-name'],
            // 'major_name' => $userDetailData['major'],
            'occupation_desc' => $userDetailData['occupation'],
        ]);

        Auth::login($user);

        // $userName = auth()->user()->name;
        // dd($userName);

        // // Setelah login atau registrasi berhasil
        // Session::put('username', $userName);

        return redirect()->route('quiz.create');
    }

    public function storeRegistration(Request $request)
    {
    // Validasi dan logika penyimpanan data registrasi

    // Simpan nama pengguna ke dalam sesi
    Session::put('registration_username', $request->input('name'));

    // Set sesi registration_completed
    Session::put('registration_completed', true);


    // Redirect atau kirim tanggapan sukses
    return redirect('/quiz')->with('success', 'Registrasi berhasil!');
    }

}
