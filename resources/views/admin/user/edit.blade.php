@extends("admin.layouts.app")
@section("content")
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@foreach($user as $p)
<form method="POST" action="{{url('admin/user/update/'.$p->id)}}" enctype="multipart/form-data"> 
    @csrf 
  <div class="form-group row">
    <label for="username" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <input id="username" name="username" type="text" class="form-control  @error('username')is-invalid @enderror"value="{{$p->username}}">
      @error('username')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="password" name="password" type="password" class="form-control  @error('password')is-invalid @enderror"value="{{$p->password}}">
      @error('password')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>
<div class="form-group row">
    <label for="role" class="col-4 col-form-label">Role</label> 
    <div class="col-8">
      <input id="role" name="role" type="text" class="form-control  @error('role')is-invalid @enderror"value="{{$p->role}}">
      @error('role')
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