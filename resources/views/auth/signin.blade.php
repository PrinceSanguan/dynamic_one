@include('auth.header')

  <body>
    
    <div class="page d-flex justify-content-center">
    <div class="container bg-light">
      <div class="row main-row">
        <div class="col-md-6 d-flex main-svg">
          <img class="svg-img" src="{{asset('index/images/daynamic-one.png')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 d-flex main-content">
          <div class="row">
            <div class="col-md-11">
              <div class="mb-4">
                <h2 class="display-3 text-center">DYNAMIC ONE<span style="color: #AD50A7;"></span></h2>
              <p class="mb-4">You need to <strong class="text-dark">Approved</strong> to access this website. If you successfully approved <a href="{{route('auth.login')}}"><strong>Log in </strong></a>Here.</p>
            </div>

            <form  action="{{ route('signin.form') }}" method="post">
              @csrf

              @error('referral_id')
                    <div class="text-danger">{{ $message }}</div>
              @enderror

            @if($referralCode)
              <div class="form-group">
                  <label for="referral_id" style="display: none;">Referral ID</label>
                  <input type="hidden" class="form-control" name="referral_id" value="{{ $referralCode }}">
              </div>
            @endif

              <div class="form-group">
                <label for="username">Unique Username</label>
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                  @error('username')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                <label for="Complete_name">Complete Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                  @error('email')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                <label for="present_work">Present Work</label>
                <input type="text" class="form-control" name="work" value="{{ old('work') }}" required>
                  @error('work')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                  @error('address')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                <label for="Gender">Gender</label>
                <div>
                    <label>
                        <input type="radio" name="gender" value="male" required> Male
                    </label>
                    <label>
                        <input type="radio" name="gender" value="female" required> Female
                    </label>
                </div>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
                  @error('password')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                <label for="password">Retype Password</label>
                <input type="password" class="form-control" name="password_confirmation" required>
                  @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                <label for="password">Gcash Number</label>
                <input type="text" class="form-control" name="number" value="{{ old('number') }}" required>
                  @error('number')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <input type="submit" value="Sign In" class="btn text-white btn-block">

            </form>

            </div>
          </div>
          
        </div>
      </div>
    </div>
    </div>

  </body>
</html>
