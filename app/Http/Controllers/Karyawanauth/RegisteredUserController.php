<?php

namespace App\Http\Controllers\Karyawanauth;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $data['title'] = 'Register';
        return view('karyawan.register', $data);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:20', 'unique:'.Karyawan::class],
            'jk' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'divisi' => ['required', 'string', 'max:255'],
            'password' => ['required'],
        ]);

        $user = Karyawan::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jk' => $request->jk,
            'jabatan' => $request->jabatan,
            'divisi' => $request->divisi,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

        Auth::guard('karyawan')->login($user);

        return redirect(RouteServiceProvider::KARYAWAN_HOME);
    }
}
