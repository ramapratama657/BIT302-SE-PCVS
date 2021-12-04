@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-center">
            <h2>{{ $centre->centreName }} Health Centre</h2>
            <small > {{$centre->address}}</small>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card p-3">
                <div class="card-body ">
                    <h5 class="card-title text-center"><i class="far fa-pause-circle"></i> <span class="text-danger">Pending</span> Appointment</h5>
                    <h2 class="card-text text-center">{{$pending}} Request</h2>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card p-3">
                <div class="card-body">
                    <h5 class="card-title text-center"><i class="fas fa-check-circle"></i> <span class="text-success">Confirmed</span> Appointment</h5>
                    <h2 class="card-text text-center">{{$confirm}} Request</h2>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card p-3">
                <div class="card-body">
                    <h5 class="card-title text-center"><i class="far fa-calendar-check"></i> <span class="text-primary">Administrated</span> Appointment</h5>
                    <h2 class="card-text text-center">{{$adminis}} Appointment</h2>
                </div>
                </div>
            </div>
        </div>
        <img src="img/health.svg" alt="" style="width:40%" class="mx-auto d-block">
        </main>
    </div>
</div>
@stop