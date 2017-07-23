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
    {{-- <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
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
    </script> --}}
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
            <div class="col-xs-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tambah</h3>
                </div><!-- /.box-header -->
                @if($kategori_surat->id_kategori==1)


                @endif

                <!-- form start -->
                    <form id="form-surat_keluar" required role="form" method="post" action="{{ url('update/'.$surat_keluar[0]->id_keluar) }}" onsubmit="setFormSubmitting()" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      <div class="box-body">
                        <div class="form-group">
                          <label for="judul">Kategori</label>
                          <?php
                        $katma = DB::table('kategori')->get();
                        ?>
                          <select name="" id="" class="form-radio select2"  style="width: 100%;" disabled>
                          <option value="1" selected>Surat Observasi</option>
                          </select>
                           <input type="hidden" required name="id_kategori" class="form-control" id="kategori" value="2">
                           <input type="hidden" required name="disposisi" class="form-control" id="disposisi" value="0">
                        </div>


                        <div class="form-group {{ $errors->has('kepada') ? ' has-error' : '' }}">
                          <label for="kepada">Kepada</label>
                          @if ($errors->has('kepada'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('kepada') }}</strong>
                              </span>
                          @endif
                          <input type="text" required name="kepada" class="form-control" id="kepada" placeholder="kepada" value="{{$surat_keluar[0]->kepada}}">
                        </div>
                        <div class="form-group {{ $errors->has('dari') ? ' has-error' : '' }}">
                          <label for="dari">Alamat</label>
                          @if ($errors->has('dari'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('dari') }}</strong>
                              </span>
                          @endif
                          <input type="text" name="dari" class="form-control" id="dari" placeholder="Alamat instansi" value="{{$surat_keluar[0]->dari}}">
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                          <label for="dari">Nama</label>
                          @if ($errors->has('nama'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nama') }}</strong>
                              </span>
                          @endif
                          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Mahasiswa" value="{{ $surat_keluar[0]->name }}  ">
                        </div>
                        <div class="form-group {{ $errors->has('no_id') ? ' has-error' : '' }}">
                          <label for="dari">NIM</label>
                          @if ($errors->has('no_id'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('') }}</strong>
                              </span>
                          @endif
                          <input type="text" name="no_id" class="form-control" id="no_id" placeholder="NIM" value="{{ $surat_keluar[0]->no_id}}">
                        </div>
                        <div class="form-group {{ $errors->has('prodi') ? ' has-error' : '' }}">
                          <label for="dari">Program Studi</label>
                          @if ($errors->has('prodi'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('prodi') }}</strong>
                              </span>
                          @endif
                          <input type="text" name="prodi" class="form-control" id="prodi" placeholder="Nama Prodi" value="S1 {{$surat_keluar[0]->jenis_prodi}}">
                        </div>
                        <div class="form-group {{ $errors->has('prodi') ? ' has-error' : '' }}">
                          <label for="dari">Topik</label>
                          @if ($errors->has('isi'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('isi') }}</strong>
                              </span>
                          @endif
                          <input type="text" name="isi" class="form-control" id="prodi" placeholder="Topik Oservasi" value="{{$surat_keluar[0]->isi}}">
                        </div>
                         <div class="form-group">
                          <label for="judul">Validasi</label>

                          <select required name="disposisi" class="form-control select2" data-placeholder="Pilih Disposisi" style="width: 100%;">

                              <option value="1"> Ketua Prodi</option>
                               <option value="2"> Ketua Jurusan</option>
                                <option value="3"> Pembantu Dekan 1</option>
                                 <option value="4"> Dekan </option>


                          </select>
                        </div>

                      </div><!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button>
                      </div>
                    </form>
                  </div><!-- /.box -->
                </div><!-- /.col -->
                <div class="col-xs-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Contoh Surat</h3>


                </div><!-- /.box-header -->
                <img style="width: 600px; height: auto;" src="{{url('gambar/surat_observasi.PNG')}}"
                </div>
                </div>

              </div> <!-- /.row -->
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
