<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">youre app</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/profile.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                    <h5 class="d-block">{{ Auth::user()->name ?? 'Guest' }}</h5>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(Auth::user() && Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User Management
                            </p>
                        </a>
                    </li>
                    <!-- Tambahkan item sidebar lainnya yang hanya untuk admin di sini -->
                @endif
                <!-- Item sidebar lainnya yang bisa diakses oleh semua pengguna -->
            </ul>
        </nav>
    </div>
</aside>
