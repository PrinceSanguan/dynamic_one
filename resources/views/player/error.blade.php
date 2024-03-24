@include('player.header')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ERROR</h1>
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
  <div class="card card-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-info">
      <h3 class="widget-user-username">{{ $users->name }}</h3>
      <h5 class="widget-user-desc">{{ $users->work }}</h5>
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-sm-4 border-right">
          <div class="description-block">

          </div>
          <!-- /.description-block -->
        </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </div>

  <div class="small-box bg-danger">
    <div class="inner">
        @if(session('error'))
            <p style="color: aliceblue; font-size: 1.6rem; text-align: center;">{{ session('error') }}</p>
            <p style="font-size: 1.5rem; text-align: center;">Redirecting back to the dashboard in <span id="countdown">10</span> seconds...</p>
        @endif 
    </div>
  </div>
  <!-------------------------------------------------------------------------------------- Main content -->
      </div>
    </div>
  </div>
</div>
    <!-- /.content-wrapper -->

@include('player.footer')



