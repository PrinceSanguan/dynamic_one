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
      <a href="{{route('player.dashboard')}}" class="nav-link">{{ $users->name }}</a>
    </li>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a class="brand-link">
    <span class="brand-text font-weight-light" style="color: 
        {{ $users->level === 'starter' ? 'yellow' : ($users->level === 'premium' ? 'green' : 'inherit') }}">
        {{ $users->level === 'starter' ? 'Starter Account' : ($users->level === 'premium' ? 'Premium Account' : 'Regular Account') }}
    </span>
</a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <a href="{{route('player.dashboard')}}" class="d-block">{{ $users->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

      <li class="nav-header" style="font-size: 1.2em; color: yellow;">USER</li>

{{--    <li class="nav-item menu-open" style="margin-bottom: 10px;">
           <a href="{{route('withdraw')}}" class="nav-link">
            <i class="nav-icon fas fa-money-bill-alt"></i>
            <p>
              WITHDRAW
            </p>
          </a>
        </li> --}}

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
           <a href="{{route('player.solve_captcha')}}" class="nav-link">
            <i class="nav-icon fas fa-tv"></i>
            <p>
              SOLVE CAPTCHA
            </p>
          </a>
        </li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="{{route('withdraw')}}" class="nav-link">
            <i class="nav-icon fas fa-money-bill-alt"></i>
            <p>
              WITHDRAW
            </p>
          </a>
        </li>

{{--    <li class="nav-item menu-open" style="margin-bottom: 10px;">
           <a href="{{route('transactions')}}" class="nav-link"> 
            <i class="nav-icon fas fa-money-bill-alt"></i>
            <p>
              TRANSACTIONS
            </p>
          </a>
        </li> --}}

        <li class="nav-header" style="font-size: 1.2em; color: yellow;">SETTINGS</li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
           <a href="{{route('player.change_password')}}" class="nav-link"> 
            <i class="nav-icon fas fa-key"></i>
            <p>
              CHANGE PASSWORD
            </p>
          </a>
        </li>

        <li class="nav-item menu-open" style="margin-bottom: 10px;">
          <a href="{{route('logout')}}" class="nav-link">
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