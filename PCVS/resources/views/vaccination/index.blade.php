@extends('layouts.master')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
@section('content')
<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-center">
            <h2>Vaccine Batch </h2>
            
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success fade show" role="alert">
            {{ session('success')}}
        </div>
        @endif
        @error('appointmentDate')
              <div class="alert alert-danger fade show" role="alert">
                {{$message}}
              </div>
        @enderror
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="/vaccination">
                        <div class="input-group mb-3">
                            <select class="form-select" name="search" onchange="javascript:this.form.submit()">
                                <option selected value="" disabled>Select the vaccine</option>
                                @foreach($vaccine as $vaccines)
                                <option value="{{$vaccines->id}}" {{($id == $vaccines->id) ? 'selected' : ''}}>{{$vaccines->name}}, {{$vaccines->manufacture}}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto mb-2">
                <a class="btn btn-secondary btn-sm mx-auto" href="/vaccination">Show all</a>
            </div>
            <br>
            <div class="row">
            @foreach ($batch as $item)
                <div class="col-md-3">
                    <div class="card" style="width: 100%;">
                        <img src="/img/vaccine1.jpg" class="card-img-top" alt="vaccine">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$vaccine->find($item->vaccineId)->name}} ({{$item->batchNo}})</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$centre->find($item->centreId)->centreName}}, {{$centre->find($item->centreId)->address}}</li>
                                <li class="list-group-item">Batch No : {{$item->batchNo}}</li>
                                <li class="list-group-item">Quantity Available: {{$item->quantityAvailable}}</li>
                                <li class="list-group-item"><small class="text-muted">Expiry date: {{$item->expiryDate}}</small></li>
                            </ul>
                             <div class="d-grid gap-2">
                                <button type="button" class="btn btn-primary btn-sm user_dialog" data-id="{{$item->id}}" data-centre="{{$centre->find($item->centreId)->centreName}}" data-expiry=" {{$item->expiryDate}}" data-bs-toggle="modal" data-bs-target="#exampleModal">Request Appointment</button>
                             </div>
                        </div>
                    </div>
                </div>    
                @endforeach
            </div>    
            <div class="text-right mt-4">
                Total Data : {{ $batch->total() }} <br/>
                Data shown per page : {{ $batch->perPage() }} <br/>
            </div>    
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $batch->links() }}
        </div>
        
    </main>
</div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Request Appointment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/appointment" method="post">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="centre">Health Centre Name</label>
                <input type="text" class="form-control" id="centre" name="centre" value="" disabled>
            </div>
            <input type="hidden" class="form-control" id="batchId" name="batchId" value="">
            <div class="mb-3">
              <label for="appointmentDate" class="form-label">Appoinment Date</label>
              <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Request</button>
          </div>
        </div>
    </form>
    </div>
  </div>
</div>
<script>
 $(document).ready(function () {
    $("#exampleModal").on("show.bs.modal", function (e) {
        var id = $(e.relatedTarget).data('id');
        $('#batchId').val(id);
        var centre = $(e.relatedTarget).data('centre');
        $('#centre').val(centre);
    });
    // $("#exampleModal").on("show.bs.modal", function (e) {
    //     var expiry = $(e.relatedTarget).data('expiry');
    //     // $("#appointmentDate").attr({
    //     //     "max" : "10-11-2021"
    //     // });
    //     document.getElementById("appointmentDate").setAttribute("max", expiry);
    // }
});
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script> -->

@stop