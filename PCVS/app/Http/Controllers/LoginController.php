<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     public function index()
     {
         return view('login.index', [
             'title' => 'Login'
         ]);
     }
     public function auth(Request $request)
     {
        if(Auth::attempt($request->only('username','password'))){
            if (in_array($request->user()->role,['admin','master'])) {
                return redirect()->to( '/dashboard' );
            }
            return redirect('/dashboard_p');
        }
         else
         {
            return back()->with('loginError','Failed to login');
         }
     }
     public function logout()
     {
        Auth::logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/');
     }
}
