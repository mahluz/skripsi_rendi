		          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel -->
              <div class="user-panel">
                <div class="pull-left image">
                  <img src="{{url(Auth::user()->image)}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                  <p>{{ ucwords(Auth::user()->name) }}</p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
              </div>
              <!-- search form -->
              <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>
              <!-- /.search form -->
              <!-- sidebar menu: : style can be found in sidebar.less -->
              <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                @if(Auth::user()->status==1)
                <li class="{{ $active['dashboard'] or '' }}">
                  <a href="{{ url('/home') }} ">
                    <i class="fa fa-dashboard"></i> 
                    <span>Dashboard</span> 
                    <small class="label pull-right bg-green"></small>
                  </a>
                </li>
                @if(Auth::user()->id_role==1)
                <li class="{{ $active['surat_masuk'] or '' }}">
                  <a href="{{ url('/surat_masuk') }}">
                    <i class="fa fa-inbox"></i> 
                    <span>Surat Masuk</span> 
                    <small class="label pull-right bg-green"></small>
                  </a>
                </li>
                @endif
                
                 <li class="{{ $active['makalah'] or '' }} treeview">
                  <a href="#">
                    <i class="fa fa-envelope-o"></i> <span>Surat Keluar</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                  @if((Auth::user()->id_role== 1) || (Auth::user()->id_role==2))
                    <li class="{{ $active['semua'] or '' }}">
                      <a href="{{ url('/surat_keluar') }}">
                        <i class="fa fa-circle-o"></i> 
                        <span>Semua Surat</span> 
                        <small class="label pull-right bg-green"></small>
                      </a>
                    </li>
                   @endif
                    <li class="{{ $active['suratsaya'] or '' }}">
                      <a href="{{ url('/suratsaya') }}">
                        <i class="fa fa-circle-o"></i> 
                        <span>Surat Saya</span> 
                        <small class="label pull-right bg-green"></small>
                      </a>
                    </li>
                    @if((Auth::user()->id_role==2) || (Auth::user()->id_role==1))
                    <li class="{{ $active['tembusan'] or '' }}">
                      <a href="{{ url('/tembusan') }}">
                        <i class="fa fa-circle-o"></i> 
                        <span>Tembusan</span> 
                        <small class="label pull-right bg-green"></small>
                      </a>
                    </li>
                    @endif
                  </ul>
                </li>
                @if(Auth::user()->id_role==1)
                <li class="{{ $active['pengguna'] or '' }} treeview">
                  <a href="#">
                    <i class="fa fa-users"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="{{ $active['dosen'] or '' }}"><a href="{{url('dosen')}}"><i class="fa fa-circle-o"></i> Dosen</a></li>
                    <li class="{{ $active['mahasiswa'] or '' }}"><a href="{{url('mahasiswa')}}"><i class="fa fa-circle-o"></i> Mahasiswa</a></li>
                  </ul>
                </li>
                <li class="{{ $active['Kategori'] or '' }}">
                  @if((Auth::user()->id_role== 1) || (Auth::user()->id_role==2))
                    <li class="{{ $active['katsurat'] or '' }}">
                      <a href="#"><i class="fa fa-archive"></i> Kategori Surat<i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <?php
                        $katma = DB::table('kategori')->get();
                        ?>
                        @foreach($katma as $kat)
                          <li class="{{ $active['katma'.$kat->id_kategori] or '' }}"><a href="{{ url('katsurat/'.$kat->id_kategori) }}"><i class="fa fa-circle-o"></i> {{ $kat->kategori }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                    @endif
                  </a>
                </li>
                @endif
                @endif
                <li class="{{ $active['profile'] or '' }}">
                  <a href="{{url('/profile')}}">
                    <i class="fa fa-user"></i>
                     <span>Profile</span>
                  </a>
                </li>
              </ul>
            </section>
            <!-- /.sidebar -->
          </aside>