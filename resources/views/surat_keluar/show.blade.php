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
    <style>
hr {
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 3px;
}
</style>
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
              <div class="container">

        <div class="row">

          <div class="col-xs-3">
            <img src="{{URL('images/unnes2015_black.jpg')}}" height="140" width="200" style="padding-left: 50px;">
          </div>
          <!-- end col lg 2 -->

          <div class="col-xs-8">

            <div class="text-center">

              <p> KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI UNIVERSITAS NEGERI SEMARANG <br>
               <b> FAKULTAS TEKNIK </b> <br>
              Gedung E1 Kampus Sekaran Gunungpati Semarang 50229<br>
              Telepon/Fax (024) 8508101 – 8508009 <br>
              Laman : http://www.ft.unnes.ac.id, surel: ft_unnes@yahoo.com</p>
            </div>
            <!-- end text center -->
          </div>
          <!-- end col lg 10 -->
        </div>
        <!-- end row -->
        <div class="row">
              <div class="col-xs-offset-1 col-xs-10">
              <hr>
              </div>
        </div>
        <!-- end row -->

        <div class="row">

           <div class="col-xs-offset-1 col-xs-10">

            <p> Nomor   :    </p>
            <p> <b> Hal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  Ijin Penelitian </b></p> <br>
            <p> Yth : {{$surat->kepada}} </p>
            <div class="col-xs-8">
            <p>{{$surat->dari}}</p>
            </div>
           </div>
        </div>

        </div>
        <!-- end row -->
        <div class="row">
        <br>
         <div class="col-xs-offset-1 col-xs-10">

           <p>Dengan hormat,</p>
<p>Bersama ini, kami mohon ijin pelaksanaan Penelitian untuk penyusunan Skripsi / Tugas Akhir oleh mahasiswa sebagai berikut :</p>
<p>&nbsp;</p>
<p>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; {{$surat->name}}</p>
<p>Nim &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;{{$surat->no_id}}</p>
<p>Program Studi &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: SI&nbsp;{{$surat->jenis_prodi}}</p>
<p>Topik &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : {{$surat->isi}}</p>
<p>&nbsp;</p>
<p>Atas perhatian dan kerjasamanya di ucapkan terima kasih.</p>

           </div>

                 

                  <div class="row">
                
                    <div class="row">
                      <div class="col-xs-offset-7 col-xs-5">
                        <p> Semarang, {{ date_format(date_create($surat->updated_at),"d-m-Y") }} </p>
                        <p> Dekan, </p>
                      </div>
                    </div>

                    <br>
                    <br>
                    <br>

                    <div class="row">
                      <div class="col-xs-offset-7 col-xs-5">
                        <p> Dr. Nur Qudus M.T </p>
                        <p>NIP. 196911301994031001</p>
                      </div>
                    </div>


                    <div class="row">
                    <div class="col-xs-offset-9 col-xs-10">
                      <!-- <p data-date-format="dd-mm-yyyy">{{$surat->updated_at}}</p> -->

                      <br>
                      <br>
                      <br>
                    </div>
                    <div class="row">
                      <div class="col-xs-offset-9 col-xs-10">

                      </div>
                      <div class="col-xs-5">

                      </div>
                    </div>

                    </div>

          </div>
        <!-- end row -->


      </div>
      <!-- end container fluid -->



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
  $(document).ready(function(){
    $("#isi").html($("#content").val());
  });
</script>
@endsection
