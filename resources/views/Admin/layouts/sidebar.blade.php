<div class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" id="sidebar">
    <div class="offcanvas-body px-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li class="pt-5">
                    <div class="text-light small fw-bold text-uppercase px-3">
                        هسته
                    </div>
                </li>
                <li class="{{ Route::is('admin.index') ? 'bg-brown' : '' }}">
                    <a href="{{ route('admin.index') }}" class="nav-link px-3">
                        <span class="me-2"><i class="fa-solid fa-chart-line"></i></span>
                        <span>داشبورد</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.users.index') ? 'bg-brown' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="nav-link px-3">
                        <span class="me-2"><i class="fa-solid fa-users"></i></span>
                        <span>کاربران</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
