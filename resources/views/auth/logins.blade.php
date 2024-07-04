<link href="/frontend/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="/frontend/css/tiny-slider.css" rel="stylesheet">
  <link href="/frontend/css/style.css" rel="stylesheet">
  <style>
    .form-group{
        margin-top: 20px;
    }
    .btn-facebook{
        margin-top: 10px;
    }
    .btn-register{
        margin-top: 10px;
    }
    .card{
        background: #3b5d50;
        border-radius: 25px;
        padding: 20px;
    }
  </style>
<body>
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-12 col-lg-3 mb-2 mb-lg-0 bg-login-image">
                            <img src="frontend/images/susumooo.png" alt="Image" class="img-fluid">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-white mb-4">Welcome to Susu Mooo!</h1>
                                </div>
                                <form class="user" method="POST" action="{{route('login-proses')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="username" type="text"
                                            class="form-control form-control-user @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" placeholder="Username" required autocomplete="username" autofocus>
                                            @error('username')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Password">
                                            
                                            @error('password')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        
                                                        <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    <div>
                                    <a href="auth/registrasi" class="btn btn-register btn-user btn-block">
                                    <i class="fas fa-sign-in-alt"></i> Registrasi
                                    </a>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
    </div>

</div>
</body>
  <script src="/frontend/js/bootstrap.bundle.min.js"></script>
  <script src="/frontend/js/tiny-slider.js"></script>
  <script src="/frontend/js/custom.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  
  @if($message = Session::get('failed'))
  <script>
      Swal.fire('{{ $message }}');
      </script>
  @endif
  
  @if($message = Session::get('success'))
  <script>
      Swal.fire('{{ $message }}');
      </script>
  @endif