@extends('layouts.app')

@section('title', '登陆')

<div class="max-w-screen-xl px-4 py-16 mx-auto">
    <div class="max-w-lg mx-auto bg-white rounded-lg shadow-2xl object-center my-10">
        <h1 class="text-2xl font-bold text-center text-indigo-600 pt-6">登陆</h1>

        <form id="login" class="p-8 mt-6 mb-0 space-y-4 rounded-lg shadow-2xl" action="{{ url('login') }}" method="post"
              x-data="showPassword()">
            @csrf
            <div>
                <label for="account" class="text-sm font-medium">账号</label>

                <div class="relative mt-1">
                    <input
                        name="username"
                        type="text"
                        id="username"
                        class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"
                        placeholder="请输入账号"
                    />
                    <span class="absolute inset-y-0 inline-flex items-center right-4"></span>
                </div>

                <p id="accountRemind" class="text-sm text-red-500 text-right my-2 hidden">账号不能为空</p>
            </div>

            <div>
                <label for="password" class="text-sm font-medium">密码</label>

                <div class="relative mt-1">
                    <input
                        name="password"
                        type="password"
                        id="password"
                        class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"
                        placeholder="请输入密码"
                        x-bind:type="changePasswordType()"
                    />

                    <span class="absolute inset-y-0 inline-flex items-center right-4" @click="changePassword()">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 text-gray-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                          <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                          />
                          <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                          />
                        </svg>
                    </span>
                </div>

                <p id="passwordRemind" class="text-sm text-red-500 text-right my-2 hidden">密码不能为空</p>
            </div>

            <button type="submit" @click=""
                    class="block w-full px-5 py-3 text-sm font-medium text-white bg-indigo-600 rounded-lg">
                登陆
            </button>

            <p class="text-sm text-center text-gray-500">
                没有账号？
                <a class="underline" href="{{ url('register') }}">请注册</a>
            </p>
        </form>
    </div>
</div>

@section('script')
    <script>

        let username = $('#username');
        let usernameRemind = $('#usernameRemind');
        let password = $('#password');
        let passwordRemind = $('#passwordRemind');

        function showPassword() {
            return {
                isPassword: false,
                show_text() {

                },
                // 显示密码
                changePassword() {
                    this.isPassword = this.isPassword === false;
                },
                changePasswordType() {
                    if (this.isPassword === true) {
                        return 'text';
                    }
                    else return 'password';
                },
            }
        }

        function submitForm() {
            if (username.val() === '' || password.val() === '') {
                alert('账号或者密码不能为空');
            }
            else {
                $.ajax({
                    type: 'POST',
                    url: '{{ url('login') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "username": username.val(),
                        "password": password.val(),
                    },
                    success: function (msg) {
                        // alert(msg);
                        console.log('success');
                        console.log(msg);
                        // alert(username.val());
                        // alert(password.val());
                        {{--window.location.href = "{{ url('index') }}";--}}
                    },
                    error: function (msg) {
                        // alert('error' + msg);
                        console.log('error');
                        console.log(msg);
                    }
                })
            }
        }

        $(function () {
            username.blur(function () {
                if (username.val() === '') {
                    username.addClass('border-red-500');
                    usernameRemind.removeClass('hidden');
                }
                else {
                    username.removeClass('border-red-500');
                    usernameRemind.addClass('hidden');
                }
            })

            password.blur(function () {
                if (password.val() === '') {
                    password.addClass("border-red-500");
                    passwordRemind.removeClass('hidden');
                }
                else {
                    password.removeClass('border-red-500');
                    passwordRemind.addClass('hidden');
                }
            })
        })
    </script>
@endsection
