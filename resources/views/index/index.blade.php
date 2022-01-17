
@extends('common.app')

@section('title', '首页')

@section('link')
    {{-- <link rel="stylesheet" href="{{ asset('css/index.css') }}"> --}}
@endsection

@section('content')
    {{-- 首页视频 --}}
    <div class="w-full ">
        <video src="{{ asset('video/home.mp4') }}" autoplay loop class="w-auto mx-auto">
            您的浏览器不支持 video 标签
        </video>
    </div>
    {{-- 导航栏 --}}
    @include('common.navigation')
    {{-- 搜索 --}}
    @include('index.search')
    {{-- 介绍 --}}
    <div class="mt-4">
        <x-intro></x-intro>
    </div>
    {{-- 标题 --}}
    <div class="flex mx-20">
        <div class="w-1/2 mr-4">
            <x-articles></x-articles>
        </div>
        <div class="w-1/2 mr-4">
            <x-articles></x-articles>
        </div>
    </div>
    {{-- 介绍 --}}
    <div class="mt-4">
        <x-intro></x-intro>
    </div>
    {{-- 标题 --}}
    <div class="flex mx-20">
        <div class="w-1/2 mr-4">
            <x-articles></x-articles>
        </div>
        <div class="w-1/2 mr-4">
            <x-articles></x-articles>
        </div>
    </div>
    {{-- 介绍 --}}
    <div class="mt-4">
        <x-intro></x-intro>
    </div>
    {{-- 标题 --}}
    <div class="flex mx-20">
        <div class="w-1/2 mr-4">
            <x-articles></x-articles>
        </div>
        <div class="w-1/2 mr-4">
            <x-articles></x-articles>
        </div>
    </div>
@endsection

@section('footer')
    @include('common.footer')
@endsection