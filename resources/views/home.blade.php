@extends('layouts.app')

@section('style')
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('font-awesome-4.6.1/css/font-awesome.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('ionicons-2.0.1/css/ionicons.min.css') }}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
        <!-- bootstrap wysihtml5 - text dosen -->
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endsection

@section('name')
  {{ Auth::user()->name }}
@endsection

@section('content')
            <section class="content-header">
              <h1>
                Selamat Datang di Sistem Pengajuan Surat Jurusan Teknik Elektro
              </h1>
            </section>

            <!-- Main content -->
            <section class="content">
              <!-- Small boxes (Stat box) -->
              <section class="content">

          <div class="row">
            <div class="col-md-12">
              @if(Auth::user()->status==0)
              <div class="box-header with-border">
                <div class="alert alert-info alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-info"></i> Selamat Datang!</h4>
                  Untuk sementara, anda belum bisa beraktifitas di sistem ini, karena status registrasi anda sedang dalam proses aproval oleh admin.
                </div>
              </div>
              @endif

            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                   <div id="list">
                        <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>Memo RHS</h3>
                      <p>Memo Rekap Hasil Studi</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-checkmark-circled"></i>
                    </div>
                    <a href="{{url('/rhs')}}" class="small-box-footer">Buat Surat <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>Surat Observasi</h3>
                      <p>Surat Observasi</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-edit"></i>
                    </div>
                    <a href="{{url('/observasi')}}" class="small-box-footer">Buat Surat <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3>Surat Penelitian</h3>
                      <p>Surat Penelitian</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-close-circled"></i>
                    </div>
                    <a href="{{url('/penelitian')}}" class="small-box-footer">Buat Surat <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                    </div>
                     <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>Cetak KRS</h3>
                      <p>Cetak Surat RHS</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-checkmark-circled"></i>
                    </div>
                    <a href="{{url('/cetakkrs')}}" class="small-box-footer">Buat Surat <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>Memo PKL </h3>
                      <p>Memo Praktik Kerja Lapangan</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-edit"></i>
                    </div>
                    <a href="{{url('/pkl')}}" class="small-box-footer">Buat Surat <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3>Surat Permohonan</h3>
                      <p>Surat Permohonan </p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-close-circled"></i>
                    </div>
                    <a href="{{url('/permohonan')}}" class="small-box-footer">Buat Surat <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->




              <div class="box-header with-border">
                <div class="alert alert-danger alert-dismissable" id="gagal" style="display:none">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                  Transaksi Gagal!
                </div>
                <div class="alert alert-success alert-dismissable" id="berhasil" style="display:none">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4>  <i class="icon fa fa-check"></i> Sukses!</h4>
                  Transaksi Berhasil!
                </div>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- /.content -->
              <!-- Main row -->
              <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">

                  <!-- Calendar -->


                </section><!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">
                  <!-- Custom tabs (Charts with tabs)-->



                </section><!-- right col -->
              </div><!-- /.row (main row) -->
              <div class="row">
                <div class="col-xs-12">

                </div><!-- /.col -->
              </div><!-- /.row -->
            </section>

@endsection

@section('script')
        <!-- jQuery 2.1.4 -->
        <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- DataTables -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
        <!-- jvectormap -->
        <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- datepicker -->
        <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
        <!-- Slimscroll -->
        <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="{{ asset('plugins/chartjs/Chart.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/app.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('dist/js/demo.js') }}"></script>
        
@endsection
