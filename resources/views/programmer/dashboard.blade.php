@include('programmer.header')
@include('programmer.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Programmer Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      
<div class="row">

<!--------------------------------Pending Account---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-blue">
    <div class="inner">
      <h3>{{ $pendingAccounts }}</h3>

      <p>Pending Account</p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
    <a class="small-box-footer">
     <i class="fas fa-users"></i>
    </a>
  </div>
</div>
<!--------------------------------Pending Account---------------------------------------------->

<!--------------------------------Total Player Account---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-red">
    <div class="inner">
      <h3>{{ $totalPlayerAccounts }}</h3>

      <p>Total Player Account</p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
    <a class="small-box-footer">
      <i class="fas fa-users"></i>
     </a>
  </div>
</div>
<!--------------------------------Total Player Account---------------------------------------------->

<!--------------------------------Total CO CEO Account---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3>{{ $totalCoceoAccounts }}</h3>

      <p>Total CO CEO Account</p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
    <a class="small-box-footer">
      <i class="fas fa-users"></i>
     </a>
  </div>
</div>
<!--------------------------------Total CO CEO Account---------------------------------------------->

<!--------------------------------Total Activator Account---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-pink">
    <div class="inner">
      <h3>{{ $totalActivatorAccounts }}</h3>

      <p>Total Activator Account</p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
    <a class="small-box-footer">
      <i class="fas fa-users"></i>
     </a>
  </div>
</div>
<!--------------------------------Total Activator Account---------------------------------------------->

<!--------------------------------Total Head Admin Account---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-violet">
    <div class="inner">
      <h3>{{ $totalHeadadminAccounts }}</h3>

      <p>Total Head Admin Account</p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
    <a class="small-box-footer">
      <i class="fas fa-users"></i>
     </a>
  </div>
</div>
<!--------------------------------Total Head Admin Account---------------------------------------------->

<!--------------------------------Total Admin Account---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-indigo">
    <div class="inner">
      <h3>{{ $totalAdminAccounts }}</h3>

      <p>Total Admin Account</p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
    <a class="small-box-footer">
      <i class="fas fa-users"></i>
     </a>
  </div>
</div>
<!--------------------------------Total Admin Account---------------------------------------------->

<!--------------------------------Points---------------------------------------------->
<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3>{{ $totalPoints }}</h3>

      <p>Total Points Circulated</p>
    </div>
    <div class="icon">
      <i class="fas fa-wallet"></i>
    </div>
    <a class="small-box-footer">
      <i class="fas fa-users"></i>
     </a>
  </div>
</div>
<!--------------------------------Points---------------------------------------------->
</div>
    </div>
    <!-------------------------------------------------------------------------------------- Main content -->
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

@include('programmer.footer')