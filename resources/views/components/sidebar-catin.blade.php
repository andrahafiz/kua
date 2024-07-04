<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SIMKAH</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header"></li>
            <li class="{{ Request::is('catin/beranda') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('catin.beranda') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ Request::is('catin/pendaftaran') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('catin.married.index') }}"><i class="far fa-file"></i>
                    <span>Form
                        Pendaftaran</span></a>
            </li>
            <li class="{{ Request::is('catin/perceraian') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('catin.perceraian.index') }}"><i class="fa fa-heart-crack"
                        style="margin-left: 4px;"></i>
                    <span>Perceraian
                    </span></a>
            </li>
            <li class="">
                <a class="nav-link" href=""><i class="far fa-heart"></i>
                    <span>Rujuk
                    </span></a>
            </li>
            <li class="{{ Request::is('catin/notification') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('catin.married.notification') }}"><i class="far fa-bell"></i>
                    <span>Notifikasi</span></a>
                {{-- <span class="badge badge-danger" style="width: 20%">5</span> --}}
            </li>
            <li class="{{ Request::is('catin/document') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('catin.download.document') }}"><i class="far fa-file-lines"></i>
                    <span>Template Dokumen</span></a>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Calon Pengantin
            </a>
        </div>
    </aside>
</div>
