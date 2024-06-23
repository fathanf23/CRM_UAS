@extends("admin.layouts.app")
@section("content")
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@foreach($kartu as $k)
<form method="POST" action="{{url('admin/kartu/update/'.$k->id)}}" enctype="multipart/form-data"> 
    @csrf 
  <div class="form-group row">
    <label for="kode" class="col-4 col-form-label">Kode</label> 
    <div class="col-8">
      <input id="kode" name="kode" type="text" class="form-control  @error('kode')is-invalid @enderror"value="{{$k->kode}}">
      @error('kode')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>
<div class="form-group row">
    <label for="nama" class="col-4 col-form-label">nama</label> 
    <div class="col-8">
      <input id="nama" name="nama" type="text" class="form-control  @error('nama')is-invalid @enderror"value="{{$k->nama}}">
      @error('nama')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>
<div class="form-group row">
    <label for="diskon" class="col-4 col-form-label">Diskon</label> 
    <div class="col-8">
      <input id="diskon" name="diskon" type="text" class="form-control  @error('diskon')is-invalid @enderror"value="{{$k->diskon}}">
      @error('diskon')
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