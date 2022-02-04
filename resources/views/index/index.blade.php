
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
        <x-intro title="脑卒中"
        message="脑卒中（即脑中风，即脑血管意外疾病），是指由于各种原因导致的脑血管功能障碍，引起相关症状，如脑组织缺血缺
        氧、脑血栓形成等脑血管疾病。常见脑中风大致可分为：缺血性脑中风和出血性脑中风。出血性脑中风包括：脑出血（脑溢血）、蛛
        网膜下腔出血。缺血性脑中风（即脑梗塞）包括脑血栓、闹栓塞脑梗塞、腔隙性脑梗塞和短暂性脑缺血发作。通常表现是猝然昏倒、
        不省人事，常见口眼歪斜、语言不利、半生不遂、肢体麻木等症状。易发脑中风的多为中老年人，脑中风五年内的平均复发率为30%，
        而且复发一次病情加重一次。"
        imageSrc="{{ asset('image/naozhongfeng.jpg') }}" />
    </div>
    {{-- 推荐文章 --}}
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
        <x-intro title="脑卒中后功能评定和康复"
        message="脑卒中康复治疗的目的在于改善功能，功能评定可以帮助医师和治疗师了解患者功能损害情况，作为制定康复目标、
        选择康复方法及评价康复效果的手段。因此，康复功能评定是康复工作的前提，在康复工作中占有十分重要的地位。脑卒中后康复
        的目标是提高肢体的控制能力，恢复步行能力，增强肢体协调性和精细运动，提高和恢复日常生活活动能力，适应应用辅助器具，
        以补偿患肢的功能，重视心理、社会及家庭环境改造，使患者重新返回社会"
        imageSrc="{{ asset('image/kangfuxunlian.jpg') }}" />
    </div>
    {{-- 推荐文章 --}}
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
        <x-intro title="居家远程上肢康复训练系统"
        message="通过使用上肢康复远程训练系统，中风患者可以在家中或社区卫生中心对功能受损的上肢，手指以及手腕进行康复训练，
        免去了频繁上医院做康复的不便以及请康复师上门的费用； 加盟的国内著名康复中心的专家，通过智能软件和实时视频可以远程实
        时的对患者康复训练情况进行观测、评定，并及时提供指导和建议；训练数据和观测视频可以上传至怡家康复网（www.hy-care.com）
        永久保存。以供康复效果分析，并实现患者和医生的互动交流"
        imageSrc="{{ asset('image/yuanchengkangfuxitong.jpg') }}" />
    </div>
    {{-- 推荐文章 --}}
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