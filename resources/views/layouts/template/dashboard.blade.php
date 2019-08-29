<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link href="{{ asset('fonts/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    @stack('extra-css')

    <style>
        .app-content {
            background-color: #fff !important;
        }
    </style>

</head>
<body class="app sidebar-mini rtl pace-done">

    @include('layouts.template.navbar')
    @include('layouts.template.menu')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>
                    <i class="icon fa fa-table"></i>
                    @yield('page')
                </h1>
                <p>
                    @yield('description')
                </p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">
                    <i class="fa fa-home fa-lg"></i>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">
                        @yield('page')
                    </a>
                </li>
            </ul>
        </div>
        @yield('content')
    </main>

    <script src="{{asset("js/jquery-3.3.1.js")}}"></script>
    <script src="{{asset("js/popper.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/main.js")}}"></script>
    <script src="{{asset("js/plugins/pace.min.js")}}"></script>

    @stack('extra-script')

</body>
</html>
