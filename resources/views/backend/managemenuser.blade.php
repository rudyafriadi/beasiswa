@extends('layouts.backend.mainlayout')
@section('content')
<div class="card card-secondary">
  @if(session('sukses'))  
  <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        Data berhasil di input
      </div>
      @endif
    <div class="card-header">
      <h3 class="card-title">Daftar Mahasiswa</h3> 
      <a type="button" class="float-right btn btn-success btn-sm" data-toggle="modal" data-target="#modal_form"><i class="fas fa-plus"></i>Tambah Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        @foreach ($user as $data)
            <tr>
              <td>{{$no}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->email}}</td>
              
              @if ($data->role_id == 1)
                <td>Super Admin</td>
              @elseif ($data->role_id == 2)
                <td>Admin</td>
              @else
                <td>User</td>
              @endif

              <td>
                
                @if (auth::user()->role_id == 3 && $data->user_id == $idmahasiswa || auth::user()->role_id == 1)
                <a href="/datahasilnotulen/show/{{$data->id}}" class="btn btn-primary btn-xs"><i class="fas fa-eye"></i></a>
                @else
                <a href="/datahasilnotulen/show/{{$data->id}}" class="btn btn-primary btn-xs disabled"><i class="fas fa-eye"></i></a>
                @endif
                

                @if (auth::user()->role_id == 3 && $data->user_id == $idmahasiswa || auth::user()->role_id == 1)
                <a href="/datahasilnotulen/edit/{{$data->id}}" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                @else
                <a href="/datahasilnotulen/edit/{{$data->id}}" class="btn btn-warning btn-xs disabled"><i class="fas fa-edit"></i></a>
                @endif

                @if (auth::user()->role_id == 1 || auth::user()->role_id == 2)
                <a href="/datahasilnotulen/delete/{{$data->id}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                @endif
                
              </td>
            </tr>
        
        <?php $no++; ?>
        @endforeach
        
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <div class="modal fade" id="modal_form" tab-index="-1" role="dialog" aria-hidden="true" data-bcakdrop="static">
    <div class="modal-dialog">
      <div class="modal-content bg-secondary" >
      <form method="POST" action="{{ url('user/simpan') }}" data-toggle="validator" enctype="multipart/form-data" role="form">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Input Data Mahasiswa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
        <div class="card-body">
            <input type="hidden" id="id" name="id">
            
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input id="name" type="text" placeholder="Nama" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Role</label>
                <select class="form-control" name="role_id" id="role_id">
                    <option value="">Pilih Hak Akses</option>
                    @foreach ($role as $data)
                        <option value="{{$data->id}}">{{$data->nama_role}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-light">Simpan</button>
        </div> 
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection
