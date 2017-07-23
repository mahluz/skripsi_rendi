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
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
@endsection

@section('name')
  {{ Auth::user()->name }}
@endsection

 @section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cetak
        <small>Surat Keluar</small>
      </h1>
    </section>

    <section class="invoice">
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

            <p> Nomor   :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/UN37.1.5/DT/2017</p>
            <p> <b> Hal   &nbsp;&nbsp;&nbsp;&nbsp;        : Permohonan Izin Observasi</b></p> <br>
            <p> Yth : {{$surat_keluar[0]->kepada}} </p>
            <div class="col-xs-8">
            <p>{{$surat_keluar[0]->dari}}</p>
            </div>




          </div>

        </div>
        <!-- end row -->
        <div class="row">
        <br>
         <div class="col-xs-offset-1 col-xs-10">

            <p>Dengan hormat</p>
<p>&nbsp;</p>
<p>Kami mohonkan ijin untuk mahasiswa berikut :</p>
<p>&nbsp;</p>
<table border="1">
<tbody>
<tr>
<td width="32">
<p><strong>No</strong></p>
</td>
<td width="213">
<p><strong>Nama</strong></p>
</td>
<td width="170">
<p><strong>NIM</strong></p>
</td>
<td width="113">
<p><strong>Prodi</strong></p>
</td>
<td width="125">
<p><strong>Jurusan</strong></p>
</td>
</tr>
<tr>
<td width="32">
<p>1.</p>
<p></p>
</td>
<td width="213">
<p>{{$surat_keluar[0]->name}}</p>
</td>
<td width="170">
<p>{{$surat_keluar[0]->no_id}} </p>
</td>
<td width="113">
<p>&nbsp;&nbsp; S1 &nbsp;{{$surat_keluar[0]->jenis_prodi}} </p>
</td>
<td width="125">
<p>Teknik Elektro</p>
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>Agar diperkenankan mengadakan observasi&nbsp; tentang {{$surat_keluar[0]->isi}},yang bertujuan untuk mengumpulkan data dalam rangka penyelesaian studi yang diwajibkan.</p>
<p>&nbsp;</p>
<p>Demikian atas dikabulkan permohonan ini, kami ucapkan terima kasih.</p>

           
           </div>

                                      <div class="row">
                    <div class="col-xs-offset-7 col-xs-5">
                      <p> Semarang, {{ date_format(date_create($surat_keluar[0]->updated_at),"d-m-Y") }} </p>
                      <p>A.n Dekan </p>
                      <p>Wakil Dekan Bidang Akademik </p>
                    </div>
                  </div>

                  <br>
                  <br>
                  <br>

                  <div class="row">
                    <div class="col-xs-offset-1 col-xs-6">
                      <p>Tembusan :</p>
                      <p>Ketua Jurusan TE Fakultas Teknik </p>
                      <p>Universitas Negeri Semarang</p>
                      <p><b>FM -01-AKD-21C</b></p>
                    </div>
                    <div class="col-xs-5">
                      <p> Dr. I Made Sudana M.Pd </p>
                      <p>NIP. 195605081984031004</p>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-xs-offset-9 col-xs-10">
                    <!-- <p data-date-format="dd-mm-yyyy">{{$surat_keluar[0]->updated_at}}</p> -->

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

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="" onclick="window.print();" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>

    </section>

@endsection
@section('script')
<!-- ./wrapper -->
<script type="text/javascript">


  $(document).ready(function(){
    $("#isi").html($("#content").val());
  });
</script>
@endsection
