<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>医生</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{--    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>--}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/manifest.js') }}" defer></script>
    <script src="{{ asset('js/vendor.js') }}" defer></script>
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.niceScroll.js') }}"></script>
    @yield('link')
</head>

<body>
<header>@yield('header')</header>

<div class="flex w-full text-gray-700 bg-gray-100 overflow-y-auto overflow-x-auto">
    <div class="flex flex-col w-64 h-screen px-4 py-8 bg-white border-r">
        <h2 class="text-center text-2xl font-semibold text-gray-800">{{ session()->get('user')['name'] }}医生</h2>
        <h2 class="mt-5 text-center">
            @if(session()->has('patient_name'))
                <span class="text-lg text-blue-600">{{ session()->get('patient_name') }}患者</span>
            @endif
        </h2>
        <div class="flex flex-col justify-between flex-1 mt-6">
            @if(!session()->has('show_status'))
                <nav>
                    <a class="flex items-center px-4 py-2 rounded-md {{ Request::is('doctor') ?  'text-gray-700 bg-gray-200' : 'text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700'}}"
                       href="{{ url('doctor/') }}">
                        <span class="mx-4 font-medium">基本信息</span>
                    </a>

                    <a class="flex items-center px-4 py-2 mt-5 rounded-md {{ Request::is('doctor/patients') ?  'text-gray-700 bg-gray-200' : 'text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700'}}"
                       href="{{ url('doctor/patients') }}">
                        <span class="mx-4 font-medium">病人管理</span>
                    </a>
                    <a class="flex items-center px-4 py-2 mt-5 rounded-md {{ Request::is('doctor/report/index') ?  'text-gray-700 bg-gray-200' : 'text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700'}}"
                       href="{{ url('doctor/report/index') }}">
                        <span class="mx-4 font-medium">生成报告</span>
                    </a>
                    <a class="flex items-center px-4 py-2 mt-5 rounded-md text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700"
                       href="/">
                        <span class="mx-4 font-medium">信息反馈</span>
                    </a>
                </nav>
            @else
                <nav>

                    <a class="flex items-center px-4 py-2 rounded-md {{ Request::is('doctor/patients/'.session()->get('patient_id')) ?  'text-gray-700 bg-gray-200' : 'text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700'}}"
                       href="{{ url('doctor/patients/'.session()->get('patient_id')) }}">
                        <span class="mx-4 font-medium">基本信息</span>
                    </a>

                    <a class="flex items-center px-4 py-2 mt-5 rounded-md {{ Request::is('doctor/prescription/'.session()->get('patient_id')) ?  'text-gray-700 bg-gray-200' : 'text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700'}}"
                       href="{{ url('doctor/prescription/'.session()->get('patient_id')) }}">
                        <span class="mx-4 font-medium">康复处方</span>
                    </a>

                    <a class="flex items-center px-4 py-2 mt-5 rounded-md {{ Request::is('doctor/guide/'.session()->get('patient_id')) ?  'text-gray-700 bg-gray-200' : 'text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700'}}"
                       href="{{ url('doctor/guide/'.session()->get('patient_id')) }}">
                        <span class="mx-4 font-medium">视频指导</span>
                    </a>

                    <a class="flex items-center px-4 py-2 mt-5 rounded-md {{ Request::is('doctor/rehab/'.session()->get('patient_id')) ?  'text-gray-700 bg-gray-200' : 'text-gray-600 transition-colors duration-200 transform  hover:bg-gray-200 hover:text-gray-700'}}"
                       href="{{ url('doctor/rehab/'.session()->get('patient_id')) }}">
                        <span class="mx-4 font-medium">康复数据</span>
                    </a>
                </nav>
            @endif
        </div>
        @if(!session()->has('show_status'))
            <button id="logout" onclick="logout()" type="button"
                    data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                    class="inline-block px-6 mt-5 py-2.5 justify-center bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            >
                退出
            </button>
        @else
            <button id="return" onclick="returnDoctor()" type="button"
                    data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                    class="inline-block px-6 mt-5 py-2.5 justify-center bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            >
                退出病人信息
            </button>
        @endif
        <a href="{{ url('index') }}" onclick="returnIndex()"
           data-mdb-ripple="true"
           data-mdb-ripple-color="light"
           class="inline-block px-6 mt-5 py-2.5 justify-center text-center bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
        >
            返回首页
        </a>
    </div>

    <div class="flex flex-col flex-grow flex-1">
        @yield('content')
    </div>
</div>

{{--<footer>--}}
{{--    <div class="mx-auto max-w-screen-lg rounded-md bg-white mt-3">--}}
{{--        @include('common._footer')--}}
{{--    </div>--}}
{{--</footer>--}}
@yield('script')
<script>
    function logout() {
        let $logout = $('#logout');
        $.ajax({
            type: 'get',
            url: '{{ url('login/logout') }}',
            data: {},
            success: function () {
                window.location.href = "{{ url('index') }}";
            },
            error: function () {
                alert('返回失败，请刷新尝试');
            }
        })
    }

    function returnDoctor() {
        $.ajax({
            type: 'get',
            url: '{{ url('doctor/patients/return') }}',
            data: {},
            success: function () {
                window.location.href = "{{ url('doctor/patients') }}";
            },
            error: function () {
                alert('账号退出失败，请刷新尝试');
            }
        })
    }

    function returnIndex() {
        $.ajax({
            type: 'get',
            url: '{{ url('doctor/patients/return') }}',
            data: {},
            success: function () {

            },
            error: function () {
                alert('账号退出失败，请刷新尝试');
            }
        })
    }
</script>
</body>

</html>
