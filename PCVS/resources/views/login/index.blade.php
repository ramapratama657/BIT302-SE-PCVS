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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
            @if(session()->has('success'))
            <div class="alert alert-success fade show" role="alert">
              {{ session('success')}}
            </div>
            @endif
            @if(session()->has('loginError'))
            <div class="alert alert-danger fade show" role="alert">
              {{ session('loginError')}}
            </div>
            @endif
            <main class="form-signin">
            <form accept="/login" method="POST">
                @csrf
                <img class="mb-2" src="img/login.jpg" alt="" width="400" height="400">
                <h1 class="h3 mb-3 fw-normal">Please Login</h1>
        
                <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="username" value="{{ old('username') }}" required>
                <label for="username">Username</label>
                @error('usernam')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
                </div><br>
                <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-2">Not Registered? Register now as <a href="/registerHA">HealthCare admin!</a> or <a href="/registerPA">Patient!</a> </small>
            <p class="mt-5 mb-3 text-muted">&copy;PCVS 2021</p>
        </main>
        </div>
    </div>


    
  </body>
</html>
