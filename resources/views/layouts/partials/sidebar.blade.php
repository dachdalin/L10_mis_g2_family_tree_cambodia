<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('asset') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle "
        style="opacity: .8; width:100%;height:100px;object-fit:contain;max-height:74px;margin-left:0;">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            ផ្ទាំងគ្រប់គ្រង
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item @if(request()->routeIs('admin.users*', 'admin.roles*','admin.permissions*')) menu-is-opening menu-open  @endif">
                    <a href="{{ route('admin.users.index') }}" class="nav-link @if(request()->routeIs('admin.users*')) active @endif">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Manage Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link @if(request()->routeIs('admin.users*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.roles.index')}}" class="nav-link @if(request()->routeIs('admin.roles*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.permissions.index')}}" class="nav-link @if(request()->routeIs('admin.permissions*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            ការកំណត់
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
