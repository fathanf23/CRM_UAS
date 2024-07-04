@extends('front.apps')
@section('fronts')
<br>
<br>
<br>
<br>
<br>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content login-layout">
                <main class="login">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header bg-primary"><h3 class="text-center text-white my-4 display-6">Login</h3></div>
                                    <div class="card-body">
                                    <form class="login-form" method="POST" action="{{route('login-proses')}}">
                                    @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="username" type="text" placeholder="Username" />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center mt-2 mb-0">
                                                <button type="submit" class="btn btn-primary text-white">
                                            Login
                                        </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"> Belum punya akun? <i class="fas fa-sign-in-alt text-primary"></i><a href="{{ route('registrasi') }}"> Registrasi disini!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  
  @if($message = Session::get('failed'))
  <script>
      Swal.fire({
  icon: "error",
  title: "Username atau Password Salah!",
  text: "Silahkan coba lagi!",
});
      </script>

  @endif
        </body>
@endsection