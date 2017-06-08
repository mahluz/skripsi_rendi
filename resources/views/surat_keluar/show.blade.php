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
                  <h3 class="box-title">Detail Surat Keluar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                        <table class="table">
                        <tr>
                          <th style="width:30%">Action</th>
                          <td>
                            {!! Form::open([
                                'method' => 'delete',
                                'route' => ['surat_keluar.destroy',$surat_keluar->id_keluar],
                                'id' => 'formdelete'.$surat_keluar->id_keluar
                            ]) !!}
                            {!!Form::close()!!}
                            <a title="Edit" class="btn btn-xs btn-default" href="{{ url('surat_keluar/'.$surat_keluar->id_keluar.'/edit') }}"><i class="fa fa-edit"></i></a>
                            <a title="Delete" class="btn btn-xs btn-default" onclick="if(confirm('Apakah anda yakin akan menghapus surat Keluar {{ $surat_keluar->surat_keluar }}?')){ $('#formdelete{{ $surat_keluar->id_keluar }}').submit(); }"><i class="fa fa-close"></i></a>
                          </td>
                        </tr>
                        <tr>

                          <th>Surat Keluar</th>
                          <td>{{ $surat_keluar->no_surat }}</td>
    
                          </tr>
                          <tr>
                          <th>Hal </th>
                          <td>{{ $surat_keluar->hal }}</td>
                          </tr>
                          <tr>
                          <th> Dari</th>
                          <td>{{ $surat_keluar->dari }}</td>
                          </tr>
                          <tr>
                          <th> Kepada</th>
                          <td>{{ $surat_keluar->kepada }}</td>
                          </tr>
                          <tr>
                          <th> Isi</th>
                          <td>{{ $surat_keluar->isi }}</td>
                          </tr>
                          <tr>
                          <th> Tembusan </th>
                          <td>{{ $surat_keluar->tembusan }}</td>
                          </tr>
                          <tr>
                          <th> Disposisi </th>
                          @if($surat_keluar->disposisi=='0')
                                <?php $warna='belum validasi'; ?>
                                @elseif($surat_keluar->disposisi=='1')
                                <?php $warna='Kaprodi'; ?>
                                @elseif($surat_keluar->disposisi=='2')
                                <?php $warna='Kajur'; ?>
                                @elseif($surat_keluar->disposisi=='3')
                                <?php $warna='Sekjur'; ?>
                                @elseif($surat_keluar->disposisi=='4')
                                <?php $warna='Kalab'; ?>
                               
                                @endif
                          <td>{{$warna}}</td>
                          </tr>


                          <tr>
                          <th> Tanggal</th>
                          <td>{{ date_format(date_create($surat_keluar->created_at),"d-m-Y") }}</td>
                          </tr>
          
                        <tr>
                          <th style="width:30%">Action</th>
                          <td>
                            {!! Form::open([
                                'method' => 'delete',
                                'route' => ['surat_keluar.destroy',$surat_keluar->id_keluar],
                                'id' => 'formdelete'.$surat_keluar->id_keluar
                            ]) !!}
                            {!!Form::close()!!}
                            <a title="Edit" class="btn btn-xs btn-default" href="{{ url('surat_keluar/'.$surat_keluar->id_keluar.'/edit') }}"><i class="fa fa-edit"></i></a>
                            <a title="Detail" class="btn btn-xs btn-default" onclick="if(confirm('Apakah anda yakin akan menghapus kategori {{ $surat_keluar->surat_keluar }}?')){ $('#formdelete{{ $surat_keluar->id_keluar }}').submit(); }"><i class="fa fa-close"></i></a>
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
