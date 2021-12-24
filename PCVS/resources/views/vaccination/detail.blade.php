@extends('layouts.master')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
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
            
        @elseif(session()->has('rejected'))
        <div class="alert alert-danger fade show" role="alert">
            {{ session('rejected')}}
        </div>
            
        @endif
        @error('remark')
            <div class="alert alert-danger fade show" role="alert">
            {{$message}}
            </div>
        @enderror
    
        <div class="table-responsive">
            <h2 class="text-center">List of Vaccionation Appointment</h2>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Appointment ID</th>                    
                    <th scope="col">Patient IC</th>                    
                    <th scope="col">Patient Name</th>                    
                    <th scope="col">Batch Number</th>                    
                    <th scope="col">Vaccine Name</th>
                    <th scope="col">Manufacture</th>
                    <th scope="col">Appointment Date</th>                    
                    <th scope="col">Expire Date</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Status </th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($vaccination as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$item->id}}</td>
                        <td>{{$patient->find($item->patientId)->ic}}</td>
                        <td>{{$patient->find($item->patientId)->name}}</td>
                        <td>{{$data_batch->find($item->batchId)->batchNo}}</td>
                        <td>{{$vaccine->find($data_batch->find($item->batchId)->vaccineId)->name}}</td>
                        <td>{{$vaccine->find($data_batch->find($item->batchId)->vaccineId)->manufacture}}</td>
                        <td>{{$item->appointmentDate}}</td>
                        <td>{{$data_batch->find($item->batchId)->expiryDate}}</td>
                        <td>{{$item->remarks}}</td>
                        @if ($item->status == "Confirmed")
                            <td class="text-success">{{$item->status}}</td>
                            
                        @elseif($item->status == "Rejected")
                            <td class="text-danger">{{$item->status}}</td>

                        @else
                            <td class="text-primary">{{$item->status}}</td>
                            
                        @endif
                        @if($item->status == "Confirmed")
                            <td><button class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-batch-id-a="{{$item->batchId}}" data-id-a="{{$item->id}}" data-status-a="{{$item->status}}" data-bs-target="#administrated">Administered</button> </td>
    
                        @elseif($item->status == "Rejected")
                            <td> Rejected</td>
                        @elseif($item->status == "Administered")
                            <td> Administered</td>
                        @else
                            <td>
                                <button class="btn btn-success btn-sm"  data-bs-toggle="modal" data-batch-id="{{$item->batchId}}" data-id="{{$item->id}}" data-status="{{$item->status}}" data-date="{{$item->appointmentDate}}" data-bs-target="#confirm">Confirm</button> 
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-batch-id-r="{{$item->batchId}}" data-id-r="{{$item->id}}" data-status-r="{{$item->status}}" data-bs-target="#reject">Reject</button>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </main>
    </div>
</div>
</div>

<!-- Modal Confirm -->
<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="confirmLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/confirm" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="vaccinationId" name="vaccinationId" value="">
                        <input type="hidden" class="form-control" id="batchId" name="batchId" value="">
                    </div>
                    <div class="mb-3">
                        <label for="vaccine" class="form-label">Appointment Date</label>
                        <input type="text" class="form-control" id="appointmentDate" name="appointmentDate" value="" disabled>
                        <input type="hidden" class="form-control" id="status" name="status" value="Confirm" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="remark" class="form-label">Remark</label>
                        <input type="text" class="form-control" id="remark" name="remark" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" type="submit">Confirm The Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
 <!-- Modal reject -->
 <div class="modal fade" id="reject" tabindex="-1" aria-labelledby="rejectLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
            <h5 class="modal-title" id="exampleModalLabel">Reject Appointment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/reject" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="vaccinationIdR" name="vaccinationId" value="">
                        <input type="hidden" class="form-control" id="batchIdR" name="batchId" value="">
                        <input type="hidden" class="form-control" id="status" name="status" value="Rejected" disabled>
                    </div>
                    <div class="mb-0">
                        <label for="remark" class="form-label">Remark</label>
                        <input type="text" class="form-control" id="remark" name="remark" >
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Reject The Appointment</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Administrated -->
<div class="modal fade" id="administrated" tabindex="-1" aria-labelledby="AdministratedLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
            <h5 class="modal-title" id="exampleModalLabel">Administered Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/administrated" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="vaccinationIdA" name="vaccinationId" value="">
                        <input type="hidden" class="form-control" id="batchIdA" name="batchId" value="">
                        <input type="hidden" class="form-control" id="status" name="status" value="Administered" disabled>
                    </div>
                    <div class="mb-0">
                        <label for="remark" class="form-label">Remark</label>
                        <input type="text" class="form-control" id="remark" name="remark" >
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
 
{{-- <script>

$(document).on("show.bs.modal",'#confirm', function (e) {
        var id = $(e.relatedTarget).data('id');
        var status = $(e.relatedTarget).data('status');
        var batch = $(e.relatedTarget).data('batch-id');
        $('#batchId').val(batch);
        $('#statusC').val(status);
        $('#vaccinationId').val(id);
    });
});
$(document).on("show.bs.modal",'#reject', function (a) {
        var id = $(a.relatedTarget).data('id');
        var status = $(a.relatedTarget).data('status');
        var batch = $(a.relatedTarget).data('batch-id');
        $('#batchId').val(batch);
        $('#statusC').val(status);
        $('#vaccinationId').val(id);
    });
});
</script> --}}
<script>
$(document).ready(function () {
    $("#confirm").on("show.bs.modal", function (e) {
        var id = $(e.relatedTarget).data('id');
        var status = $(e.relatedTarget).data('status');
        var batch = $(e.relatedTarget).data('batch-id');
        var date = $(e.relatedTarget).data('date');
        $('#batchId').val(batch);
        $('#statusC').val(status);
        $('#appointmentDate').val(date);
        $('#vaccinationId').val(id);
    });
    $("#reject").on("show.bs.modal", function (a) {
        var id = $(a.relatedTarget).data('id-r');
        var status = $(a.relatedTarget).data('status-r');
        var batch = $(a.relatedTarget).data('batch-id-r');
        $('#batchIdR').val(batch);
        $('#statusCR').val(status);
        $('#vaccinationIdR').val(id);
    });
    $("#administrated").on("show.bs.modal", function (a) {
        var id = $(a.relatedTarget).data('id-a');
        var status = $(a.relatedTarget).data('status-a');
        var batch = $(a.relatedTarget).data('batch-id-a');
        $('#batchIdA').val(batch);
        $('#statusCA').val(status);
        $('#vaccinationIdA').val(id);
    });
});
</script>
{{-- 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script> --}}
@stop