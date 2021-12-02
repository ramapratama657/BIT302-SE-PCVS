<?php namespace App\Http\Controllers;

use App\Models\Vaccination;


?>
@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-center">
            <h2>Vaccine Batch </h2>
            <small > <strong>{{$centre->centreName}}</strong>, {{$centre->address}}</small>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success fade show" role="alert">
            {{ session('success')}}
        </div>
        @endif
        @error('centreId')
              <div class="alert alert-danger fade show" role="alert">
                {{$message}}
              </div>
        @enderror
        @error('batchNo')
            <div class="alert alert-danger fade show" role="alert">
            {{$message}}
            </div>
        @enderror
        @error('vaccineId')
            <div class="alert alert-danger fade show" role="alert">
            {{$message}}
            </div>
        @enderror
        @error('quantityAvailable')
            <div class="alert alert-danger fade show" role="alert">
            {{$message}}
            </div>
        @enderror
        @error('expiryDate')
            <div class="alert alert-danger fade show" role="alert">
            {{$message}}
            </div>
        @enderror
        <div class="table-responsive">
            <caption>List of batch</caption><br>
            <button type="button" class="btn btn-secondary my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Record vaccine batch</button>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Batch Number</th>                    
                    <th scope="col">Vaccine Name</th>
                    <th scope="col">Expire Date</th>
                    <th scope="col">Quantity of Doses Available</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($data_batch as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$item->batchNo}}</td>
                        <td>{{$vaccine->find($item->vaccineId)->name}}</td>
                        <td>{{$item->expiryDate}}</td>
                        <td>{{$item->quantityAvailable}}</td>
                        @if (Vaccination::whereIn('status',['Pending'])->where('batchId',$item->id)->count()>0)
                            <td><a href="/vaccinationAppoint/{{$item->id}}/appointment" class="btn btn-secondary btn-sm position-relative">Detail <span class="badge position-absolute top-0 left-100 translate-middle bg-danger">{{Vaccination::whereIn('status',['Pending'])->where('batchId',$item->id)->count()}}</span></a></td>
                        @elseif(Vaccination::whereIn('status',['Confirmed'])->where('batchId',$item->id)->count()>0)
                            <td><a href="/vaccinationAppoint/{{$item->id}}/appointment" class="btn btn-secondary btn-sm position-relative">Detail <span class="badge position-absolute top-0 left-100 translate-middle bg-success">{{Vaccination::whereIn('status',['Confirmed'])->where('batchId',$item->id)->count()}}</span></a></td>
                        @else
                            <td><a href="/vaccinationAppoint/{{$item->id}}/appointment" class="btn btn-secondary btn-sm">Detail </a></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
          </div>
          
        </main>
    </div>
</div>

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Record new vaccine batch</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="/addBatch" method="post">
                @csrf
                <div class="mb-3">
                <label for="vaccine" class="form-label">Select Vaccine</label>
                <select class="form-select @error('vaccine') is-invalid @enderror" aria-label="Default select example" name="vaccineId" >
                        <option selected value="">Select the vaccine</option>
                        @foreach($vaccine as $vaccines)
                        <option value="{{$vaccines->id}}">{{$vaccines->name}}, {{$vaccines->manufacture}}</option>
                        @endforeach
                </select>
                </div>
                <div class="mb-3">
                    <label for="batchNo
                    batchNo" class="form-label">Bacth Number</label>
                    <input type="number" class="form-control" id="batchNo" name="batchNo" >
                </div>
                <div class="mb-3">
                    <label for="expiryDate" class="form-label">Expiry Date</label>
                    <input type="date" class="form-control" id="expiryDate" name="expiryDate" >
                </div>
                <div class="mb-3">
                    <label for="quantityAvailable" class="form-label">Quantity of doses available </label>
                    <input type="number" class="form-control" id="quantityAvailable" name="quantityAvailable" >
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
 
@stop