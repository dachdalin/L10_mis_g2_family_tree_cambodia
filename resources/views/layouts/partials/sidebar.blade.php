<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('asset') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle "
        style="opacity: .8; width:100%;height:100px;object-fit:contain;max-height:74px;margin-left:0;">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            ផ្ទាំងគ្រប់គ្រង
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item @if(request()->routeIs('expenses*')) menu-is-opening menu-open  @endif">
                    <a href="{{ route('expenses.index') }}" class="nav-link @if(request()->routeIs('expenses*')) active @endif">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Expense
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('expenses.index') }}" class="nav-link @if(request()->routeIs('expenses*')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Expense</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
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
