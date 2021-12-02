<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>{{ $title }} </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- Style --}}

    <link rel="stylesheet" href="/css/style.css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="row justify-content-center">
        <div class="col-md-5 my-4">
            <main class="form-registration">
            <form action="/registerPA" method="POST">
              @csrf
                <img class="" src="img/doctor.png" alt="" width="400" height="400">
                <h1 class="h3 mb-3 fw-normal">Patient Registration Form</h1>
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
                  <input type="number" name="ic" class="form-control  @error('ic') is-invalid @enderror" id="ic" placeholder="ic" value="{{old('ic')}}">
                  <label for="ic">Identification Card Number</label>
                  @error('ic')
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
                    <input type="password" name="password" class="form-control rounded-bottom  @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password must be at least 8 character, lower case, upper case"> 
                    <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                    <small class="text-start text-primary">**Password must be at least 8 character, lower case, upper case and number</small>
                </div>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                  @csrf
                  
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                </form>
            </form>
            <small class="d-block text-center mt-2">Already have an account ? <a href="/login">Login</a> now!</small>
            <p class="mt-5 mb-3 text-muted">&copy;PCVS 2021</p>
        </main>
        </div>
    </div>
  </body>
</html>
