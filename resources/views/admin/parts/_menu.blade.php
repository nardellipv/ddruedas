<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}"><span
                        class="logo-name">Dedosruedas</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="book-open"></i><span>Blog</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('blog.listAdmin') }}">Listar Post</a></li>
                    <li><a class="nav-link" href="{{ route('blog.create') }}">Crear Post</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>