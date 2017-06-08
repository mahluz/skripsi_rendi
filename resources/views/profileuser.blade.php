@extends('layouts.app')

@section('style')
<!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('font-awesome-4.6.1/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('ionicons-2.0.1/css/ionicons.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
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
                mahasiswa
                <small>{{ $sub_judul }}</small>
              </h1>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-xs-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Detail mahasiswa</h3>
                    </div><!-- /.box-header -->
                      <div class="box-body">
                        <table class="table">
                        @if(Auth::user()->id_role==1)
                        <tr>
                          <th style="width:30%">Action</th>
                          <td style="width:70%">
                            {!! Form::open([
                                'method' => 'delete',
                                'route' => ['mahasiswa.destroy',$user->id_user],
                                'id' => 'formdelete'.$user->id_user
                            ]) !!}
                            {!!Form::close()!!}
                            <a title="Edit" class="btn btn-xs btn-default" href="{{ url('mahasiswa/'.$user->id_user.'/edit') }}"><i class="fa fa-edit"></i></a>
                            <a title="Delete" class="btn btn-xs btn-default" onclick="if(confirm('Apakah anda yakin akan menghapus mahasiswa {{ $user->id_user }}?')){ $('#formdelete{{$user->id_user}}').submit(); }"><i class="fa fa-close"></i></a>
                          </td>
                        </tr>
                        @endif
                        <tr>
                          <th>Status</th>
                            @if($user->status=='1')
                            <?php $warna='green'; ?>
                            @else
                            <?php $warna='red'; ?>
                            @endif
                          @if(Auth::user()->id_role == 1)
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-xs bg-{{ $warna }}">{{ ucfirst($user->status==1?"Aktif":"Non-aktif") }}</button>
                              <button type="button" class="btn btn-xs bg-{{ $warna }} dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                {!!Form::model($user, [
                                  "method" => "patch",
                                  "route" => ["mahasiswa.update",$user->id_user],
                                  "id" => "formid".$user->id_user
                                ])!!}
                                {!! Form::hidden('status',$user->status,array('id' => 'status'.$user->id_user)) !!}
                                {!! Form::close() !!}
                                @if($user->status!="1")
                                  <li><a class="btn btn-xs bg-green"  onclick="if(confirm('Anda yakin akan mengubah status mahasiswa {{ $user->id_user }} menjadi AKTIF?')){$('#status{{$user->id_user}}').val(1);$('#formid{{$user->id_user}}').submit();}">Aktif</a></li>
                                @endif
                                @if($user->status!="0")
                                  <li><a class="btn btn-xs bg-red"  onclick="if(confirm('Anda yakin akan mengubah status mahasiswa {{ $user->id_user }} menjadi NON-AKTIF?')){$('#status{{$user->id_user}}').val(0);$('#formid{{$user->id_user}}').submit();}">Non-Aktif</a></li>
                                @endif
                              </ul>
                            </div>
                          </td>
                          @else
                          <td>
                            <button type="button" class="btn btn-xs bg-{{ $warna }}">{{ ($user->status==1?"Aktif":"Non-Aktif") }}</button>
                          </td>
                          @endif
                        </tr>
                        <tr>
                          <th>Photo</th>
                          <td><img src="{{ url($user->image) }}" width="10%"></td>
                        </tr>
                        <tr>
                          <th>Nama</th>
                          <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                          <th>Nomor Pegawai</th>
                          <td>{{ $user->no_id }}</td>
                        </tr>
                        <tr>
                          <th>Prodi </th>
                          <td>{{ $user->prodi }}</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                          <th>No Telp</th>
                          <td>{{ $user->no_telp }}</td>
                        </tr>
                        <tr>
                          <th>Registrasi tanggal</th>
                          <td>{{ date_format(date_create($user->created_at),"d-m-Y") }}</td>
                        </tr>
                        @if(Auth::user()->id_role==1)
                        <tr>
                          <th style="width:30%">Action</th>
                          <td style="width:70%">
                            {!! Form::open([
                                'method' => 'delete',
                                'route' => ['mahasiswa.destroy',$user->id_user],
                                'id' => 'formdelete'.$user->id_user
                            ]) !!}
                            {!!Form::close()!!}
                            <a title="Edit" class="btn btn-xs btn-default" href="{{ url('mahasiswa/'.$user->id_user.'/edit') }}"><i class="fa fa-edit"></i></a>
                            <a title="Delete" class="btn btn-xs btn-default" onclick="if(confirm('Apakah anda yakin akan menghapus mahasiswa {{ $user->id_user }}?')){ $('#formdelete{{$user->id_user}}').submit(); }"><i class="fa fa-close"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <th>Status</th>
                            @if($user->status=='1')
                            <?php $warna='green'; ?>
                            @else
                            <?php $warna='red'; ?>
                            @endif
                          @if(Auth::user()->id_role == 1)
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-xs bg-{{ $warna }}">{{ ucfirst($user->status==1?"Aktif":"Non-aktif") }}</button>
                              <button type="button" class="btn btn-xs bg-{{ $warna }} dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                {!!Form::model($user, [
                                  "method" => "patch",
                                  "route" => ["mahasiswa.update",$user->id_user],
                                  "id" => "formid".$user->id_user
                                ])!!}
                                {!! Form::hidden('status',$user->status,array('id' => 'status'.$user->id_user)) !!}
                                {!! Form::close() !!}
                                @if($user->status!="1")
                                  <li><a class="btn btn-xs bg-green"  onclick="if(confirm('Anda yakin akan mengubah status mahasiswa {{ $user->id_user }} menjadi AKTIF?')){$('#status{{$user->id_user}}').val(1);$('#formid{{$user->id_user}}').submit();}">Aktif</a></li>
                                @endif
                                @if($user->status!="0")
                                  <li><a class="btn btn-xs bg-red"  onclick="if(confirm('Anda yakin akan mengubah status mahasiswa {{ $user->id_user }} menjadi NON-AKTIF?')){$('#status{{$user->id_user}}').val(0);$('#formid{{$user->id_user}}').submit();}">Non-Aktif</a></li>
                                @endif
                              </ul>
                            </div>
                          </td>
                          @else
                          <td>
                            <button type="button" class="btn btn-xs bg-{{ $warna }}">{{ ucfirst($user->status) }}</button>
                          </td>
                          @endif
                        </tr>
                        @endif
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