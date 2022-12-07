<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Mail\NewUserNotification;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'numeric', 'digits:16', 'unique:m_peserta'],
            // 'nuptk' => ['required', 'numeric', 'digits:16', 'unique:m_peserta'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->firstName.' '.$request->lastName,
            'email' => $request->email,
            'role_id' => '5',
            'password' => Hash::make($request->password)
        ]);
        
        $data = User::orderBy('id', 'DESC')->first();
        $peserta = Peserta::create([
            'nama_depan' => $request->firstName,
            'nama_belakang' => $request->lastName,
            'user_id' => $data->id,
            'nik' => $request->nik,
            'nuptk' => $request->nuptk,
            'email' => $request->email
        ]);

        

        event(new Registered($user));

        Auth::login($user);
        // Mail::to($request->email)->send(new NewUserNotification($user));
        return redirect(RouteServiceProvider::HOME)->with('message', 'Selamat anda berhasil mendaftar');
    }
}