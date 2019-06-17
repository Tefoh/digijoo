<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('/admin-lte/includes/mdb/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-lte/includes/mdb/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/material-desing-icons/material-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-lte/includes/css/customize.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-lte/includes/css/themes.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-lte/includes/css/style.css') }}">
</head>
<body class="brown-theme">
<!--- Navbar ----->
    @include('partials.admin.top-nav')

    @include('partials.admin.sidebar')

    <!---- Container ----->
    <section class="main-container">
        @yield('content')
    </section>

    <script type="text/javascript" src="{{ asset('/admin-lte/includes/js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/admin-lte/includes/mdb/js/tether.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/admin-lte/includes/mdb/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/admin-lte/includes/mdb/js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/admin-lte/includes/js/admin.js') }}"></script>
    <script src="{{ asset('/admin-lte/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('/admin-lte/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('/admin-lte/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('/admin-lte/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('/admin-lte/plugins/flot-charts/jquery.flot.time.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/admin-lte/includes/js/index.js') }}"></script>
    @yield('extra-js')
</body>
</html>
