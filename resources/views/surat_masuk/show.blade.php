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
                  <h3 class="box-title">Detail Surat Masuk</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                        <table class="table">
                        <tr>
                          <th style="width:30%">Action</th>
                          <td>
                            {!! Form::open([
                                'method' => 'delete',
                                'route' => ['surat_masuk.destroy',$surat_masuk->id_masuk],
                                'id' => 'formdelete'.$surat_masuk->id_masuk
                            ]) !!}
                            {!!Form::close()!!}
                            <a title="Edit" class="btn btn-xs btn-default" href="{{ url('surat_masuk/'.$surat_masuk->id_masuk.'/edit') }}"><i class="fa fa-edit"></i></a>
                            <a title="Delete" class="btn btn-xs btn-default" onclick="if(confirm('Apakah anda yakin akan menghapus surat masuk {{ $surat_masuk->surat_masuk }}?')){ $('#formdelete{{ $surat_masuk->id_masuk }}').submit(); }"><i class="fa fa-close"></i></a>
                          </td>
                        </tr>
                        <tr>

                          <th>Surat Masuk</th>
                          <td>{{ $surat_masuk->no_surat }}</td>

                          <td rowspan="8"> <img style="width: 300px; height: auto;" src="{{url('upload/suratmasuk/'.$surat_masuk->image_masuk)}}" /></td>

                          </tr>
                          <tr>
                          <th>Hal </th>
                          <td>{{ $surat_masuk->hal }}</td>
                          </tr>
                          <tr>
                          <th> Dari</th>
                          <td>{{ $surat_masuk->dari }}</td>
                          </tr>
                          <tr>
                          <th> Kepada</th>
                          <td>{{ $surat_masuk->kepada }}</td>
                          </tr>
                          <tr>
                          <th> Isi</th>
                          <td>{{ $surat_masuk->isi }}</td>
                          </tr>
                          <tr>
                          <th> Tembusan </th>
                          <td>{{ $surat_masuk->tembusan }}</td>
                          </tr>
                          <tr>
                          <th> Tanggal</th>
                          <td>{{ date_format(date_create($surat_masuk->created_at),"d-m-Y") }}</td>
                          </tr>

                        <tr>
                          <th style="width:30%">Action</th>
                          <td>
                            {!! Form::open([
                                'method' => 'delete',
                                'route' => ['surat_masuk.destroy',$surat_masuk->id_masuk],
                                'id' => 'formdelete'.$surat_masuk->id_masuk
                            ]) !!}
                            {!!Form::close()!!}
                            <a title="Edit" class="btn btn-xs btn-default" href="{{ url('surat_masuk/'.$surat_masuk->id_masuk.'/edit') }}"><i class="fa fa-edit"></i></a>
                            <a title="Detail" class="btn btn-xs btn-default" onclick="if(confirm('Apakah anda yakin akan menghapus kategori {{ $surat_masuk->surat_masuk }}?')){ $('#formdelete{{ $surat_masuk->id_masuk }}').submit(); }"><i class="fa fa-close"></i></a>
                          </td>
                        </tr>
                      </table>
                      </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div><!-- /.col -->
              </div><!-- /.row -->
            </section><!-- /.content -->
@endsection

@section('script')
@section('script')
<!-- jQuery 2.1.4 -->
    <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script type="text/javascript">
      $(function () {
        $(".select2").select2();
      })
    </script>
@endsection
