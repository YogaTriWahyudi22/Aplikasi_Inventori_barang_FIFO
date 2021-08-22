<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $proses = $request->only('username', 'password');

        if (Auth::attempt($proses)) {
            $login = Auth::User();

            if ($login->status == 'admin') {
                return redirect()->intended('admin');
            } elseif ($login->status == 'pimpinan') {
                return redirect()->intended('pimpinan');
            } else {

                return redirect()->route('login');
            }
        } else {

            return redirect()->route('login');
        }
    }

    public function admin()
    {
        if (Auth::user()->status == 'admin') {

            return view('kelola_admin.kelola_akun.dashboard');
        } else {
            return redirect()->route('/');
        }
    }

    public function pimpinan()
    {
        if (Auth::user()->status == 'pimpinan') {

            return view('pimpinan.kelola_akun.dashboard');
        } else {
            return redirect()->route('/');
        }
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
