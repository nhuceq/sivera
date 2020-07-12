<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    // pengunjung biasa tidak bisa mengakses logout (tidak wajib)
    public function __construct()
    {
    }

    //function untuk logout
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    //function untuk login
    public function login()
    {
        return view ('auth.login');
    }

    //function untuk submit ke halaman login
    public function login_submit(Request $request)
    {
        $data = $request -> all ();

        $kd_user = $data['kode_user_txt'];
        $pass = $data['password_txt'];

        $data_login = [
        //  field db => variabel
            'username' => $kd_user,
            'password'  => $pass,
        ];

        if(Auth::attempt($data_login,true)) {
            // jika login benar
            return redirect('/dashboard');  
        }
        else
        {
            // jika login salah
            return redirect('/login?error');
        }

    }

}
