@extends('layouts.app')
@section('style')
<!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('font-awesome-4.6.1/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('ionicons-2.0.1/css/ionicons.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script type="text/javascript">
      tinymce.init({
        selector: '#isi',
        plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
      });
    </script>
@endsection

@section('name')
  {{ Auth::user()->name }}
@endsection


@section('content')
   <section class="content-header">
              <h1>
                Surat Keluar
                <small>{{ $sub_judul }}</small>
              </h1>
            </section>

<!-- Main content -->
            <section class="content">
              <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tambah</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                    <form id="form-surat_keluar" required role="form" method="post" action="{{ url('surat_keluar') }}" onsubmit="setFormSubmitting()" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="box-body">
                        <div class="form-group">
                          <label for="judul">Kategori</label>
                          <?php
                        $katma = DB::table('kategori')->get();
                        ?>
                          <select name="" id="" class="form-radio select2"  style="width: 100%;" disabled>
                          <option value="1" selected>Surat Penelitian</option>
                          </select>
                           <input type="hidden" required name="id_kategori" class="form-control" id="kategori" value="1">
                           <input type="hidden" required name="disposisi" class="form-control" id="disposisi" value="0">
                        </div>                        
                        
                        
                        <div class="form-group {{ $errors->has('kepada') ? ' has-error' : '' }}">
                          <label for="kepada">Kepada</label>
                          @if ($errors->has('kepada'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('kepada') }}</strong>
                              </span>
                          @endif
                          <input type="text" required name="kepada" class="form-control" id="kepada" placeholder="kepada" value="{{ old('kepada') }}">
                        </div>
                        <div class="form-group {{ $errors->has('dari') ? ' has-error' : '' }}">
                          <label for="dari">Alamat</label>
                          @if ($errors->has('dari'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('dari') }}</strong>
                              </span>
                          @endif
                          <input type="text" name="dari" class="form-control" id="dari" placeholder="Alamat instansi" value="{{ old('dari') }}">
                        </div>
                        <div class="form-group {{ $errors->has('isi') ? ' has-error' : '' }}">
                          <label for="isi">Isi surat</label>
                          @if ($errors->has('isi'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('isi') }}</strong>
                              </span>
                          @endif
                         <textarea id="isi" name="isi" required class="form-control" rows="5" placeholder="Isi surat... "> <p>Dengan hormat,</p>
<p>Bersama ini, kami mohon ijin pelaksanaan Penelitian untuk penyusunan Skripsi / Tugas Akhir oleh mahasiswa sebagai berikut :</p>
<br>
<p>Nama &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{$data->name}} </p>
<p>Nim &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{$data->no_id}} </p>
<p>Program Studi &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{$data->jenis_prodi}}  </p>
<p>Topik &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;</p>
<p>Waktu &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp;</p>
<p>Atas perhatian dan kerjasamanya di ucapkan terima kasih.</p> </textarea>
                        </div>
                        
                      </div><!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button>
                      </div>
                    </form>
                  </div><!-- /.box -->
                </div><!-- /.col -->
              </div><!-- /.row -->
            </section><!-- /.content -->
@endsection
                
@section('script')
<!-- jQuery 2.1.4 -->
    <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- page script -->
    <script type="text/javascript">
    var formSubmitting = false;
      var setFormSubmitting = function() { formSubmitting = true; };
      var serialize = $('#form-surat_keluar').serialize();

      window.onload = function() {
          window.addEventListener("beforeunload", function (e) {
              if (formSubmitting) {
                  return undefined;
              }

              if (serialize==$('#form-surat_keluar').serialize()) {
                  return undefined;
              }

              var confirmationMessage = 'Sepertinya anda telah mengubah sesuatu pada halaman ini. '
                                      + 'Jika anda pindah halaman sebelum perubahan ini disimpan, maka perubahan ini akan hilang.';

              (e || window.event).returnValue = confirmationMessage; //Gecko + IE
              return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
          });
      };
      $(function () {
        $(".select2").select2();
      })
    </script>
@endsection





















