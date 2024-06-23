@extends("admin.layouts.app")
@section("content")
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@foreach($pelanggan as $p)
<form method="POST" action="{{url('admin/pelanggan/update/'.$p->id)}}" enctype="multipart/form-data"> 
    @csrf 
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Pelanggan</label> 
    <div class="col-8">
      <input id="nama" name="nama" type="text" class="form-control  @error('nama')is-invalid @enderror"value="{{$p->nama}}">
      @error('nama')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>
<div class="form-group row">
    <label for="alamat" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <input id="alamat" name="alamat" type="text" class="form-control  @error('alamat')is-invalid @enderror"value="{{$p->alamat}}">
      @error('alamat')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>
<div class="form-group row">
    <label for="no_hp" class="col-4 col-form-label">No Telepon</label> 
    <div class="col-8">
      <input id="no_hp" name="no_hp" type="text" class="form-control  @error('no_hp')is-invalid @enderror"value="{{$p->no_hp}}">
      @error('no_hp')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>
<div class="form-group row">
    <label for="user_id" class="col-4 col-form-label">User</label> 
    <div class="col-8">
        <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror">
            <option value="" disabled selected>Pilih Username User</option>
            @foreach($user as $user)
                <option value="{{ $user->id }}">{{$user->username}}</option>
            @endforeach
        </select>
        @error('user_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="kartu_id" class="col-4 col-form-label">Kartu Diskon</label> 
    <div class="col-8">
        <select id="kartu_id" name="kartu_id" class="form-control @error('kartu_id') is-invalid @enderror">
            <option value="" disabled selected>Pilih Kartu Diskon</option>
            @foreach($kartu as $k)
                <option value="{{ $k->id }}">{{$k->nama}}</option>
            @endforeach
        </select>
        @error('kartu_id')
        <div class="invalid-feedback">
            {{ $message }}
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