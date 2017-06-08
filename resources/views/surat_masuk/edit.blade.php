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
@endsection

@section('name')
  {{ Auth::user()->name }}
@endsection


@section('content')
   <section class="content-header">
              <h1>
                Surat Masuk
                <small>{{ $sub_judul }}</small>
              </h1>
            </section>

<!-- Main content -->
            <section class="content">
              <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Edit Surat Masuk</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                    <!-- form start -->
                    {!!Form::model($surat_masuk,[
                      'method'  => 'patch',
                      'route'   => ['surat_masuk.update',$surat_masuk->id_masuk],
                      'id'      => 'form-editsurat_masuk',
                      'onsubmit'=>  'setFormSubmitting()',
                    ])!!}
                      <div class="box-body">
                        <div class="form-group {{ $errors->has('no_surat') ? ' has-error' : '' }}">
                          <label for="name">No Surat</label>
                          @if ($errors->has('no_surat'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('no_surat') }}</strong>
                              </span>
                          @endif
                          <input type="text" required name="no_surat" class="form-control" id="no_surat" placeholder="no surat" value="{{ $surat_masuk-> no_surat }}">
                      
                        <div class="form-group {{ $errors->has('hal') ? ' has-error' : '' }}">
                          <label for="name">Hal</label>
                          @if ($errors->has('hal'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('hal') }}</strong>
                              </span>
                          @endif
                          <input type="text" required name="hal" class="form-control" id="hal" placeholder="hal" value="{{ $surat_masuk->hal }}">
                        </div>
                        <div class="form-group {{ $errors->has('kepada') ? ' has-error' : '' }}">
                          <label for="judul">Dari</label>
                          @if ($errors->has('dari'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('dari') }}</strong>
                              </span>
                          @endif
                          <input type="text" required name="dari" class="form-control" id="dari" placeholder="dari instansi" value="{{ $surat_masuk->dari }}">
                        </div>
                        <div class="form-group {{ $errors->has('kepada') ? ' has-error' : '' }}">
                          <label for="judul">Kepada</label>
                          @if ($errors->has('kepada'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('kepada') }}</strong>
                              </span>
                          @endif
                          <input type="text" required name="kepada" class="form-control" id="kepada" placeholder="kepada" value="{{ $surat_masuk-> kepada }}">
                        </div>
                        <div class="form-group {{ $errors->has('isi') ? ' has-error' : '' }}">
                          <label for="judul">Isi surat</label>
                          @if ($errors->has('isi'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('isi') }}</strong>
                              </span>
                          @endif
                         <textarea name="isi" required class="form-control" rows="5" placeholder="Isi surat... " value="{{$surat_masuk->isi}}"> </textarea>
                        </div>
                        <div class="form-group {{ $errors->has('tembusan') ? ' has-error' : '' }}">
                          <label for="judul">Tembusan</label>
                          @if ($errors->has('tembusan'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('tembusan') }}</strong>
                              </span>
                          @endif
                          <input type="text" required name="tembusan" class="form-control" id="tembusan" placeholder="tembusan" value="{{$surat_masuk->tembusan}}">
                        </div>
                        <div class="form-group {{ $errors->has('tembusan') ? ' has-error' : '' }}">
                          <label for="judul">Gambar</label>
                          @if ($errors->has('image_masuk'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('image_masuk') }}</strong>
                              </span>
                          @endif
                          <input type="file"  name="image_masuk" class="form-control" id="image_masuk" placeholder="image_masuk" value="{{ $surat_masuk->image_masuk }}">

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
      var serialize = $('#form-editsurat_masuk').serialize();

      window.onload = function() {
          window.addEventListener("beforeunload", function (e) {
              if (formSubmitting) {
                  return undefined;
              }

              if (serialize==$('#form-editsurat_masuk').serialize()) {
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
