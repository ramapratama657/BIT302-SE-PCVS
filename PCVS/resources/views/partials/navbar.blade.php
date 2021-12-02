<nav class="navbar navbar-dark sticky-top navbar-expand-lg" style="background-color: #369fe9;" aria-label="Tenth navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-md-center text-white " id="navbarsExample08">
        <ul class="navbar-nav ">
          <li class="navbar-brand">
            <a class="navbar-brand mx-2" aria-current="page" href="#">PCVS</a>
          </li>
            <li class="nav-item mx-2 text-uppercase fw-bold">
               <a class="nav-link {{($title == "Home" ? 'active' : '')}}" href="/">Home</a>
            </li>
            <li class="nav-item mx-2 text-uppercase fw-bold">
                <a class="nav-link {{($title == "About" ? 'active' : '')}}" href="#about">About</a>
            </li>
            @auth
            <li class="nav-item dropdown mx-2 " >
                <a class="nav-link dropdown-toggle text-uppercase fw-bold" href="#" id="dropdown08" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Wellcome {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdown08" >
                    @if (auth()->user()->role == 'admin')
                    <li><a class="dropdown-item" href="/dashboard"> <i class="fas fa-home"> Dashboard</i></a></li>  
                    @else
                    <li><a class="dropdown-item" href="/dashboard_p"><i class="fas fa-home"> Dashboard</i></a></li>  
                    @endif
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="" data-bs-target="#logoutModal" data-bs-toggle="modal"><i class="fas fa-sign-out-alt"> Logout</i></a></li>
                </ul>
            </li>
            @else 
            <li class="nav-item fw-bold">
                <a class="nav-link " href="/login">LOGIN or REGISTER</a>
            </li>
            @endauth
        </ul>
      </div>
    </div>
  </nav>