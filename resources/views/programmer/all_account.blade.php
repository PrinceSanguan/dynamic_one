@include('programmer.header')
@include('programmer.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Account</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!----------------------------------------------- Main content -------------------------------------->
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
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>Type of Account</th>
              <th>Username</th>
              <th>Name</th>
              <th>Email</th>
              <th>Work</th>
              <th>Address</th>
              <th>Gender</th>
              <th>Gcash Number</th>
              <th>Points</th>
              <th>Status</th>
              <th>Level</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if ($data)
                @foreach ($data as $datas)
                    <tr>
                      <td>{{ ucfirst($datas->type) }}</td>
                      <td>{{ $datas->username }}</td>
                      <td>{{ $datas->name }}</td>
                      <td>{{ $datas->email }}</td>
                      <td>{{ $datas->work }}</td>
                      <td>{{ $datas->address }}</td>
                      <td>{{ $datas->gender }}</td>
                      <td>{{ $datas->number }}</td>
                      <td>{{ $datas->point }}</td>
                      <td>{{ ucfirst($datas->status) }}</td>
                      <td>{{ $datas->level }}</td>
                      <td>{{ $datas->created_at->format('F j, Y g:ia') }}</td>
                      <td>
                        <a href="{{ route('programmer.delete_account', ['id' => $datas->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the account?')">Delete</a>
                    </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
      </table>
  </div>
    
    <!----------------------------------------------- Main content -------------------------------------->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

@include('programmer.footer')