@extends('admin.layouts.app')
@section('content')

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{url('/admin/pelanggan/store')}}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="text10" class="col-4 col-form-label">TAMBAH DATA PELANGGAN</label>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Nama</label>
        <div class="col-8">
            <input id="text1" name="nama" placeholder="Masukan Nama Anda" type="text"
                class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Alamat</label>
        <div class="col-8">
            <input id="text" name="alamat" placeholder="Masukan Alamat Anda" type="text"
                class="form-control @error('alamat') is-invalid @enderror">
            @error('alamat')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text2" class="col-4 col-form-label">No Telepon</label>
        <div class="col-8">
            <input id="text2" name="no_hp" placeholder="Masukan Nomor Telepom" type="text"
                class="form-control @error('no_hp') is-invalid @enderror">
            @error('no_hp')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="textarea" class="col-4 col-form-label">User</label>
        <div class="col-8">
            <select name="user_id" id="" class="form-control">
                <option value="" readonly hidden>Pilih User</option>
                @foreach ($user as $u)
                <option value="{{$u->id}}">{{$u->username}}</option>
                @endforeach
            </select>
            @error('user_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="textarea" class="col-4 col-form-label">Kartu</label>
        <div class="col-8">
            <select name="kartu_id" id="" class="form-control">
                <option value="" readonly hidden>Pilih Kartu</option>
                @foreach ($kartu as $k)
                <option value="{{$k->id}}">{{$k->nama}}</option>
                @endforeach
            </select>
            @error('kartu_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn bg-gradient-success">Submit</button>
            <a href="{{url('admin/pelanggan/index')}}" class="btn bg-gradient-secondary"><i class="fas fa-long-arrow-alt-left"></i>
                Back to Table</a>
        </div>
    </div>
</form>
@endsection