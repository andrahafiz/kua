<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SIMKAH</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ $type_menu === 'beranda' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ Request::routeIs('staff.married.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('staff.married.index') }}"><i class="fas fa-list"></i>
                    <span>Data Pernikahan</span></a>
            </li>
            <li class="{{ $type_menu === 'jadwal-pernikahan' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('staff.schedule') }}"><i class="fas fa-list"></i>
                    <span>Jadwal Pernikahan</span></a>
            </li>
            <li class="{{ Request::routeIs('staff.penghulu.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('staff.penghulu.index') }}"><i class="fas fa-user"></i>
                    <span>Penghulu</span></a>
            </li>
            <li class="{{ Request::routeIs('staff.document.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('staff.document.index') }}"><i class="fas fa-box-archive"></i>
                    <span>Pengarsipan Dokumen</span></a>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs" class="btn btn-warning btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Staff
            </a>
        </div>
    </aside>
</div>
