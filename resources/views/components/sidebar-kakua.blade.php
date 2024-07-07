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
            <li class="{{ Request::routeIs('kakua.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kakua.dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ Request::routeIs('kakua.married.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kakua.married.index') }}"><i class="fas fa-list"></i>
                    <span>Data Pernikahan</span></a>
            </li>
            <li class="{{ Request::routeIs('kakua.perceraian.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kakua.perceraian.index') }}"><i class="fa fa-heart-crack"
                        style="margin-left: 4px;"></i>
                    <span>Perceraian
                    </span></a>
            </li>
            <li class="{{ Request::routeIs('kakua.rujuk.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kakua.rujuk.index') }}"><i class="fa fa-heart"
                        style="margin-left: 4px;"></i>
                    <span>Rujuk
                    </span></a>
            </li>
            <li class="{{ $type_menu === 'jadwal-pernikahan' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kakua.schedule') }}"><i class="fas fa-list"></i>
                    <span>Jadwal Pernikahan</span></a>
            </li>
            <li class="{{ Request::routeIs('kakua.penghulu.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kakua.penghulu.index') }}"><i class="fas fa-user"></i>
                    <span>Penghulu</span></a>
            </li>
            <li class="{{ Request::routeIs('kakua.document.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kakua.document.index') }}"><i class="fas fa-box-archive"></i>
                    <span>Pengarsipan Dokumen</span></a>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs" class="btn btn-info btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Kepala KUA
            </a>
        </div>
    </aside>
</div>
