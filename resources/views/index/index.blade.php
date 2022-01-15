<style>
    body {
        background-color: rgb(96, 165, 250);
    }
</style>

@extends('common.app')

@section('title', '首页')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="my-10 mx-32 rounded-md bg-white">
        {{-- 首页视频 --}}
        <div class="">
            <video src="{{ asset('video/home.mp4') }}" autoplay loop class="mx-auto">
                您的浏览器不支持 video 标签
            </video>
        </div>
        {{-- 导航栏 --}}
        @include('common.navigation')
        {{-- 搜索 --}}
        1
    </div>
@endsection
