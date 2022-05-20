@extends('layouts.doctor')

@section('content')
    <div class="p-4 mx-4 my-4 bg-white rounded-md shadow-lg">
        <form novalidate="" action=""
              class="container flex flex-col mx-auto space-y-12 ng-untouched ng-pristine ng-valid">
            <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm">
                <div class="space-y-2 col-span-full lg:col-span-1">
                    <p class="font-medium">基本信息</p>
                </div>
                <div class="grid grid-cols-6 gap-4 col-span-full">
                    <div class="col-span-full">
                        <label for="firstname" class="text-sm">ID</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-2">
                        <label for="lastname" class="text-sm">用户名</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-2">
                        <label for="email" class="text-sm">全名</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="text-sm">用户类型</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="text-sm">性别</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="text-sm">民族</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="text-sm">婚姻</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="text-sm">籍贯</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="text-sm">出生时间</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="text-sm">年龄</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-full">
                        <label for="address" class="text-sm">地址</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="text-sm">所属医院</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="text-sm">所属科室</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="text-sm">所属社区</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-3">
                        <label for="address" class="text-sm">邮箱</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-3">
                        <label for="address" class="text-sm">手机</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-3">
                        <label for="address" class="text-sm">登记日期</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                    <div class="col-span-3">
                        <label for="address" class="text-sm">最近登陆</label>
                        <p id="firstname" type="text" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">123</p>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
