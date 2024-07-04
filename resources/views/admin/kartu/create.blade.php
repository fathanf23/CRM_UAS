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
<form method="POST" action="{{url('/admin/kartu/store')}}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="text10" class="col-4 col-form-label">TAMBAH DATA PRODUK</label>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Kode Kartu</label>
        <div class="col-8">
            <input id="text1" name="kode" placeholder="Masukan Kode Kartu!" type="text"
                class="form-control @error('kode') is-invalid @enderror">
            @error('kode')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Nama Kartu</label>
        <div class="col-8">
            <input id="text" name="nama" placeholder="Masukan Nama Kartu!" type="text"
                class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Diskon</label>
        <div class="col-8">
            <input id="text" name="diskon" placeholder="Masukan Harga Diskon!" type="text"
                class="form-control @error('diskon') is-invalid @enderror">
            @error('diskon')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn bg-gradient-success">Submit</button>
            <a href="{{url('/admin/produk/index')}}" class="btn bg-gradient-secondary"><i class="fas fa-long-arrow-alt-left"></i>
                Back to Table</a>
        </div>
    </div>
</form>
@endsection