<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item d-sm-inline">
      <a href="{{route('programmer.dashboard')}}" class="nav-link">{{ $users->name }}</a>
    </li>
</nav>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a class="brand-link">
    <h4 class="brand-text font-weight-light">Programmer Account</h4>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <a href="{{route('programmer.dashboard')}}" class="d-block"> {{ $users->name }} </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
  
          <li class="nav-header" style="font-size: 1.2em; color: yellow;">FOR ACTIVATION</li>
  
          <li class="nav-item menu-open" style="margin-bottom: 10px;">
               <a href="{{ route('programmer.pending_account') }}" class="nav-link {{ Route::is('programmer.pending_account') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-hourglass-half fa-spin"></i>
                  <p>
                      PENDING ACCOUNT
                  </p>
              </a>
          </li>

          <li class="nav-header" style="font-size: 1.2em; color: yellow;">ALL ACCOUNT</li>
  
          <li class="nav-item menu-open" style="margin-bottom: 10px;">
               <a href="{{ route('programmer.all_account') }}" class="nav-link {{ Route::is('programmer.all_account') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user fa-spin"></i>
                  <p>
                      ACCOUNTS
                  </p>
              </a>
          </li>

          <li class="nav-item menu-open" style="margin-bottom: 10px;">
             <a href="{{ route('programmer.player_level') }}" class="nav-link {{ Route::is('programmer.player_level') ? 'active' : '' }}">
               <i class="nav-icon fas fa-user fa-spin"></i>
               <p>
                   PLAYER LEVEL
               </p>
           </a>
       </li>

          <li class="nav-item menu-open" style="margin-bottom: 10px;">
           {{--  <a href="{{ route('programmer.transaction') }}" class="nav-link {{ Route::is('programmer.transaction') ? 'active' : '' }}"> --}}
                <i class="nav-icon fas fa-wallet fa-spin"></i>
                <p>
                    TRANSACTIONS
                </p>
            </a>
        </li>

          <li class="nav-item menu-open" style="margin-bottom: 10px;">
           {{--  <a href="{{ route('programmer.level') }}" class="nav-link {{ Route::is('programmer.level') ? 'active' : '' }}"> --}}
                <i class="nav-icon fas fa-layer-group fa-spin"></i>
                <p>
                    PLAYER LEVEL
                </p>
            </a>
        </li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          {{-- <a href="{{ route('programmer.wallet') }}" class="nav-link {{ Route::is('programmer.wallet') ? 'active' : '' }}"> --}}
              <i class="nav-icon fas fa-wallet fa-spin"></i>
              <p>
                  TRIAL PROMO
              </p>
          </a>
        </li>
  
          <li class="nav-item menu-open" style="margin-bottom: 10px;">
              <a href="{{ route('logout') }}" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt fa-spin"></i>
                  <p>
                      LOGOUT
                  </p>
              </a>
          </li>
  
      </ul>
  
  </nav>
  
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>