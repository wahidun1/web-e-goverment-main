<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        if (Auth::attempt(['nik' => $request->nik, 'password' => $request->password])) {
            if (auth()->user()->role == 'admin') {
                return redirect('admin/dashboard/');
            } elseif (auth()->user()->role == 'user') {
                return redirect('user/dashboard/');
            }
        } else {
            return redirect('login');
        }

        return redirect()->back();
    }

    public function logout()
    {
        \Auth::logout();

        return redirect('/login');
    }
}
