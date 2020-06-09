

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('assets/img/logo.jpeg')}}" alt="Persija Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @guest
                    @else
                        {{ Auth::user()->name }}
                    @endguest
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link {{(request()->segment(1) == '') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{(request()->segment(1) == 'barang') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{(request()->segment(1) == 'barang') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                        Barang
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('barang.index')}}" class="nav-link {{(request()->segment(1) == 'barang') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Barang</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{(request()->segment(1) == 'rekap') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{(request()->segment(1) == 'rekap') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                        Laporan
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('rekap.index')}}" class="nav-link {{(request()->segment(1) == 'rekap') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rekapitulasi</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">

                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
