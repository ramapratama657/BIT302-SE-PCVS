<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Batch;
use App\Models\Vaccine;
use App\Models\Vaccination;
use App\Models\User;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $cId = auth()->user()->centreName;
        $centre = DB::table('centre')
            ->where('id',$cId)
            ->first();
        $active = "vaccination";
        $title= "Vaccination Information";
        $vaccine = Vaccine::all();
        $patient = User::all();
        $data_batch = Batch::where('centreId','LIKE','%'.$cId.'%')->get();
        $vaccination = Vaccination::where('centreId','LIKE','%'.$cId.'%')->get();
        return view('vaccination.index_admin', ['title' =>$title,'centre' =>$centre, 'active' =>$active, 'patient'=>$patient,'data_batch' =>$data_batch,'vaccination' =>$vaccination, 'vaccine' =>$vaccine]);
    }
    public function appointment($id)
    {
        $cId = auth()->user()->centreName;
        $centre = DB::table('centre')
            ->where('id',$cId)
            ->first();
        $active = "vaccination";
        $title= "Vaccination Information";
        $vaccine = Vaccine::all();
        $patient = User::all();
        $data_batch = Batch::where('centreId',$cId)->get();
        $vaccination = Vaccination::where('centreId',$cId)
                        ->where('batchId',$id)
                        ->get();
        return view('vaccination.detail', ['title' =>$title,'centre' =>$centre, 'active' =>$active, 'patient'=>$patient,'data_batch' =>$data_batch,'vaccination' =>$vaccination, 'vaccine' =>$vaccine]);
    }
    public function confirm(Request $request)
    {   
        $this->validate($request, [
            // 'status' =>'required',
            'remark' =>'required|max:255'
        ]  
        );
        $batch_id = $request->batchId;
        $test = Vaccination::find($request->vaccinationId);
        $userEmail = User::find($test->patientId)->email;
        if($test)
        {
            $test->remarks = $request->remark;
            $test->status = "Confirmed";
            $test->save();
            $details = [
                'title' => 'Notification Vaccination',
                'body' => 'Your appointment request has been confirmed',
                'remarks' =>$request->remark,
                'img'=>'confirm'
            ];
            \Mail::to($userEmail)->send(new \App\Mail\MyEmail($details));
            return  redirect('/vaccinationAppoint/'.$batch_id.'/appointment')->with('success','Successfully confirm the appointment');
        }
        else
        {
            return  redirect('/vaccinationAppoint/'.$batch_id.'/appointment')->with('error','Error confirm the appointment');
        }
    }
        
    public function reject(Request $request)
    {   
        $this->validate($request, [
            'remark' =>'required|max:255'
        ]  
        );
        $batch_id = $request->batchId;
        $test = Vaccination::find($request->vaccinationId);
        $userEmail = User::find($test->patientId)->email;
        if($test)
        {
            $test->remarks = $request->remark;
            $test->status = "Rejected";
            $test->save();
            $details = [
                'title' => 'Notification Vaccination',
                'body' => 'Appointment request rejected. With remarks : ',
                'remarks' =>$request->remark,
                'img' =>'reject'
            ];
            \Mail::to($userEmail)->send(new \App\Mail\MyEmail($details));
            return  redirect('/vaccinationAppoint/'.$batch_id.'/appointment')->with('rejected','Appointment Rejected');
        }
        else
        {
            return  redirect('/vaccinationAppoint/'.$batch_id.'/appointment')->with('error','Error reject the appointment');
        }
        
    }
    public function administrated(Request $request)
    {   
        $this->validate($request, [
            'remark' =>'required|max:255'
        ]  
        );
        $batch_id = $request->batchId;
        $test = Vaccination::find($request->vaccinationId);
        $batch = Batch::find($batch_id);
        // $userEmail = User::find($test->patientId)->email;
        if($test)
        {
            // $batch_increment = Batch::where('id', $batch_id)->increment('quantityAdministrated', 1);
            $batch->increment('quantityAdministered', 1) ;
            $test->remarks = $request->remark;
            $test->status = "Administered";
            $test->save();
            // $details = [
            //     'title' => 'Notification Vaccination',
            //     'body' => 'Appointment request Administrated. With remarks : ',
            //     'remarks' =>$request->remark,
            //     'img' =>'reject'
            // ];
            // \Mail::to($userEmail)->send(new \App\Mail\MyEmail($details));
            return  redirect('/vaccinationAppoint/'.$batch_id.'/appointment')->with('success','Appointment has been administered');
        }
        else
        {
            return  redirect('/vaccinationAppoint/'.$batch_id.'/appointment')->with('error','Error administered the appointment');
        }
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
