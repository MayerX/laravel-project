@extends('layouts.app')

@section('title', '会员注册')

@section('content')
    @include('common._video')
    @include('pages._navigation')

    <div class="container px-5 py-2 mx-auto">
        <div class="flex flex-wrap px-12 text-center">
            <h2 class="text-2xl title-font font-medium text-white mt-4 mb-4 bg-blue-200 w-full text-left">
                会员注册
            </h2>
            <div class="divide-y-2 divide-gray-200">
                <div class="mb-10 px-4 mx-auto">
                    <button class="mb-8 flex mx-auto mt-6 text-white bg-blue-500 border-0 py-2 px-5 focus:outline-none hover:bg-blue-700 rounded">
                        注册医生账号
                    </button>
                    <p class="leading-relaxed text-base">
                        我的职业是一名医生，我想加入<b>怡家康复网</b>的大家庭，并且同意<b>怡家康复网</b>的所有协议
                    </p>
                </div>
                <div class="mb-10 px-4 mx-auto">
                    <button class="mb-8 flex mx-auto mt-6 text-white bg-blue-500 border-0 py-2 px-5 focus:outline-none hover:bg-blue-700 rounded">
                        注册病人账号
                    </button>
                    <p class="leading-relaxed text-base">
                        我是一位渴望康复的患者，我想加入<b>怡家康复网</b>的大家庭，并且同意<b>怡家康复网</b>的所有协议
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('common._footer')
@endsection
