<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('storage/' . $web_config['logo'] ?? 'images/no_image_available.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle "
        style="opacity: .8; width:100%;height:100px;object-fit:contain;max-height:74px;margin-left:0;">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            ផ្ទាំងគ្រប់គ្រង
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item @if(request()->routeIs('admin.users*', 'admin.roles*','admin.permissions*')) menu-is-opening menu-open  @endif">
                    <a href="{{ route('admin.users.index') }}" class="nav-link @if(request()->routeIs('admin.users*')) active @endif">
                        <i class="nav-icon fa fa-group"></i>
                        <p>
                            គ្រប់គ្រងអ្នកប្រើប្រាស់
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

                {{-- <li class="nav-header">គ្រប់គ្រងអាសយដ្ឋាន</li>
                <li class="nav-item @if(request()->routeIs('admin.provinces*','admin.districts*')) menu-is-opening menu-open @endif">
                    <a href="{{ route('admin.provinces.index') }}" class="nav-link @if(request()->routeIs('admin.provinces*')) active @endif">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            គ្រប់គ្រងអាសយដ្ឋាន
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.provinces.index') }}" class="nav-link @if(request()->routeIs('admin.provinces*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Provinces</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.districts.index') }}" class="nav-link @if(request()->routeIs('admin.districts*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Districts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Communes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Villages</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                {{-- <li class="nav-header">Family Teams</li> --}}
                <li class="nav-item">
                    <a href="{{ route('admin.people.search') }}" class="nav-link @if(request()->routeIs('admin.people.search')) active @endif">
                        <i class="nav-icon fas fa-search"></i>
                        <p>Team Lists</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>Birthdays</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.peoples.show', "id") }}" class="nav-link @if(request()->routeIs('admin.people.show', "id")) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Show person profile</p>
                    </a>
                </li> --}}
                <li class="nav-item @if(request()->routeIs('admin.teams*')) menu-is-opening menu-open  @endif">
                    <a href="{{ route('admin.teams.index') }}" class="nav-link @if(request()->routeIs('admin.teams*')) active @endif">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Manage Teams
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.teams-setting') }}" class="nav-link @if(request()->routeIs('admin.teams-setting*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Team Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.teams.index')}}" class="nav-link @if(request()->routeIs('admin.teams*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Team</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.people.birthCertificate')}}" class="nav-link">
                        <i class="nav-icon fa fa-vcard-o"></i>
                        <p>
                            សំបុត្រកំណើរ
                        </p>
                    </a>
                </li>
                @can('view_setting')
                <li class="nav-item @if(request()->routeIs('admin.setting*')) menu-is-opening menu-open  @endif">
                    <a href="{{ route('admin.setting.index') }}" class="nav-link @if(request()->routeIs('admin.setting*')) active @endif">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            ការកំណត់
                        </p>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
