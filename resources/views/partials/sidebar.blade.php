<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if (route('dashboard') == url()->current())
            <li class="nav-item active">
            @else
            <li class="nav-item">
        @endif
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cagur.index') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Calon Guru</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('result') }}">
                <i class="icon-layers menu-icon"></i>
                <span class="menu-title text-wrap">Hasil Perhitungan</span>
            </a>
        </li>
    </ul>
</nav>
