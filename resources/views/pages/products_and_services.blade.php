@extends('layouts.app')

@section('title', '产品及服务')

@section('link')
@endsection

@section('content')
    @include('common._video')
    @include('pages._navigation')

    <div class="container px-5 py-2 mx-auto">
        <div class="flex flex-wrap">
            <div class="px-12 flex flex-col items-start">
                <h2 class="text-2xl title-font font-medium text-white mt-4 mb-4 bg-blue-200 w-full">
                    产品及服务
                </h2>
                <div class="px-4 mx-auto divide-y-2 divide-gray-200 leading-normal">
                    <div class="grid gap-12 row-gap-8 grid-cols-2">
                        <div class="flex flex-col justify-center">
                            <div class="max-w-xl py-6">
                                <h2 class="max-w-lg mb-6 text-2xl font-bold tracking-tight text-gray-900">
                                    上肢康复远程训练系统
                                </h2>
                                <p class="text-sm text-gray-600 py-1">
                                    通过使用<b class="text-blue-800">上肢康复远程训练系统</b>，中风患者可以在家中或社区卫生中心对功能受损的上肢，手指以及手腕进行康复训练，
                                    免去了频繁上医院做康复的不便以及请康复师上门的费用；
                                </p>
                                <p class="text-sm text-gray-600 py-1">
                                    加盟的国内著名康复中心的专家，通过智能软件和实时视频可以远程实时的对患者康复训练情况进行观测、评定，并及时提供指导和建议；
                                </p>
                                <p class="text-sm text-gray-600 py-1">
                                    训练数据和观测视频可以上传至<b
                                        class="text-blue-800">怡家康复网（www.hy-care.com）</b>永久保存。以供康复效果分析，并实现患者和医生的互动交流。
                                </p>
                            </div>
                        </div>
                        <div>
                            <img class="object-cover w-full h-56 rounded shadow-lg"
                                src="{{ asset('image/shangzhikangfu.png') }}" alt="" />
                        </div>
                    </div>
                    <div class="grid gap-12 row-gap-8 grid-cols-2">
                        <div class="flex flex-col justify-center">
                            <div class="max-w-xl py-6">
                                <h2 class="max-w-lg mb-6 text-2xl font-bold tracking-tight text-gray-900">
                                    生理参数远程监测系统
                                </h2>
                                <p class="text-sm text-gray-600 py-1">
                                    采用<b class="text-blue-800">无线组网技术</b>，对人体重要生理参数进行实时监测，搭建<b class="text-blue-800">智能人体传感网平台</b>；
                                </p>
                                <p class="text-sm text-gray-600 py-1">
                                    生理参数通过3G或互联网传送至医院服务器，实现医生远程观测和诊断；
                                </p>
                                <p class="text-sm text-gray-600 py-1">
                                    对慢性心脏病和高血压患者可能出现的危机状况，提供及时预警。
                                </p>
                            </div>
                        </div>
                        <div>
                            <img class="object-cover w-full h-56 rounded shadow-lg"
                                src="{{ asset('image/shenglicanshujiance.png') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('common._footer')
@endsection
