<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.head')
<body class="sidebar-mini layout-fixed layout-navbar-fixed text-sm">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.partials.header')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('layouts.partials.sidebar')
        <div class="content-wrapper">

            <section class="content-header">
                @yield('breadcrumb')
              </section>
            <section class="content">
                @yield('content')
            </section>

        </div>

        <footer class="main-footer text-center">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>

            <strong>Copyright &copy; {{ date('Y') }}</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('layouts.partials.script')
</body>
</html>

