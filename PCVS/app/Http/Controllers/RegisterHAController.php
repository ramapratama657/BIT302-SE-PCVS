<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Centre;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegisterHAController extends Controller
{
    public function index()
    {
        $centres = Centre::all();
        $cId = auth()->user()->centreName;
        $centre = DB::table('centre')
            ->where('id',$cId)
            ->first();
        $data_user = User::where('role','admin')->get();
        return view('registerHA.index', [
            'title' => 'Register as HealthCare admin',
            'active' => 'users',
            'centre' =>  $centre,
            'centres' => $centres,
            'data_user' =>$data_user
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email:dns|unique:users',
            'staffID' => 'required|unique:users',
            'centre' => 'required',
            'password' => 'required|min:8|max:255|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = new User;
        $user->role = 'admin';
        $user->name = $request->name;
        $user->username =  $request->username;
        $user->centreName =  $request->centre;
        $user->password = bcrypt($request->password);
        $user->email =  $request->email;
        $user->email_verified_at = date("Y-m-d h:i:sa");
        $user->staffID = $request->staffID;
        $user->save();
        $request->session()->flash('success', 'Account created!');
        return redirect('/registerHA');
    }
    public function addCentre(Request $request)
    {
        $validated = $request->validate([
            'centreName' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        Centre::create($request->all());
        return redirect('/registerHA')->with('success','Successfully register healthcare centre');
    }
}
