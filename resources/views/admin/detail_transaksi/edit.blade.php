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

<form method="POST" action="{{ url('/admin/detail_transaksi/update', $detail_transaksi->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Spoofing metode PUT -->

    <div>
        <label for="text10" class="col-4 col-form-label">UBAH DATA DETAIL TRANSAKSI</label>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Quantity</label>
        <div class="col-8">
            <input id="text1" name="qty" type="text" class="form-control @error('qty') is-invalid @enderror"
                value="{{ old('qty', $detail_transaksi->qty) }}">
            @error('qty')
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
                value="{{ old('harga_total', $detail_transaksi->harga_total) }}">
            @error('harga_total')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="transaksi_id" class="col-4 col-form-label">ID Transaksi</label>
        <div class="col-8">
            <select id="transaksi_id" name="transaksi_id" class="form-control @error('transaksi_id') is-invalid @enderror">
                <option value="" disabled>Pilih Transaksi</option>
                @foreach($transaksi as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $detail_transaksi->transaksi_id ? 'selected' : '' }}>{{$p->id}}</option>
                @endforeach
            </select>
            @error('transaksi_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="produk_id" class="col-4 col-form-label">Produk</label>
        <div class="col-8">
            <select id="produk_id" name="produk_id" class="form-control @error('produk_id') is-invalid @enderror">
                <option value="" disabled>Pilih Produk</option>
                @foreach($produk as $pr)
                    <option value="{{ $pr->id }}" {{ $pr->id == $detail_transaksi->produk_id ? 'selected' : '' }}>{{$pr->nm_produk}}</option>
                @endforeach
            </select>
            @error('produk_id')
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
