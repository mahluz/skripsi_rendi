        <header class="main-header">
            <!-- Logo -->
            <a href="{{url('/')}}" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>TE</b></span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>Administrasi Surat</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                    <?php
        // $km_unread=null;
        // $newmessage=null;
        // if (Auth::user()->id_role==1) {
        //     $km_unread = DB::table('komentar_makalah as k')
        //         ->leftjoin('users as u','k.id_user','=','u.id_user')
        //         ->where([
        //             ['k.readby','not like','%('.Auth::user()->id_user.')%']
        //             ])
        //         ->orderBy('k.waktu','asc')
        //         ->get();

        //     $newmessage = DB::table('komentar_makalah as k')
        //         ->where([
        //             ['k.readby','not like','%('.Auth::user()->id_user.')%'],
        //             ])
        //         ->count();
        // }
        // else if(Auth::user()->id_role==2){
        //     $km_unread = DB::table('komentar_makalah as k')
        //         ->leftjoin('dosen_makalah as em','em.id_makalah','=','k.id_makalah')
        //         ->leftjoin('users as u','k.id_user','=','u.id_user')
        //         ->where([
        //             ['em.id_user',Auth::user()->id_user],
        //             ['k.readby','not like','%('.Auth::user()->id_user.')%']
        //             ])
        //         ->orderBy('k.waktu','asc')
        //         ->get();

        //     $newmessage = DB::table('komentar_makalah as k')
        //         ->leftjoin('dosen_makalah as em','em.id_makalah','=','k.id_makalah')
        //         ->where([
        //             ['em.id_user',Auth::user()->id_user],
        //             ['k.readby','not like','%('.Auth::user()->id_user.')%'],
        //             ])
        //         ->count();
        // }
        // else if(Auth::user()->id_role==3){
        //     $km_unread = DB::table('komentar_makalah as k')
        //         ->leftjoin('makalah as m','m.id_makalah','=','k.id_makalah')
        //         ->leftjoin('users as u','k.id_user','=','u.id_user')
        //         ->where([
        //             ['m.id_user',Auth::user()->id_user],
        //             ['k.readby','not like','%('.Auth::user()->id_user.')%']
        //             ])
        //         ->orderBy('k.waktu','asc')
        //         ->get();

        //     $newmessage = DB::table('komentar_makalah as k')
        //         ->leftjoin('makalah as m','m.id_makalah','=','k.id_makalah')
        //         ->where([
        //             ['m.id_user',Auth::user()->id_user],
        //             ['k.readby','not like','%('.Auth::user()->id_user.')%'],
        //             ])
        //         ->count();
        // }
        //             ?>
                  <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-envelope-o"> <span class="badge" id="totalNotif">7</span></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">Anda memiliki komentar baru</li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu" id="notif">
                        </ul>

                      </li>
                    </ul>
                  </li>

                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="{{url(Auth::user()->image)}}" class="user-image" alt="User Image">
                      <span class="hidden-xs">{{ ucwords(Auth::user()->name) }}</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="{{url(Auth::user()->image)}}" class="img-circle" alt="User Image">
                        <p>
                          {{ ucwords(Auth::user()->name) }}
                          <small>Member since {{ date_format(date_create(Auth::user()->created_at),"M j") }}<sup>{{ date_format(date_create(Auth::user()->created_at),"S") }}</sup>, {{ date_format(date_create(Auth::user()->created_at),"Y") }}</small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                      <li class="user-body">
                        <div class="col-xs-4 text-center">
                          <a href="{{ url('profile/timeline') }}">Timeline</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="{{ url('profile/edit') }}">Edit Profile</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="{{ url('profile/password') }}">Change Password</a>
                        </div>
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="{{ url('profile') }}" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                          <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>

            <input type="hidden" name="" id="statusUser" value="{{Auth::user()->id_role}}">

<script type="text/javascript">
          $(document).ready(function(){
            var role = $("#statusUser").val();
            var jabatan = $("#jabatanUser").val();
            var totalNotif = 0;
            var disposisi;
            console.log(role);
            console.log(jabatan);

            if(role==2){
              // var data = {disposisi:disposisi,}
              $.post("http://localhost/skripsi_rendi/public/notif",{disposisi:role},function(data){
                console.log(data);

                $.each(data,function(item,i){
                  totalNotif=totalNotif+1;
                  $("#notif").append(
                    "<li>\
                      <a href={{url('selectedSuratKeluarKajur')}}/"+this.id_keluar+">\
                      "+this.name+"\
                      </a>\
                    </li>"
                  );
                });

                console.log(totalNotif);

                $("#totalNotif").text(totalNotif);

              },"json");

            }//end if
          });
        </script>
          </header>
