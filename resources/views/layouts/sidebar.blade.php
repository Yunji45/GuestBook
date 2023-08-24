<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('home')}}"><img src="{{asset('stisla/dist/assets/img/JST-orange.png')}}" alt="" widht="50" height="50">JS-Technology</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Pages</li>
            @if (auth()->user()->role == 'admin')
            <li class="active">
                <a class="nav-link" href="{{route('verifikasi.tamu')}}">
                    <i class="far fa-address-card"></i>
                    <span>Verifikasi Data</span>
                </a>
            </li>
            <li class="active">
                <a class="nav-link" href="">
                    <i class="far fa-folder-open"></i>
                    <span>Backup Database</span>
                </a>
            </li>
            <li class="active">
                <a class="nav-link" href="{{route('dataevent')}}">
                    <i class="fas fa-plane"></i>
                    <span>Event</span>
                </a>
            </li>
            @endif
            <li class="active">
                <a class="nav-link" href="{{route('datatamu')}}">
                    <i class="fas fa-chart-line"></i>
                    <span>Data Tamu</span>
                </a>
            </li>

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a
                href="{{route('logout')}}"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i>
                Logout
            </a>
        </div>
    </aside>
</div>