<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     {{-- If runing with ngrok --}}
     <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
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
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- flag-icon-css -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    {{-- summernote --}}
    <link rel="stylesheet" href="{{ asset('asset/plugins/summernote/summernote-bs4.min.css') }}">

    {{-- ace --}}
    <link rel="stylesheet" href="{{ asset('asset/dist/css/ace.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/daterangepicker/daterangepicker.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('asset/dist/css/customace.css') }}"> --}}

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css"> --}}


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="{{ asset('asset/plugins/sweetalert2/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css"
        type="text/css" media="screen" />





    @stack('css')
    @stack('page-styles')

</head>
