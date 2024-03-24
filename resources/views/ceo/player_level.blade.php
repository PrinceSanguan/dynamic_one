@include('ceo.header')
@include('ceo.navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Modify Player Level</h1>
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
              <th>Username</th>
              <th>Name</th>
              <th>Points</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if ($data)
                @foreach ($data as $datas)

                      <td>{{ $datas->username }}</td>
                      <td>{{ $datas->name }}</td>
                      <td>{{ $datas->point }}</td>
                      <td>{{ ucfirst($datas->level) }}</td>
                      <td>
                        <form action="{{ route('ceo.update_level', ['id' => $datas->id]) }}" method="post">
                          @csrf
                          @method('patch')
                      
                          <input type="radio" id="starter" name="level" value="starter" {{ $datas->level === 'starter' ? 'checked' : '' }} required>
                          <label for="starter">Starter</label><br>
                          <input type="radio" id="premium" name="level" value="premium" {{ $datas->level === 'premium' ? 'checked' : '' }}>
                          <label for="premium">Premium</label><br>
                        
                          <button type="submit" class="btn btn-success">
                              Submit
                          </button>
                      </form>
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

@include('ceo.footer')