<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       

        <!-- Messages Dropdown Menu -->
   
        <!-- Notifications Dropdown Menu -->
     
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
       
        <div class="dropdown me-4">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span><i class="bi bi-people"></i> {{Auth::user()->name}}</span>
            </button>
            <ul class="dropdown-menu p-0 m-0">
              <li><a class="dropdown-item bg-danger rounded btn-sm fw-bold " href="{{route('logout')}}">Logout <i class="bi bi-box-arrow-right"></i></a></li>
             
            </ul>
          </div>
        
    </ul>
</nav>