<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Event;
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
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $events = Event::where('cut_off_date', '>', Carbon::now())
        ->get();

        return view('auth.register', compact('events'));
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
            'gender' => 'required|in:Male,Female',
            'phone-number' => 'required|min:12|max:13',
            'grade' => 'required|string',
            'school-name' => 'required|string',
            'occupation' => 'required|string',
        ]);

         // Ambil data event dari request
        $event = $request->input('event');
        Session::put('temporary_event', $event);

        $existingUser = User::where('email', $request->input('email'))->first();

        // Periksa apakah pengguna sudah terdaftar sebelumnya.
        if ($existingUser) {
            Auth::login($existingUser);
            return redirect()->route('help')->with('info', 'Anda sudah terdaftar sebelumnya.');
        }

        $userData = [
            'name' => $request['name'],
            'email' => $request['email'],
        ];

        $userDetailData = [
            'gender' => $request['gender'],
            'phone-number' => $request['phone-number'],
            'grade' => $request['grade'],
            'school-name' => $request['school-name'],
            'occupation' => $request['occupation'],
        ];

        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
        ]);

        $user->userDetail()->create([
            'gender' => $userDetailData['gender'],
            'phone_number' => $userDetailData['phone-number'],
            'education_level' => $userDetailData['grade'],
            'school_name' => $userDetailData['school-name'],
            'occupation_desc' => $userDetailData['occupation'],
        ]);

        // Ambil data event dari request
        $event = $request->input('event');

        Auth::login($user);

        return redirect()->route('help', compact('event'));
    }

    public function storeRegistration(Request $request)
    {

    // Validasi dan logika penyimpanan data registrasi

    // Simpan nama pengguna ke dalam sesi
    Session::put('registration_username', $request->input('name'));

    // Set sesi registration_completed
    Session::put('registration_completed', true);


    // Redirect atau kirim tanggapan sukses
    return redirect('/help')->with('success', 'Registrasi berhasil!');
    }

}
