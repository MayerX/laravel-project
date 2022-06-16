<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
{{--    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>--}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/manifest.js') }}" defer></script>
    <script src="{{ asset('js/vendor.js') }}" defer></script>
{{--    <script src="//unpkg.com/alpinejs" defer></script>--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">--}}
    @yield('link')
</head>

<style>
    body {
        /*background-color: rgb(72, 160, 220);*/
        background-color: dodgerblue;
    }

    p {
        text-indent: 2em
    }
</style>

<body>
    <header>@yield('header')</header>
    <div class="mb-6 max-w-screen-lg mx-auto rounded-md bg-white ">
        @yield('content')
    </div>

{{--    @yield('content_outside')--}}

    <footer>
        <div class="mx-auto max-w-screen-lg rounded-md bg-white">
            @yield('footer')
        </div>
    </footer>

    @yield('script')
</body>

<script>
    setTimeout(() => window.scrollTo(0,0), 150)
</script>

</html>
