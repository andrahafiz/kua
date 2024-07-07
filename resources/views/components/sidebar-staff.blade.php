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
            <li class="{{ Request::routeIs('staff.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('staff.dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ Request::routeIs('staff.married.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('staff.married.index') }}"><i class="fas fa-list"></i>
                    <span>Data Pernikahan</span></a>
            </li>
            <li class="{{ Request::routeIs('staff.perceraian.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('staff.perceraian.index') }}"><i class="fa fa-heart-crack"
                        style="margin-left: 4px;"></i>
                    <span>Perceraian
                    </span></a>
            </li>
            <li class="{{ Request::routeIs('staff.rujuk.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('staff.rujuk.index') }}"><i class="fa fa-heart"
                        style="margin-left: 4px;"></i>
                    <span>Rujuk
                    </span></a>
            </li>
            <li class="{{ $type_menu === 'jadwal-pernikahan' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('staff.schedule') }}"><i class="fas fa-list"></i>
                    <span>Jadwal Pernikahan</span></a>
            </li>
            <li class="{{ Request::routeIs('staff.penghulu.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('staff.penghulu.index') }}"><i class="fas fa-user"></i>
                    <span>Penghulu</span></a>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'document' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-box-archive"></i>
                    <span>Pengarsipan Dokumen</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::routeIs('staff.document.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('staff.document.index') }}">Dokumen Umum</a>
                    </li>
                    <li class="{{ Request::routeIs('staff.archive.document.cerai') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('staff.archive.document.cerai') }}">Dokumen
                            Perceraian</a>
                    </li>
                    <li class="{{ Request::routeIs('staff.archive.document.rujuk') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('staff.archive.document.rujuk') }}">Dokumen Rujuk</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs" class="btn btn-warning btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Staff
            </a>
        </div>
    </aside>
</div>
