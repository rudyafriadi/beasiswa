@extends('layouts.backend.mainlayout')
@section('content')
<div class="card card-secondary">
<div class="card-header">
    <h3 class="card-title">Daftar Mahasiswa</h3> 
    {{-- @if ($countuserid == 0 || auth::user()->role_id == 1)
    <a type="button" class="float-right btn btn-success btn-sm" data-toggle="modal" data-target="#modal_form"><i class="fas fa-plus"></i>Tambah Data</a>
    @endif --}}

    <a href="/prestasi/upload" type="button" class="float-right btn btn-success btn-sm"><i class="fas fa-plus"></i>Daftar Beasiswa</a>
    
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jenis Beasiswa</th>
        <th>Status Upload</th>
        {{-- <th>status Verifikasi</th> --}}
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
      <?php $no=1; ?>
      @foreach ($mahasiswa as $data)
          <tr>
            <td>{{$no}}</td>
            <td>{{$data->nim}}</td>
            <td>{{$data->nama}}</td>
            {{-- <td>{{$data->tipefile}}</td> --}}
            {{-- <td>{{$data->statusfile}}</td> --}}

            @if ($data->status == 0)
              <td>
                <span class="badge bg-danger">User Belum Terdaftar</span>
                <p>Masih dalam tahap verifikasi oleh Dinas Terkait</p>
              </td>
            @else
              <td>
                <span class="badge bg-success">Terdaftar</span>
              </td>
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

              @if (auth::user()->role_id == 1 && $data->status == 0 || auth::user()->role_id == 2 && $data->status == 0)
              <a href="/mahasiswa/cek/{{$data->id}}" class="btn btn-success btn-xs">Cek</a>
              @endif
              
            </td>
          </tr>
      
      <?php $no++; ?>
      @endforeach
      
    </table>
  </div>
  <!-- /.card-body -->
</div>
</div>
    

@endsection

