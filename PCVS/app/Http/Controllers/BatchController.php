<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Batch;
use App\Models\Vaccine;
use App\Models\Vaccination;
class BatchController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index(){
        $cId = auth()->user()->centreName;
        $centre = DB::table('centre')
            ->where('id',$cId)
            ->first();
        $active = "batch";
        $title= "Batch Information";
        $vaccine = Vaccine::all();
        $pending = Vaccination::where('status',"Pending")
        ->get();
        $data_batch = Batch::where('centreId','LIKE','%'.$cId.'%')->get();
        return view('batch.index', ['title' =>$title,'centre' =>$centre, 'pending'=>$pending ,'active' =>$active, 'data_batch' =>$data_batch, 'vaccine' =>$vaccine]);
    }
    public function addBatch(Request $request)
    {
        $validated = $request->validate([
            // 'centreId' => 'required',
            'batchNo' => 'required',
            'vaccineId' => 'required',
            'quantityAvailable' => 'required',
            'expiryDate' => 'required',
        ]);
        // Batch::create($request->all());
        $batch = new Batch;
        $batch->centreId = auth()->user()->centreName;
        $batch->batchNo = $request->batchNo;
        $batch->vaccineId =  $request->vaccineId;
        $batch->quantityAvailable =  $request->quantityAvailable;
        $batch->expiryDate = $request->expiryDate;
        $batch->save();
        return redirect('/batch')->with('success','Successfully register test centre');
    }
}
