@extends('layouts.main')
@section('container')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<!-- Info Panel -->
<section id="about">
    <div class="container-flex  background-blue pt-5">
        <div class="container ">
            <div class="info">
                <h1 class="my-5">Benefits of Getting a COVID-19 Vaccine</h1>
                <div class="row mb-5">
                    <div class="col-lg">
                    <div class="slot">
                        <div class="circle mb-2">
                            <i class="fas fa-shield-virus"></i>
                        </div>
                        <h3 class="text-center">Immunity after COVID-19 vaccination</h3>
                        {{-- <div class="description">All of our vehicles can accommodate a lot of capacity, so they can carry a lot of goods for shipping.</div> --}}
                    </div>
                    </div>
                    <div class="col-lg">
                    <div class="slot">
                        <div class="circle mb-2">
                            <i class="fas fa-medkit"></i>
                        </div>
                        <h3 class="text-center">COVID-19 vaccines are effective</h3>
                        {{-- <div class="description">Affordable prices and competitive with other competitors.</div> --}}
                    </div>
                    </div>
                    <div class="col-lg ">
                    <div class="slot ">
                        <div class="circle mb-2">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 class="text-center">COVID-19 vaccines are safe </h3>
                        {{-- <div class="description">We guarantee the safety of your goods to arrive at their destination.</div> --}}
                    </div>
                    </div>
                    <div class="col-lg ">
                    <div class="slot ">
                        <div class="circle mb-2">
                            <i class="fas fa-virus-slash"></i>
                        </div>
                        <h3 class="text-center">COVID-19 vaccine protects against illness</h3>
                        {{-- <div class="description">We guarantee the safety of your goods to arrive at their destination.</div> --}}
                    </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>      
    </div>
</section>
<div class="section-show">
    <div class="row">
        <div class="col-md-6 how-img">
            <img src="img/vaccine-bro.png" class="rounded-circle img-fluid" alt=""/>
        </div>
        <div class="col-md-6">
            <h4>Let's get vaccinated !</h4>
                        <h4 class="subheading">Let's get to immunity.</h4>
                        <br>
        <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet nisi veritatis necessitatibus laudantium dicta autem vero at tenetur, iusto hic sint perspiciatis harum, deleniti laboriosam veniam! Veritatis blanditiis modi ut. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt eveniet explicabo, nostrum recusandae corrupti iusto ducimus soluta hic delectus aperiam voluptatibus, saepe ad corporis sapiente totam dolorem tenetur incidunt quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore sunt beatae, iure blanditiis optio, vel, magnam cumque nesciunt animi eaque nisi sequi consectetur quibusdam eius distinctio voluptates est ipsam inventore.</p>
        <br>
        @if(Auth::user())
            @auth
                @if(auth()->user()->role == 'patient')
                    <a href="/vaccination" class="btn btn-primary">Request Vaccination Appointment</a>         
                @endif
            @endauth

            @auth
            @if(auth()->user()->role == 'admin')
                <a href="/dashboard" class="btn btn-primary">Request Vaccination Appointment</a>    
            @endif
            @endauth
        @else
        <a href="/login" class="btn btn-primary">Request Vaccination Appointment</a>        
        @endif
    </div>
</div>

</div>
<div class="container-fluid">
    <footer>
        <div class="bg-light py-4">
            <div class="container text-center">
                <p class="text-dark mb-0 py-2">© 2021 PCVS</p>
            </div>
        </div>
    </footer>

</div>
<!-- Small modal -->
<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="text-center"><i class="fas fa-sign-out-alt"></i></h2>
        <p class="text-center">Are you sure you want to log-out? <br/></p>
        <div class="d-flex justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a href="/logout" class="btn btn-primary mx-2">Log out</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End info panel -->
@endsection
