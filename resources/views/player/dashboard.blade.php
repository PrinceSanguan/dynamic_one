@include('player.header')
@include('player.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Profile</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!---------------------------------------------- Main content ------------------------------------------------------------->
    <div class="content">

       <!-- Profile Image -->
       <div class="card card-primary card-outline">
        <div class="card-body box-profile">
    <!------------------------------------Image--------------------------------------------------------------->
      
      <div class="widget-user-header bg-primary text-center">
        <br>
        <!-- /.widget-user-image -->
        <h3 class="widget-user-username">{{$users->name}}</h3>
        <h5 class="widget-user-desc">{{$users->work}}</h5>
        <br>
      </div>
      <div class="card-footer p-0">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" style="font-size: 1.2em">
              Username: <span class="float-right badge">{{$users->username}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 1.2em">
              Email: <span class="float-right badge">{{$users->email}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 1.2em">
              Address: <span class="float-right badge">{{$users->address}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 1.2em">
              Gender: <span class="float-right badge">{{$users->gender}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 1.2em">
              Gcash Number: <span class="float-right badge">{{$users->number}}</span>
            </a>
          </li>
        </ul>
      </div>


      <div class="small-box bg-warning inner text-center">
        <p style="font-size: 1.5em;">Total Income</p>
        @php
            $income = $users->level === 'starter' ? $totalPoints / 4 : ($users->level === 'premium' ? $totalPoints / 2 : $totalPoints);
            $formattedIncome = number_format($income, 2); // Round off to two decimal places
        @endphp
        <h3 style="">&#8369;{{ $formattedIncome }}</h3>
    </div>

    <!-------------------------------------------------------------------------------------- Main content -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

@include('player.footer')
