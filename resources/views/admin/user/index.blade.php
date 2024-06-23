@extends('admin.layouts.app')
@section('content')
<div class="row">
    <h1>Data User</h1>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{url('admin/customers/import')}}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  {{csrf_field()}}
                  <input type="file" name="file">
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="{{url('/admin/user/create')}}" class="btn bg-gradient-warning"><i class="fas fa-plus">
            </i> Tambah Data User</a>
    </div>
    <table class="table align-items-center mb-0" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Password</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                @foreach ($user as $u)
                <td>{{$loop->iteration}}</td>
                <td>{{$u->username}}</td>
                <td>{{$u->password}}</td>
                <td>{{$u->role}}</td>
                <td>
                <a href="{{ url('admin/user/delete/' .$u->id) }}" class="btn btn-md btn-danger px-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{$u->id}}">
                                <i class="fa-solid fa-trash"> Delete</i>
                            </a>
                        
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$u->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus <strong>{{$u->username}}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="{{url('admin/user/delete/'.$u->id)}}" type="button" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('admin/user/edit/'.$u->id)}}" class="btn btn-md btn-primary"><i
                            class="fas fa-edit"> EDIT</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection