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

<form method="POST" action="{{ url('/admin/transaksi/update', $transaksi->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- atau 'PATCH' sesuai rute yang digunakan -->

    <div>
        <label for="text10" class="col-4 col-form-label">UBAH DATA TRANSAKSI</label>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Tanggal Transaksi</label>
        <div class="col-8">
            <input id="text1" name="tgl_transaksi" type="date" class="form-control @error('tgl_transaksi') is-invalid @enderror"
                value="{{ old('tgl_transaksi', $transaksi->tgl_transaksi) }}">
            @error('tgl_transaksi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Harga</label>
        <div class="col-8">
            <input id="text" name="harga" type="text" class="form-control @error('harga') is-invalid @enderror"
                value="{{ old('harga', $transaksi->harga) }}">
            @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Harga Total</label>
        <div class="col-8">
            <input id="text" name="harga_total" type="text" class="form-control @error('harga_total') is-invalid @enderror"
                value="{{ old('harga_total', $transaksi->harga_total) }}" readonly>
            @error('harga_total')
            <div class="invalid-feedback">
                {{ $message }}
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
                <option value="{{ $p->id }}" {{ $transaksi->pelanggan_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                @endforeach
            </select>
            @error('pelanggan_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn bg-gradient-success">Update</button>
            <a href="{{ url('/admin/transaksi/index') }}" class="btn bg-gradient-secondary"><i class="fas fa-long-arrow-alt-left"></i> Back to Table</a>
        </div>
    </div>
</form>
@endsection
