@extends('layouts.backend.mainlayout')
@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Verifikasi Status Mahasiswa</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">NIM</th>
                  <td>:</td>
                  <td>{{$mahasiswa->nim}}</td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>:</td>
                    <td>{{$mahasiswa->nama}}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td>{{$mahasiswa->alamat}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>:</td>
                    <td>{{$mahasiswa->user->email}}</td>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <td>:</td>
                    <td>{{$mahasiswa->j_study}}</td>
                </tr>
                <tr>
                    <th>Universitas</th>
                    <td>:</td>
                    <td>{{$mahasiswa->university->nama_universitas}}</td>
                </tr>
              </table>
            </div>
          </div>
    </div>
<!-- /.card-body -->
</div>
<form method="POST" action="/mahasiswa/verifikasi/{{$mahasiswa->id}}" data-toggle="validator" enctype="multipart/form-data" role="form">
    @csrf
    @method('PUT')
        
    <input type="hidden" id="status" name="status" value="1">
    
    <div class="card-body">
        <div class="form-group">
            <input type="submit" value="Verifikasi" class="btn btn-success float-right">
        </div>
    </div>
</form>

@endsection

