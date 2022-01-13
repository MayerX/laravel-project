<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset("vendor/nucleo/css/nucleo.css") }}">
    <link rel="stylesheet" href="{{ asset("vendor/@fortawesome/fontawesome-free/css/all.min.css") }}">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset("css/argon.min.css") }}">
    @yield('link')
</head>
<body>
    <header>@yield('header')</header>
    @yield('content')
    <footer>@yield('footer')</footer>

    <!-- Core -->
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('js/argon.min.js') }}"></script>
    @yield('script')
</body>
</html>
