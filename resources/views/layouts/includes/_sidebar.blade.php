@if(auth()->user()->role=='admin')
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/images/avatar-1.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{auth()->user()->name}}</a>
            <span class="right badge badge-info">Admin</span>
        </div>
    </div>




    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{route('admin/dashboard')}}" class="{{Request::is('admin/dashboard')?'active':''}} nav-link ">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{route('admin/profile')}}" class="{{Request::is('admin/profile')?'active':''}} nav-link ">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Profile
                    </p>
                </a>
            </li> --}}

            <li class="nav-item
          @if (Request::is('admin/datapenduduk'))
          {{Request::is('admin/datapenduduk')?'menu-open':''}}

          @endif ">
                <!-- <a href="#" class="nav-link
          @if (Request::is('admin/datapenduduk'))
          {{Request::is('admin/datapenduduk')?'active':''}}
          @elseif(Request::is('admin/kartukeluarga'))
            {{Request::is('admin/kartukeluarga')?'active':''}}
             @elseif(Request::is('admin/penduduktetap'))
            {{Request::is('admin/penduduktetap')?'active':''}}
          @endif "> -->
                    <!-- <i class="nav-icon far fa-newspaper"></i>
                    <p> -->
                        <!-- Kelola Data
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item"> -->
                        <a href="{{ route('admin/kartukeluarga') }}"
                            class="{{Request::is('admin/kartukeluarga')?'active':''}} nav-link ">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Kartu Keluarga
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin/datapenduduk')}}"
                            class="nav-link {{Request::is('admin/datapenduduk')?'active':''}}">
                            <i class="fas fa-list nav-icon"></i>
                            <p>Data Penduduk</p>
                        </a>
                    </li>


                    <!-- ini batas  -->
                    <!-- <li class="nav-item">
                        <a href="{{route('admin/penduduktetap')}}"
                            class="nav-link {{Request::is('admin/penduduktetap')?'active':''}}">
                            <i class="fas fa-list nav-icon"></i>
                            <p>Penduduk Tetap</p>
                        </a>
                    </li> -->
                  
                    <!-- {{-- <li class="nav-item">
                        <a href="{{route('admin/pendudukpindah')}}"
                    class="nav-link {{Request::is('admin/pendudukpindah')?'active':''}}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>Penduduk Pindah</p>
                    </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin/pendudukpindah')}}"
                    class="nav-link {{Request::is('admin/pendudukpindah')?'active':''}}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>Penduduk Lahir</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin/pendudukpindah')}}"
                    class="nav-link {{Request::is('admin/pendudukpindah')?'active':''}}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>Penduduk Meninggal</p>
                </a>
            </li> --}}

        </ul>
        </li> -->


<!-- 
ini batas kelola surat -->

        <!-- <li class="nav-item
         @if (Request::is('admin/datasurat'))
          {{Request::is('admin/datasurat')?'menu-open':''}}
            @elseif(Request::is('admin/datapermintaan'))
             {{Request::is('admin/datapermintaan')?'menu-open':''}}
          @endif ">
            <a href="#" class="nav-link
          @if (Request::is('admin/datasurat'))
          {{Request::is('admin/datasurat')?'active':''}}
            @elseif(Request::is('admin/datapermintaan'))
            {{Request::is('admin/datapermintaan')?'active':''}}
          @endif ">
                <i class="nav-icon far fa-newspaper"></i>
                <p>
                    Kelola Surat
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
             -->   <li class="nav-item"> 
                    <a href="{{route('admin/datasurat')}}"
                        class="nav-link {{Request::is('admin/datasurat')?'active':''}}">
                        <i class="fas fa-file-alt nav-icon"></i>
                        <p>Contoh Surat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin/datapermintaan')}}"
                        class="nav-link {{Request::is('admin/datapermintaan')?'active':''}}">
                        <i class="fas fa-folder-open nav-icon"></i>
                        <p>Data Permintaan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin/datapengaduan')}}"
                        class="nav-link {{Request::is('admin/datapengaduan')?'active':''}}">
                        <i class="fas fa-window-restore nav-icon"></i>
                        <p>Data Pengaduan</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout Out</p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
@elseif(auth()->user()->role=='user')
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/images/avatar-1.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{auth()->user()->name}}</a>
            <span class="right badge badge-info">User</span>
        </div>
    </div>




    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{route('user/dashboard')}}" class="{{Request::is('user/dashboard')?'active':''}} nav-link ">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <!-- <li class="nav-item
          @if (Request::is('user/datasurat'))
          {{Request::is('user/datasurat')?'menu-open':''}}
            @elseif(Request::is('user/datapermintaan'))
             {{Request::is('user/datapermintaan')?'menu-open':''}}
             @elseif(Request::is('user/datapengaduan'))
             {{Request::is('user/datapengaduan')?'menu-open':''}}
          @endif ">
            <a href="#" class="nav-link
          @if (Request::is('user/datasurat'))
          {{Request::is('user/datasurat')?'active':''}}
            @elseif(Request::is('user/datapermintaan'))
            {{Request::is('user/datapermintaan')?'active':''}}
            @elseif(Request::is('user/datapengaduan'))
            {{Request::is('user/datapengaduan')?'active':''}}
          @endif ">
                <i class="nav-icon far fa-newspaper"></i>
                <p>
                    Kelola Surat
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;"> -->
                <li class="nav-item">
                    <a href="{{route('user/datasurat')}}"
                        class="nav-link {{Request::is('user/datasurat')?'active':''}}">
                        <i class="fas fa-file-alt nav-icon"></i>
                        <p>Contoh Surat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user/datapermintaan')}}"
                        class="nav-link {{Request::is('user/datapermintaan')?'active':''}}">
                        <i class="fas fa-folder-open nav-icon"></i>
                        <p>Data Permintaan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user/datapengaduan')}}"
                        class="nav-link {{Request::is('user/datapengaduan')?'active':''}}">
                        <i class="fas fa-window-restore nav-icon"></i>
                        <p>Data Pengaduan</p>
                    </a>
                </li>
            </ul>
        </li>





            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Sign Out
                    </p>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
@endif

<script>

</script>
