@extends('front.apps')
@section('fronts')
<br>
<br>
<br>
<br>
<br>
<body>
<div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main class="registrasi">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header bg-primary"><h3 class="text-center text-white font-weight-light my-3 display-6">Buat Akun</h3></div>
                                    <div class="card-body">
                                    <form action="{{ url('auth/registrasi/store') }}" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama Anda" />
                                                        <label for="nama">Nama</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Alamat Anda" />
                                                        <label for="alamat">Alamat</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="no_hp" name="no_hp" type="text" placeholder="Nomor Hp Anda" />
                                                <label for="no_hp">No Telepon</label>
                                            </div>
                                            <hr>
                                            <p>*Username & Password akan digunakan untuk Login</p>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="username" name="username" type="text" placeholder="Buat Username Anda" />
                                                        <label for="username">Username</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary btn-lg text-white">Buat Akun</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">Anda Punya Akun? <a href="{{url('login')}}"> Ayo Login!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        </body>
@endsection