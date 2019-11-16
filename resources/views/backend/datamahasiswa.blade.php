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
      @if ($countuserid == 0 || auth::user()->role_id == 1)
      <a type="button" class="float-right btn btn-success btn-sm" data-toggle="modal" data-target="#modal_form"><i class="fas fa-plus"></i>Tambah Data</a>
      @endif
      
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>status</th>
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
              <td>{{$data->alamat}}</td>
              <td>{{$data->user->email}}</td>
              {{-- <td>{{$data->university->nama_universitas}}</td>
              <td>{{$data->j_study}}</td> --}}

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
  <div class="modal fade" id="modal_form" tab-index="-1" role="dialog" aria-hidden="true" data-bcakdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-secondary" >
      <form method="POST" action="{{ url('mahasiswa/simpan') }}" data-toggle="validator" enctype="multipart/form-data" role="form">
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
                <label for="exampleInputEmail1">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" placeholder="Nomor Induk Mahasiswa" autofocus required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa" autofocus required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" autofocus required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Tempat Lahir</label>
                <input type="text" class="form-control" id="tpt_lahir" name="tpt_lahir" placeholder="Tempat Lahir" autofocus required>
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" autofocus required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select class="form-control" name="jkel" id="jkel">
                  <option selected value="">Pilih Jenis Kelamin</option>
                  <option value="L">Laki - Laki</option>
                  <option value="P">Perempuan</option>
                </select>
                {{-- <input type="text" class="form-control" id="jkel" name="jkel" placeholder="Jenis Kelalmin" autofocus required> --}}
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Tahun Masuk</label>
                <input type="text" class="form-control" id="th_masuk" name="th_masuk" placeholder="Tahun Masuk" autofocus required>
            </div>

            <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" class="form-control" id="status" name="status" value="0">
            <input type="hidden" class="form-control" id="role_id" name="role_id" value="{{Auth::user()->role_id}}">
            
            <div class="form-group">
                <label for="exampleInputEmail1">Universitas</label>
                <select name="university_id" class="form-control select2" data-placeholder="Choose">
                  <option value=""> Pilih Universitas </option>
                  @foreach ($universitas as $data)
                      <option value="{{ $data->id }}">{{ $data->nama_universitas}}</option>
                  @endforeach
              </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Jurusan</label>
                <input type="text" class="form-control" id="j_study" name="j_study" placeholder="Jurusan" autofocus required>
            </div>
            {{-- <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <input type="hidden" value="pending" class="form-control" id="status" name="status" placeholder="Status">
            </div> --}}
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
