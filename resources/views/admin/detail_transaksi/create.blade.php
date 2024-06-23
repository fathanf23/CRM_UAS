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

<form method="POST" action="{{url('/admin/detail_transaksi/store')}}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="text10" class="col-4 col-form-label">TAMBAH DATA DETAIL TRANSAKSI</label>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Quantity</label>
        <div class="col-8">
            <input id="text" name="qty" placeholder="Masukan Berapa Jumlah Item" type="text"
                class="form-control @error('qty') is-invalid @enderror">
            @error('qty')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="textarea" class="col-4 col-form-label">Transaksi</label>
        <div class="col-8">
            <select name="transaksi_id" class="form-control @error('transaksi_id') is-invalid @enderror">
                <option value="" readonly hidden>Pilih Id Transaksi</option>
                @foreach ($transaksi as $t)
                <option value="{{$t->id}}">{{$t->id}}</option>
                @endforeach
            </select>
            @error('transaksi_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="textarea" class="col-4 col-form-label">Produk</label>
        <div class="col-8">
            <select name="produk_id" class="form-control @error('produk_id') is-invalid @enderror">
                <option value="" readonly hidden>Pilih Produk</option>
                @foreach ($produk as $pr)
                <option value="{{$pr->id}}">{{$pr->nm_produk}}</option>
                @endforeach
            </select>
            @error('produk_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn bg-gradient-success">Submit</button>
            <a href="{{url('/admin/detail_transaksi/index')}}" class="btn bg-gradient-secondary"><i class="fas fa-long-arrow-alt-left"></i> Back to Table</a>
        </div>
    </div>
</form>
@endsection
