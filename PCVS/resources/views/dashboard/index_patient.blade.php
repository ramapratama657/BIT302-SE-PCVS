@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
    

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 text-secondary text-center">Welcome to the <strong class="text-secondary">Private COVID-19 Vaccination System - PCVS </strong></h1>
        </div>
        <div class="col d-flex justify-content-center">
            <div class="card" style="width: 40rem;">
                <img src="img/vaccine.png" class="card-img-top" alt="vaccine.jpg">
                <div class="card-body">
                  <h3 class="card-title text-center fw-bold">Available Vaccination Batch</h3>
                  <h2 class="card-text text-center ">{{$batch}} Batch</h2>
                  <div class="d-grid gap-2 mt-4">
                      <a href="/vaccination" class="btn btn-primary"><h3>Go Vaccine</h3></a>
                  </div>
                </div>
            </div>
        </div>
        
        {{-- <br>
        <img src="img/medical-black.svg" alt="" style="width: 30%" class="d-block mx-auto"> --}}
        </main>
    </div>
</div>
@stop