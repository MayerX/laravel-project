<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>医生</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/manifest.js') }}" defer></script>
    @yield('link')
</head>

<body>
<header>@yield('header')</header>

<div class="flex w-screen h-screen text-gray-700 bg-gray-100 overflow-y-auto">
    <div class="flex flex-col w-64 h-screen px-4 py-8 bg-white border-r">
        <h2 class="text-2xl font-semibold text-gray-800">医生界面</h2>

        <div class="flex flex-col justify-between flex-1 mt-6">
            <nav>
                <a class="flex items-center px-4 py-2 rounded-md text-gray-700 bg-gray-200"
                   href="{{ url('doctor/') }}">
                    <span class="mx-4 font-medium">基本信息</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 rounded-md text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700"
                   href="{{ url('doctor/patients') }}">
                    <span class="mx-4 font-medium">病人管理</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 rounded-md text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700"
                   href="{{ url('doctor/prescription/index') }}">
                    <span class="mx-4 font-medium">康复处方</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 rounded-md text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700"
                   href="/">
                    <span class="mx-4 font-medium">视频指导</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 rounded-md text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700"
                   href="/">
                    <span class="mx-4 font-medium">生成报告</span>
                </a>

                <a class="flex items-center px-4 py-2 mt-5 rounded-md text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700"
                   href="/">
                    <span class="mx-4 font-medium">信息反馈</span>
                </a>
            </nav>
        </div>
    </div>

    <div class="flex flex-col flex-grow">
        @yield('content')
    </div>
</div>

<footer>
    <div class="mx-auto max-w-screen-lg rounded-md bg-white mt-3">
        @include('common._footer')
    </div>
</footer>
@yield('script')
</body>

</html>
