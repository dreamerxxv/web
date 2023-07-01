<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use App\Models\Karyawan;

class IndexController extends Controller
{
    public function loginKaryawan(Request $request){
        $karyawan = ([
            'nip' => $request->nip,
            'password' => $request->password
        ]);

        if(Auth::attempt($karyawan)){
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }
    }
}
