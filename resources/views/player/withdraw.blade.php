@include('player.header')
@include('player.navbar')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Withdraw</h1>
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

  @if(session('success'))
    <div id="success-alert" class="alert alert-success" style="font-size: 18px; padding: 20px;">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 5000);
    </script>
  @endif

  @if(session('error'))
    <div id="error-alert" class="alert alert-danger" style="font-size: 18px; padding: 20px;">
        {{ session('error') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('error-alert').style.display = 'none';
        }, 5000);
    </script>
  @endif

  <div class="small-box bg-warning inner text-center">
    <p style="font-size: 1.5em;">Total Income</p>
    <h3 style="">&#8369;{{ $users->point }}</h3>
  </div>

  <!-- Withdraw -->
  <div class="card card-primary">
    <div class="card-header center" style="text-align: center;">
        <h3 class="card-title" style="display: inline-block; font-size: 1em;">
            @if($users->level === 'starter')
                Minimum withdrawal for Starter is 50, 100 and 250 pesos
            @elseif($users->level === 'premium')
                Minimum withdrawal for Premium is 150, 5,000 and 10,000 pesos
            @endif
        </h3>
    </div>
</div>
  <!-- Withdraw -->
    <!-- form start -->
    <div class="card">
      <form method="post" action="{{route('withdraw.points')}}">
        @csrf
          <div class="card-body">
              <div class="form-group">
                  <label>Amount</label>
                  <input type="text" class="form-control" name="point" placeholder="amount">
              </div>
          </div>
  
          <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>

  <!-- form start -->
  <!-------------------------------------------------------------------------------------- Main content -->
      </div>
    </div>
  </div>
</div>
    <!-- /.content-wrapper -->


@include('player.footer')