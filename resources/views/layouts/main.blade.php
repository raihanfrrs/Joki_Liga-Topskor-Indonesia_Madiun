<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="PSSI : TOP LIGA SKOR">
	<meta property="og:title" content="PSSI : TOP LIGA SKOR">
	<meta property="og:description" content="PSSI : TOP LIGA SKOR">
	<meta name="format-detection" content="telephone=no">
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Liga Topskor Indonesia
        @if (count(Request::segments()) == 0)
            - Dashboard
        @else 
            -  {{ isset($subtitle) ? $subtitle : Str::ucfirst(request()->segment(count(request()->segments()))) }}
        @endif
    </title>
	
    <!-- FAVICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('/') }}images/logo-pssi-mini.png">
	
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}vendor/sweetalert2/dist/sweetalert2.min.css">
    @auth
    <link rel="stylesheet" href="{{ asset('/') }}vendor/jquery-nice-select/css/nice-select.css">
	<link rel="stylesheet" href="{{ asset('/') }}vendor/nouislider/nouislider.min.css">
	<link rel="stylesheet" href="{{ asset('/') }}vendor/datatables/css/jquery.dataTables.min.css">
    @endauth

	<!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}css/style.css">
	
    <!-- VENDOR SCRIPT -->
    <script src="{{ asset('/') }}vendor/sweetalert2/dist/sweetalert2.min.js"></script>
</head>

<body @guest class="vh-100" @endguest>
    @include('partials.flasher')

    @auth
    <div id="main-wrapper">
        @include('partials.logo')

        @include('partials.navbar')

        @include('partials.sidebar')

        <div class="content-body">
            <div class="container-fluid">
                @if (count(Request::segments()) != 0)
                    @include('partials.breadcrumb-title')
                @endif

                @yield('section')
            </div>
        </div>

        @include('partials.footer')
    </div>
    @else
        @yield('guest-section')
    @endauth

    <!-- VENDOR SCRIPTS -->
    @auth
    <script src="{{ asset('/') }}vendor/global/global.min.js"></script>
	<script src="{{ asset('/') }}vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="{{ asset('/') }}js/plugins-init/datatables.init.js"></script>
    <script src="{{ asset('/') }}vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('/') }}js/datatables.js"></script>

        @if (auth()->user()->level === 'admin')
        <script src="{{ asset('/') }}js/dashboard/admin.js"></script>
        @elseif (auth()->user()->level === 'user')
        <script src="{{ asset('/') }}js/dashboard/user.js"></script>
        @endif
    @endauth

    <!-- MAIN SCRIPTS -->
    <script src="{{ asset('/') }}js/custom.min.js"></script>
	<script src="{{ asset('/') }}js/dlabnav-init.js"></script>
</body>
</html>