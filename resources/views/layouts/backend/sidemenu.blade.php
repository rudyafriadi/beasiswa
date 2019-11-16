  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('assets/dist/img/logo-anambas.jpg')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-Beasiswa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          {{-- <a href="#" class="d-block">Ferry Ferdinand, SH</a> --}}
          <a id="navbarDropdown" class="d-block" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{Auth::user()->name}} <span class="caret"></span>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Beasiswa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/prestasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Beasiswa Prestasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/nonprestasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Beasiswa Non Prestasti</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="/universitas" class="nav-link">
              <i class="fas fa-university nav-icon"></i>
              <p>Data Universitas</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/mahasiswa" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Mahasiswa
                <span class="badge badge-danger right">{{$countmahasiswa}}</span>
              </p>
            </a>
          </li>
          
          @if (auth::user()->role_id == 1 || auth::user()->role_id == 2)
          <li class="nav-item">
            <a href="/user" class="nav-link">
              <i class="fas fa-users-cog nav-icon"></i>
              <p>Managemen User</p>
            </a>
          </li>
          @endif

          @if (auth::user()->role_id == 1 || auth::user()->role_id == 2)
          <li class="nav-item">
            <a href="/laporan" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>