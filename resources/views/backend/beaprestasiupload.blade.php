@extends('layouts.backend.mainlayout')
@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Upload Berkas Persyaratan</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <form method="POST" action="/prestasi/simpan" data-toggle="validator" enctype="multipart/form-data" role="form">
    @csrf

    <div class="card-body">
        <div class="row">

            <div class="table-responsive">
              <table class="table">
                <input type="hidden" value="0" name="status">
                <input type="hidden" value="1" name="tipe">
                <input type="hidden" value="0" name="status">
                <input type="hidden" value="1" name="tipe">
                <tr>
                    <th style="width:50%">NIM</th>
                    <td>:</td>
                    <td><input type="text" name="foto" id="foto"></td>
                </tr>
                <tr>
                    <th style="width:50%">Nama</th>
                    <td>:</td>
                    <td><input type="text" name="foto" id="foto"> </td>
                </tr>
                <tr>
                  <th style="width:50%">Pas Foto</th>
                  <td>:</td>
                  <td><input type="file" name="foto" id="foto"> <small id="fileHelp" class="form-text text-muted">ukuran foto maksimal 200 Kb, latar belakang merah, posisi tegak dengan format png, jpg, atau jpeg.</small> </td>
                  
                </tr>
                {{-- <tr>
                    <th>KTP</th>
                    <td>:</td>
                    <td><input type="file" name="file1" value=""> <small id="fileHelp" class="form-text text-muted">ukuran file maksimal 1 Mb, dengan format png, jpg, atau jpeg.</small></td>
                </tr>
                <tr>
                    <th>KK</th>
                    <td>:</td>
                    <td><input type="file" name="file2" value=""> <small id="fileHelp" class="form-text text-muted">ukuran file maksimal 1 Mb, dengan format png, jpg, atau jpeg.</small></td>
                </tr>
                <tr>
                    <th>Transkrip Nilai</th>
                    <td>:</td>
                    <td><input type="file" name="file3" value=""> <small id="fileHelp" class="form-text text-muted">ukuran file maksimal 1 Mb, dengan format png, jpg, atau jpeg</small></td>
                </tr>
                <tr>
                    <th>KTM</th>
                    <td>:</td>
                    <td><input type="file" name="file4" value=""> <small id="fileHelp" class="form-text text-muted">ukuran file maksimal 1 Mb, dengan format png, jpg, atau jpeg.</small> <div></div> </td>
                </tr>
                <tr>
                    <th>Rekening Bank</th>
                    <td>:</td>
                    <td><input type="file" name="file5" value=""> <small id="fileHelp" class="form-text text-muted">ukuran file maksimal 1 Mb, dengan format png, jpg, atau jpeg</small> </td>
                </tr>
                <tr>
                    <th>Surat Pernyataan Tidak Menerima Beasiswa dari Pihak Lain</th>
                    <td>:</td>
                    <td><input type="file" name="file6" value=""> <small id="fileHelp" class="form-text text-muted">ukuran file maksimal 1 Mb, dengan format png, jpg, atau jpeg</small> </td>
                </tr> --}}
              </table>
            </div>
          </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <input type="submit" value="Upload" class="btn btn-success float-right">
        </div>
    </div>
</form>
<!-- /.card-body -->
</div>
    
    

@endsection

