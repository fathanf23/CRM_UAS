@extends('front.app')
@section('front')
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="/frontend/images/susumooo.png"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 card shadow p-4 bg-dark">
                    <h1 align="center" class="mb-3">Buat Akun</h1>
                    <form action="{{ url('auth/registrasi/store') }}" method="POST">
                        @csrf

                        <!-- Nama input -->
                        <label class="form-label" for="nama">Nama</label>
                        <div class="form-outline mb-4">
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label class="form-label" for="alamat">Alamat</label>
                        <div class="form-outline mb-4">
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                                name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>

                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label class="form-label" for="no_hp">Nomor HP</label>
                        <div class="form-outline mb-4">
                            <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" autofocus>

                            @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Nama input -->
                        <label class="form-label" for="username">Username</label>
                        <div class="form-outline mb-4">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <label class="form-label" for="form1Example23">Password</label>
                        <div class="form-outline mb-4">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <label class="form-label" for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <div class="form-outline mb-4">
                            <input id="password_confirmation" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="current-password_confirmation">

                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Buat Akun</button>
                        </div>
                        <div class="row text-center mt-4">
                            <span>Sudah punya akun?</span>
                            <a href="{{ route('login') }}">Masuk</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
