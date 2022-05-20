@extends('layouts.app')

@section('title', '登陆')

<div class="max-w-screen-xl px-4 py-16 mx-auto">
    <div class="max-w-lg mx-auto bg-white rounded-lg shadow-2xl object-center my-10">
        <h1 class="text-2xl font-bold text-center text-indigo-600 pt-6">登陆</h1>

        <form action="" class="p-8 mt-6 mb-0 space-y-4 rounded-lg shadow-2xl" x-data="password()">
            <div>
                <label for="account" class="text-sm font-medium">账号</label>

                <div class="relative mt-1">
                    <input
                        type="text"
                        id="account"
                        class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"
                        placeholder="请输入账号"
                    />

                    <span class="absolute inset-y-0 inline-flex items-center right-4"></span>
                </div>
            </div>

            <div>
                <label for="password" class="text-sm font-medium">密码</label>

                <div class="relative mt-1">
                    <input
                        type="password"
                        id="password"
                        class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"
                        placeholder="请输入密码"
                        x-bind:type="show()"
                    />

                    <span class="absolute inset-y-0 inline-flex items-center right-4" @click="judge()">
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
            </div>

            <button type="submit"
                    class="block w-full px-5 py-3 text-sm font-medium text-white bg-indigo-600 rounded-lg">
                登陆
            </button>

            <p class="text-sm text-center text-gray-500">
                没有账号？
                <a class="underline" href="{{ url('registerh') }}">请注册</a>
            </p>
        </form>
    </div>
</div>

@section('script')

    <script>
        function password() {
            return {
                isShow: false,
                judge() {
                    // if (this.isShow === false) this.isShow = true;
                    // else this.isShow = false;
                    this.isShow = this.isShow === false;
                    console.log(this.isShow);
                },
                show() {
                    if (this.isShow === true) {
                        return 'text';
                    } else return 'password';
                }
            }
        }
    </script>
@endsection
