<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <b>Version</b> 3.2.0
            </div>

            <strong>CopyRight  2024</strong>
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

