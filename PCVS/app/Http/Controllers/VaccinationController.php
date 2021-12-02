<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Batch;
use App\Models\Vaccine;
use App\Models\Vaccination;
use App\Models\Centre;
use Carbon\Carbon;

class VaccinationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index(Request $request)
    {
        // $cId = auth()->user()->centreName;
        $vaccine = Vaccine::all();
        if($request->has('search')){
            // $id = DB::table('vaccine')
            // ->select('id')
            // ->where('name','like', '%'.$request->search.'%')
            // ->get();
            // dd($id);
            $batch = Batch::where('vaccineId',$request->search)->paginate(4);
            // dd($batch);
        }
        elseif(empty($request->input('search')))
        {
            $batch =  DB::table('batch')->paginate(4);
        }
        $id = $request->search;
        // $batchList = DB::table('batch')->paginate(4);
        $active = "vaccination";
        $title= "Vaccination";
        // $vaccine2 = Vaccine::all();
        $centre = Centre::all();
        return view('vaccination.index', ['title' =>$title,'active'=>$active, 'vaccine'=>$vaccine,'centre' =>$centre, 'id' => $id, 'batch'=>$batch]);
    }
    public function appointment(Request $request)
    {
        // $expiryDate = DB::table('batch')
        // ->select('expiryDate')
        // ->where('id',$request->batchId)
        // ->first();
        $expiryDate = Batch::find($request->batchId);
        $date = $expiryDate->expiryDate;
        $newDate = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
        $validated = $request->validate([
            'appointmentDate' => 'required|date|before_or_equal:'.$newDate
        ]);
        
        $vaccination = new Vaccination;
        $vaccination->patientId = auth()->user()->id;;
        $vaccination->centreId = Batch::find($request->batchId)->centreId;
        $vaccination->batchId = $request->batchId;
        $vaccination->appointmentDate =  $request->appointmentDate;
        $vaccination->status = "Pending";
        $vaccination->save();
        $request->session()->flash('success', 'Request has been sent! Please wait for the confirmation');
        return redirect('/vaccination');
    }
   
}
