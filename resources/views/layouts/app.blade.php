
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistem Administrasi Surat Jurusan Teknik Elektro</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        @yield('style')
    </head>
      <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

          @include("layouts.header")
          @include("layouts.sidebar")

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                @yield("content")
          </div><!-- /.content-wrapper -->
          <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Laravel</b> 5.2
            </div>
            <strong>Copyright &copy; 2016 <a href="">Sistem Administrasi Surat Jurusan Elektro</a>.</strong> All rights reserved.
          </footer>

        </div><!-- ./wrapper -->

        @yield('script')
    </body>
</html>
