@extends('layouts.master')

@section('content')
  <div class="container-fluid">
      <div class="row">
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-center">
              <h2>Add Healthcare Administrator </h2>
              <small><strong>{{$centre->centreName}}</strong>, {{$centre->address}}</small>
          </div>
            @if(session()->has('success'))
            <div class="alert alert-success fade show" role="alert">
              {{ session('success')}}
            </div>
            @endif
            @error('centreName')
              <div class="alert alert-danger fade show" role="alert">
                {{$message}}
              </div>
            @enderror
            @error('password')
              <div class="alert alert-danger fade show" role="alert">
                {{$message}}
              </div>
            @enderror
            @error('username')
              <div class="alert alert-danger fade show" role="alert">
                {{$message}}
              </div>
            @enderror
            @error('name')
              <div class="alert alert-danger fade show" role="alert">
                {{$message}}
              </div>
            @enderror
            @error('staffID')
              <div class="alert alert-danger fade show" role="alert">
                {{$message}}
              </div>
            @enderror
            @error('email')
            <div class="alert alert-danger fade show" role="alert">
                {{$message}}
            </div>
            @enderror
            @error('centre')
              <div class="alert alert-danger fade show" role="alert">
                {{$message}}
              </div>
            @enderror
            @error('address')
              <div class="alert alert-danger fade show" role="alert">
                {{$message}}
              </div>
            @enderror
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> Register health centre</button>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalRegister"> Add New Healthcare Administrator</button>
           
            <div class="table-responsive mt-4">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Staff Id</th>
                    <th scope="col">Full Name</th>                    
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Health Centre</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($data_user as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$item->staffID}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$centres->find($item->centreName)->centreName}}</td>                      
                    </tr>
                @endforeach
                </tbody>
            </table>
          </div>
      </div>
              
    </div>
    <!-- Modal Register -->
    <div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="modalRegisterLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalRegisterLabel">Register new Healthcare Administrator</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/registerHA" method="POST">
              @csrf
              <select class="form-select @error('centre') is-invalid @enderror" aria-label="Default select example" name="centre" required>
                <option selected value="">Select the Health Care Centre</option>
                @foreach($centres as $centres)
                  <option value="{{$centres->id}}">{{$centres->centreName}}, {{$centres->address}}</option>
                @endforeach
              </select>
              @error('centre')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
              <br>
              <small>Health Centre not available? </small>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> Register health centre</button>
              <br><br>
              
              <div class="form-floating">
                  <input type="text" name="username" class="form-control rounded-top @error('username') is-invalid @enderror" id="username" placeholder="Username" value="{{old('username')}}">
                  <label for="name">Username</label>
                  @error('username')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
              <div class="form-floating">
                  <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{old('name')}}">
                  <label for="name">Full Name</label>
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
              <div class="form-floating">
                <input type="number" name="staffID" class="form-control  @error('staffID') is-invalid @enderror" id="staffID" placeholder="staffID" value="{{old('staffID')}}">
                <label for="staffID">Staff ID</label>
                @error('staffID')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
              <div class="form-floating">
                  <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}">
                  <label for="email">Email address</label>
                  @error('email')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
              <div class="form-floating">
                  <input type="password" name="password" class="form-control rounded-bottom  @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password"> 
                  <label for="floatingPassword">Password</label>
                  @error('password')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
            </form>
        </div>
      </div>
    </div>
    <!-- End Modal Register admin -->
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Register new Health Centre</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/addCentre" method="post">
              @csrf
              <div class="mb-3">
                <label for="centreName" class="form-label">Centre name</label>
                <input type="text" class="form-control" id="centreName" name="centreName" required>
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

@stop