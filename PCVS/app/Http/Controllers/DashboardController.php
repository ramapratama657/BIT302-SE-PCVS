<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index_patient()
    {
        $title= "Dashboard Patient";
        $active = "dashboard";
        $batch = DB::table('batch')
        ->count();
        return view('dashboard.index_patient', ['title' =>$title, 'batch'=> $batch,'active'=>$active]);
    }
    public function index_admin()
    {
        $cId = auth()->user()->centreName;
        $centre = DB::table('centre')
            ->where('id',$cId)
            ->first();
        $confirm = DB::table('vaccination')
        ->where('status',"Confirmed")
        ->count();
        $pending = DB::table('vaccination')
        ->where('status',"Pending")
        ->count();
        $adminis = DB::table('vaccination')
        ->where('status',"Administrated")
        ->count();
        $active = "dashboard";
        $title= "Dashboard Admin";
        return view('dashboard.index_admin', ['title' =>$title,'confirm'=>$confirm,'pending'=>$pending,'adminis'=>$adminis,'active'=>$active, 'centre' =>$centre]);
    }
}
