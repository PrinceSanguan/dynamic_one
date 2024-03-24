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
                                <p class="mb-4">
                                    To access this website, you must have an account. If you don't have an account, please <a href="{{route('signin')}}"><strong>Sign Up </strong></a>Here.
                                </p>
                            </div>

                            @if(session('error'))
                            <div class="alert alert-danger" style="font-size: 18px; padding: 20px;">
                                {{ session('error') }}
                            </div>
                            @endif

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

                            <form action="{{route('login.post')}}" method="post">
                                @csrf

                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username">

                                </div>

                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password">

                                </div>

                                 <input type="submit" value="Log In" class="btn text-white btn-block"> 

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>