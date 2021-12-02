<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      @if(auth()->user()->role == 'admin' or auth()->user()->role == 'master')
      <li class="nav-item"><a class="nav-link {{ ($active =='dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
      @if(auth()->user()->username == 'admin1')
      <li class="nav-item"><a class="nav-link {{ ($active =='users') ? 'active' : ''}}" aria-current="page" href="/registerHA"><i class="fas fa-user"></i> Add Administrator</a></li>
      @endif
      @elseif(auth()->user()->role == 'admin')
      <li class="nav-item"><a class="nav-link {{ ($active =='dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
      @elseif(auth()->user()->role == 'patient')
      <li class="nav-item"><a class="nav-link {{ ($active =='dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard_p"><i class="fas fa-home"></i> Dashboard</a></li>
      @endif
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Manage</span>
      <a class="link-secondary" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-auto ">
      @if (auth()->user()->role == 'admin' or auth()->user()->role == 'master')
      <li class="nav-item">
        <a class="nav-link {{ ($active =="batch") ? 'active' : ''}}" href="/batch">
          <i class="far fa-list-alt"></i>
           Vaccine Batch information
        </a>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link {{ ($active =="vaccination") ? 'active' : ''}}" href="/vaccination">
          <i class="far fa-list-alt"></i>
           Vaccination 
        </a>
      </li>
      @endif
    </ul>
    <hr>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a href="" class="nav-link px-3" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </li>
    </ul>
  </div>

</nav>

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
