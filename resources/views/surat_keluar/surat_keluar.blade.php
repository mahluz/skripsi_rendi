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
              </h1>
            </section>

<!-- Main content -->
            <section class="content">
              <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Surat Keluar</h3>
                </div><!-- /.box-header -->
                <div class="box-header with-border">
                  <div class="alert alert-danger alert-dismissable" id="gagal" style="display:none">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                    Input Surat Keluar Gagal!
                  </div>
                  <div class="alert alert-success alert-dismissable" id="berhasil" style="display:none">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Sukses!</h4>
                    Input Surat Keluar Berhasil!
                  </div>


                </div>

                @if (!isset($id))
                  <div class="box-body">
                    <table id="tabel_surat_keluar" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>No Surat</th>
                          <th>Mahasiswa</th>
                          <th>Kategori</th>
                          <th>Isi </th>
                          <th>waktu</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; ?>
                        @foreach($surat_keluar as $sk)
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$sk->no_surat}}</td>
                            <td><a href="{{ url('profileuser/'.$sk->id_user) }}">{{ $sk->name }}</a></td>
                            <td>{{$sk->kategori}} </td>
                            <td>{{$sk->hal}}</td>
                            <td>{{ date_format(date_create($sk->created_at),"d-m-Y") }}</td>
                             @if($sk->disposisi=='0')
                                  <?php $warna='belum validasi'; ?>
                                  @elseif($sk->disposisi=='1')
                                  <?php $warna='kaprodi'; ?>
                                  @elseif($sk->disposisi=='2')
                                  <?php $warna='kajur'; ?>
                                  @elseif($sk->disposisi=='3')
                                  <?php $warna='Sekjur'; ?>
                                  @elseif($sk->disposisi=='4')
                                  <?php $warna='KaLab'; ?>
                                  @elseif($sk->disposisi=='5')
                                  <?php $warna='Cetak'; ?>
                                  @elseif($sk->disposisi==NULL)
                                  <?php $warna='Masih kosong'; ?>
                                  @endif
                            <td>{{$warna}}</td>
                            <td>
                              {!! Form::open([
                                  'method' => 'delete',
                                  'route' => ['surat_keluar.destroy',$sk->id_keluar],
                                  'id' => 'formdelete'.$sk->id_keluar
                              ]) !!}
                              {!!Form::close()!!}
                              @if(Auth::user()->id_role == 2)
                              <a title="Verivikasi" class="btn btn-xs btn-success" href="{{ url('verifykajur/'.$sk->id_keluar) }}" id="btnverify"><i class="fa fa-check-square"></i></a>
                              @endif
                              @if ($sk->disposisi=='5')
                              <a title="Print" class="btn btn-xs btn-default" href="{{ url('cetak/'.$sk->id_keluar) }}"><i class="fa fa-print"></i></a>
                              @endif
                             
                               <a title="Detail" class="btn btn-xs btn-default" href="{{ url('surat_keluar/'.$sk->id_keluar) }}"><i class="fa fa-search"></i></a>
                                @if((Auth::user()->id_role == 1)||(Auth::user()->id_role == 3))

                                @if ($sk->kategori == 'Surat Penelitian' )
                                <?php $jenis_surat = "editpenelitian/".$sk->id_keluar."/".$sk->id_user; ?>
                                @else($sk->kategori == 'Surat Observasi' )
                                <?php $jenis_surat = "editobservasi/".$sk->id_keluar."/edit"; ?>
                                @endif


                              <a title="Edit" class="btn btn-xs btn-default" href=" <?php echo $jenis_surat; ?>"><i class="fa fa-edit"></i></a>
                              @endif
                              @if(Auth::user()->id_role == 1)
                              <a title="Delete" class="btn btn-xs btn-default" onclick="if(confirm('Apakah anda yakin akan menghapus surat keluar {{ $sk->no_surat }}')){ $('#formdelete{{ $sk->id_keluar }}').submit(); }"><i class="fa fa-close"></i></a>
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <tr>
                          <th>Id</th>
                          <th>No Surat</th>
                          <th>Mahasiswa</th>
                          <th>Kategori</th>
                          <th>Isi </th>
                          <th>waktu</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </tr>
                      </tfoot>
                    </table>
                  </div><!-- /.box-body -->
                @else
                  <div class="box-body">
                    <table id="tabel_surat_keluar" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>No Surat</th>
                          <th>Mahasiswa</th>
                          <th>Kategori</th>
                          <th>Isi </th>
                          <th>waktu</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; ?>
                        @foreach($surat_keluar as $sk)
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$sk->no_surat}}</td>
                            <td><a href="{{ url('profileuser/'.$sk->id_user) }}">{{ $sk->name }}</a></td>
                            <td>{{$sk->kategori}} </td>
                            <td>{{ $sk->isi }}</td>
                            <td>{{ date_format(date_create($sk->created_at),"d-m-Y") }}</td>
                             @if($sk->disposisi=='0')
                                  <?php $warna='belum validasi'; ?>
                                  @elseif($sk->disposisi=='1')
                                  <?php $warna='kaprodi'; ?>
                                  @elseif($sk->disposisi=='2')
                                  <?php $warna='kajur'; ?>
                                  @elseif($sk->disposisi=='3')
                                  <?php $warna='Sekjur'; ?>
                                  @elseif($sk->disposisi=='4')
                                  <?php $warna='KaLab'; ?>
                                  @elseif($sk->disposisi=='5')
                                  <?php $warna='Cetak'; ?>

                                  @endif
                            <td>{{$warna}}</td>
                            <td>
                              {!! Form::open([
                                  'method' => 'delete',
                                  'route' => ['surat_keluar.destroy',$sk->id_keluar],
                                  'id' => 'formdelete'.$sk->id_keluar
                              ]) !!}
                              {!!Form::close()!!}
                              @if(Auth::user()->id_role == 2)
                              <a title="Verivikasi" class="btn btn-xs btn-success" href="{{ url('verifykajur/'.$sk->id_keluar) }}" id="btnverify"><i class="fa fa-check-square"></i></a>
                              @endif
                              @if ($sk->disposisi=='5')
                              <a title="Print" class="btn btn-xs btn-default" href="{{ url('cetak/'.$sk->id_keluar) }}"><i class="fa fa-print"></i></a>
                              @endif
                               <a title="Detail" class="btn btn-xs btn-default" href="{{ url('surat_keluar/'.$sk->id_keluar) }}"><i class="fa fa-search"></i></a>
                               @if((Auth::user()->id_role == 1)||(Auth::user()->id_role == 3))
                              <a title="Edit" class="btn btn-xs btn-default" href="{{ url('surat_keluar/'.$sk->id_keluar.'/edit') }}"><i class="fa fa-edit"></i></a>
                              <a title="Delete" class="btn btn-xs btn-default" onclick="if(confirm('Apakah anda yakin akan menghapus surat keluar {{ $sk->no_surat }}')){ $('#formdelete{{ $sk->id_keluar }}').submit(); }"><i class="fa fa-close"></i></a>
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <tr>
                          <th>Id</th>
                          <th>No Surat</th>
                          <th>Mahasiswa</th>
                          <th>Kategori</th>
                          <th>Isi </th>
                          <th>waktu</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </tr>
                      </tfoot>
                    </table>
                  </div><!-- /.box-body -->
                @endif

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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel"><b>Pilih Surat</b></h4>
      </div>

      <div class="modal-body">
        <!-- select -->
                <div class="form-group">

                  <select class="form-control" onchange="location = this.options[this.selectedIndex].value;">
                  <option value="">Pilih surat</option>
                    <option value="rhs">Memo Cetak RHS</option>
                    <option value="observasi">Surat Observasi</option>
                    <option value="penelitian">Surat Penelitian</option>
                  </select>
                  <br>
                  <br>
                  <br>
        <br>
                </div>
      </div>
      <div class="modal-footer">


      </div>
    </div>
  </div>
</div>
