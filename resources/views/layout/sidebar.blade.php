<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('img/delta1.webp') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">DeltaSoft System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- SidebarSearch Form -->
        <div class="form-inline mt-1">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Project
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::user() && Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a href="{{ route('project.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Project</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('project.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Project</p>
                                </a>
                            </li>
                        @elseif(Auth::user()->role !== 'admin')
                            <li class="nav-item">
                                <a href="{{ route('project.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Project</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <h2>Data Not Found</h2>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    @if (Auth::user() && Auth::user()->role === 'admin')
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Employee
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('employee') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Employee</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('employindex') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Employee</p>
                                </a>
                            </li>
                        @else
                            {{-- <li class="nav-item">
                            <a href="{{ route('employindex') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee Can see</p>
                            </a>
                        </li> --}}
                    @endif

            </ul>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
