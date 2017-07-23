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
              </h1>
            </section>

<!-- Main content -->
            <section class="content">
              <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Surat Masuk</h3>
                </div><!-- /.box-header -->
                <div class="box-header with-border">
                  <div class="alert alert-danger alert-dismissable" id="gagal" style="display:none">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                    Input Surat Masuk Gagal!
                  </div>
                  <div class="alert alert-success alert-dismissable" id="berhasil" style="display:none">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Sukses!</h4>
                    Input Surat Masuk Berhasil!
                  </div>
                  <a href="{{ url('surat_masuk/create') }}" class="btn btn-default bg-green">Tambah<i class="fa fa-plus"></i></a>
                </div>
                <div class="box-body">
                  <table id="tabel_surat_masuk" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>No Surat</th>
                        <th>Hal</th>
                        <th>Dari</th>
                        <th>Kepada</th>
                        <th>isi Surat</th>
                        <th>Tembusan</th>
                        <th>Tanggal</th>
                        <th>gambar</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; ?>
                      @foreach($surat_masuk as $sm)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{$sm->no_surat}}</td>
                          <td>{{ $sm->hal }}</td>
                          <td>{{ $sm->dari }}</td>
                          <td>{{ $sm->kepada }}</td>
                          <td>{{ $sm->isi }}</td>
                          @if($sm->jabatan=='0')
                                <?php $warna='belum validasi'; ?>
                                @elseif($sm->jabatan=='1')
                                <?php $warna='kaprodi'; ?>
                                @elseif($sm->jabatan=='2')
                                <?php $warna='kajur'; ?>
                                @elseif($sm->jabatan=='3')
                                <?php $warna='Sekjur'; ?>
                                @elseif($sm->jabatan=='4')
                                <?php $warna='KaLab'; ?>
                               
                                @endif
                          <td>{{$warna}}</td>
                          <td>{{ date_format(date_create($sm->created_at),"d-m-Y") }}</td>
                          <td><a href="{{asset('upload/suratmasuk')}}/{{ $sm->image_masuk }}">{{ $sm->image_masuk }}</a></td>
                          <td>
                            {!! Form::open([
                                'method' => 'delete',
                                'route' => ['surat_masuk.destroy',$sm->id_masuk],
                                'id' => 'formdelete'.$sm->id_masuk
                            ]) !!}
                            {!!Form::close()!!}
                            <a title="Detail" class="btn btn-xs btn-default" href="{{ url('surat_masuk/'.$sm->id_masuk) }}"><i class="fa fa-search"></i></a>
                            <a title="Edit" class="btn btn-xs btn-default" href="{{ url('surat_masuk/'.$sm->id_masuk.'/edit') }}"><i class="fa fa-edit"></i></a>
                            <a title="Delete" class="btn btn-xs btn-default" onclick="if(confirm('Apakah anda yakin akan menghapus surat masuk {{ $sm->id_masuk }}?')){ $('#formdelete{{ $sm->id_masuk }}').submit(); }"><i class="fa fa-close"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>No Surat</th>
                        <th>Hal</th>
                        <th>Dari</th>
                        <th>Kepada</th>
                        <th>isi</th>
                        <th>Tembusan</th>
                        <th>Tanggal</th>
                        <th>gambar</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
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
    <script>
      $(function () {
        $("#tabel_surat_masuk").DataTable();
        @if (session('berhasil'))
          @if (session('berhasil')=="berhasil")
            $("#berhasil").fadeIn(300).delay(2000).fadeOut(300);
          @elseif(session('berhasil')=="gagal")
            $("#gagal").fadeIn(300).delay(2000).fadeOut(300);
          @endif
        @endif
      });
    </script>
@endsection
