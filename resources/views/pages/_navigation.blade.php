@extends('layouts.app')

<div class="px-12 py-5 mx-auto ">
    <div class="relative flex items-center grid-cols-2">
        <ul class="flex items-center space-x-5">
            <li>
                <a href="{{ url('index') }}"
                   class="font-medium text-gray-600 transition-colors duration-200 hover:text-slate-700">关于中风</a>
            </li>
            <li>
                <a href="{{ url('about') }}"
                   class="font-medium text-gray-600 transition-colors duration-200 hover:text-slate-700">关于我们</a>
            </li>
            <li>
                <a href="{{ url('ProductsandServices') }}"
                   class="font-medium text-gray-600 transition-colors duration-200 hover:text-slate-700">产品及服务</a>
            </li>
            <li>
                <a href="/"
                   class="font-medium text-gray-700 transition-colors duration-200 hover:text-slate-700">联系我们</a>
            </li>
        </ul>
        <a href="{{ url('index') }}" class="inline-flex items-center lg:mx-auto">
            <svg class="w-8 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2"
                 stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
                <rect x="3" y="1" width="7" height="12"></rect>
                <rect x="3" y="17" width="7" height="6"></rect>
                <rect x="14" y="1" width="7" height="6"></rect>
                <rect x="14" y="11" width="7" height="12"></rect>
            </svg>
            <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">怡家健康网</span>
        </a>
        <ul class="flex items-center hidden ml-auto space-x-4 lg:flex">
            @guest
                <li>
                    <a href="{{ url('login') }}"
                       class="inline-flex items-center justify-center
                        h-12 px-6 font-medium tracking-wide text-white transition
                         duration-200 rounded shadow-md bg-slate-600
                         hover:bg-slate-700 focus:shadow-outline focus:outline-none">
{{--                       class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-slate-700">--}}
                        登录
                    </a>
                </li>
                <li>
                    <a href="/"
                       class="inline-flex items-center justify-center
                        h-12 px-6 font-medium tracking-wide text-white transition
                         duration-200 rounded shadow-md bg-slate-600
                         hover:bg-slate-700 focus:shadow-outline focus:outline-none">
                        注册
                    </a>
                </li>
            @else
                <li>
                    <a  href="
                        @if(session()->get('type') == '2')
                            {{ url('doctor') }}
                        @elseif(session()->get('type') == '4')
                            {{ url('patient') }}
                        @endif
                        "
                        class="inline-flex items-center justify-center
                        h-12 px-6 font-medium tracking-wide text-white transition
                         duration-200 rounded shadow-md bg-blue-600">
                        @if($user != null)
                            {{ $user['name'] }}
{{--                            {{ session()->get('type') }}--}}
                        @else
                            空
                        @endif
                    </a>
                </li>
                <li>
                    <button id="logout" onclick="logout()"
                        class="inline-flex items-center justify-center
                        h-12 px-6 font-medium tracking-wide text-white transition
                        duration-200 rounded shadow-md bg-slate-600
                        hover:bg-slate-700 focus:shadow-outline focus:outline-none">
                        登出
                    </button>
                </li>
            @endguest
        </ul>
    </div>
</div>

<script>
    function logout(){
        let $logout = $('#logout');
        $.ajax({
            type: 'get',
            url: '{{ url('login/logout') }}',
            data: {},
            success: function () {
                window.location.href = "{{ url('index') }}";
            },
            error: function () {
                alert('账号退出失败，请重新尝试');
            }
        })
    }
</script>
