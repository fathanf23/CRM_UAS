@extends("admin.layouts.app")
@section("content")
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@foreach($produk as $k)
<form method="POST" action="{{url('admin/produk/update/'.$k->id)}}" enctype="multipart/form-data"> 
    @csrf 
  <div class="form-group row">
    <label for="kd_produk" class="col-4 col-form-label">Kode Produk</label> 
    <div class="col-8">
      <input id="kd_produk" name="kd_produk" type="text" class="form-control  @error('kd_produk')is-invalid @enderror"value="{{$k->kd_produk}}">
      @error('kd_produk')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>
<div class="form-group row">
    <label for="nm_produk" class="col-4 col-form-label">nm_produk</label> 
    <div class="col-8">
      <input id="nm_produk" name="nm_produk" type="text" class="form-control  @error('nm_produk')is-invalid @enderror"value="{{$k->nm_produk}}">
      @error('nm_produk')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>
<div class="form-group row">
    <label for="harga_produk" class="col-4 col-form-label">harga_produk</label> 
    <div class="col-8">
      <input id="harga_produk" name="harga_produk" type="text" class="form-control  @error('harga_produk')is-invalid @enderror"value="{{$k->harga_produk}}">
      @error('harga_produk')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>
<div class="form-group row">
    <label for="foto" class="col-4 col-form-label">foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" type="text" class="form-control  @error('foto')is-invalid @enderror"value="{{$k->foto}}">
      @error('foto')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-success">Ubah</button>
    </div>
  </div>
</form>
@endforeach
@endsection 