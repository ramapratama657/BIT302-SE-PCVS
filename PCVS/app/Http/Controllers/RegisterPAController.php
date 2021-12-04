<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterPAController extends Controller
{
    public function index()
    {
        return view('registerPA.index', [
            'title' => 'Register as patient',
            // 'active' => 'register'

        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email:dns|unique:users',
            'ic' => 'required|unique:users',
            'password' => 'required|min:8|max:255|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = new User;
        $user->role = 'patient';
        $user->name = $request->name;
        $user->username =  $request->username;
        $user->password = bcrypt($request->password);
        $user->email =  $request->email;
        $user->ic = $request->ic;
        $user->save();
        $request->session()->flash('success', 'Account created! Please login and verify the email !');
        return redirect('/login');
    }
}
