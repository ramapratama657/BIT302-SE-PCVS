
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login </title>

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

<img class="mb-2 rounded mx-auto d-block" src="img/login.jpg" alt="" width="400" height="400">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(session()->has('success'))
                <div class="alert alert-success fade show" role="alert">
                    {{ session('success')}}
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger fade show" role="alert">
                    {{ session('error')}} 
                </div>
                @endif
                <div class="card-header text-center">Please Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username Or Email</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required  autofocus>
                                @error('username')
                        
                                    <span class="invalid-feedback" role="alert">
                        
                                        <strong>{{ $message }}</strong>
                        
                                    </span>
                        
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<small class="d-block text-center mt-2">Not Registered?<a href="/registerPA"> Register now !</a> </small>
            <p class="mt-5 mb-3 text-muted text-center">&copy;PCVS 2021</p>
        </main>
        </div>
    </div>


    
  </body>
</html>
