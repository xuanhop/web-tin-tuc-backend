<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->get('email');
        $pass = $request->get('pass');

        $user = DB::table('users')->where('email', '=', $email)->first();

        if ($user && Hash::check($pass, $user->password)) {
            $request->session()->put('user', $user);
            return view('index');
        } else {
            return view('login');
        }
    }

    public function logout(Request $request)
    {
        if (!isset($_SESSION)) {
            $request->session()->flush();
        }
        return redirect('/');
    }
}