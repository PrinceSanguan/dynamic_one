@include('player.header')
@include('player.navbar')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Solve Captcha</h1>
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
  </div>

  <div class="card card-primary">

    <div class="card-header text-center">
        <h3 class="card-title">Captcha</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('player.update_points')}}">
      @csrf
      <div class="card-body text-center">
          <span style="display: inline-block;">{!! captcha_img('inverse') !!}</span>
          <div class="input-wrapper" style="margin-top: 10px;">
              <input type="text" class="form-input" placeholder="Enter Captcha" name="captcha" required>
          </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>

  <div class="small-box bg-warning">
    <div class="inner">
      <h3>{{$users->point}}</h3>

      <p style="font-size: 1.5em;">Total Points</p>
    </div>
    <div class="icon">
      <i class="fas fa-user-plus"></i>
    </div>
  </div>
  <!-------------------------------------------------------------------------------------- Main content -->
      </div>
    </div>
  </div>
</div>
    <!-- /.content-wrapper -->

    @include('player.footer')