<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         {{-- If runing with ngrok --}}
         <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="title" content="@yield('meta_title', $web_config['meta_title'])">
        <meta name="author" content="@yield('author', $web_config['meta_author'])">
        <meta name="keywords" content="@yield('keywords', $web_config['meta_keywords'])">
        <meta name="description" content="@yield('description', $web_config['meta_description'])">
        <meta name="robots" content="index, follow">
        <meta name="image" content="@yield('image', asset('storage/'.$web_config['meta_image'] ?? ''))">

        <link rel="shortcut icon" href="{{ asset('storage/'.$web_config['favicon'] ?? '') }}">
        <link rel="apple-touch-icon" href="{{ asset('storage/'.$web_config['favicon'] ?? '') }}">
        <link rel="favicon" href="{{ asset('storage/'.$web_config['favicon'] ?? '') }}">
        <title>@yield('title')</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('asset') }}/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('asset') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('asset') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('asset') }}/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('asset') }}/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('asset') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('asset') }}/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('asset') }}/plugins/summernote/summernote-bs4.min.css">
        <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}">

        <!-- Main css -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @yield('page-styles')
    </head>
<body>
    <div class="main">
        @yield('content')
    </div>
    @include('layouts.partials.script')

    @yield('page-scripts')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
