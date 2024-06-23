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
<form method="POST" action="{{url('/admin/produk/store')}}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="text10" class="col-4 col-form-label">TAMBAH DATA PRODUK</label>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Kode Produk</label>
        <div class="col-8">
            <input id="text1" name="kd_produk" placeholder="Masukan Kode Produk!" type="text"
                class="form-control @error('kd_produk') is-invalid @enderror">
            @error('kd_produk')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Nama Produk</label>
        <div class="col-8">
            <input id="text" name="nm_produk" placeholder="Masukan Nama Produk!" type="text"
                class="form-control @error('nm_produk') is-invalid @enderror">
            @error('nm_produk')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Harga Produk</label>
        <div class="col-8">
            <input id="text" name="harga_produk" placeholder="Masukan Harga ProduK!" type="text"
                class="form-control @error('harga_produk') is-invalid @enderror">
            @error('harga_produk')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Foto Produk</label>
        <div class="col-8">
            <input id="text" name="foto" placeholder="Masukan Harga ProduK!" type="text"
                class="form-control @error('foto') is-invalid @enderror">
            @error('foto')
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