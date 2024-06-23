@extends('admin.layouts.app')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{url('/admin/transaksi/store')}}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="text10" class="col-4 col-form-label">TAMBAH DATA TRANSAKSI</label>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Tanggal Transaksi</label>
        <div class="col-8">
            <input id="text1" name="tgl_transaksi" type="date"
                class="form-control @error('tgl_transaksi') is-invalid @enderror">
            @error('tgl_transaksi')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
<div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Harga</label>
        <div class="col-8">
            <input id="text1" name="harga" type="text"
                class="form-control @error('harga') is-invalid @enderror">
            @error('harga')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="textarea" class="col-4 col-form-label">Nama Pelanggan</label>
        <div class="col-8">
            <select name="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror">
                <option value="" readonly hidden>Pilih Pelanggan</option>
                @foreach ($pelanggan as $p)
                <option value="{{$p->id}}">{{$p->nama}}</option>
                @endforeach
            </select>
            @error('pelanggan_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn bg-gradient-success">Submit</button>
            <a href="{{url('/admin/transaksi/index')}}" class="btn bg-gradient-secondary"><i class="fas fa-long-arrow-alt-left"></i> Back to Table</a>
        </div>
    </div>
</form>
@endsection
