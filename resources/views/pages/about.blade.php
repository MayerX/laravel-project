@extends('layouts.app')

@section('title', '关于我们')

@section('link')
@endsection

@section('content')
    @include('common._video')
    @include('pages._navigation')

    <div class="container px-5 py-2 mx-auto">
        <div class="flex flex-wrap">
            <div class="px-12 flex flex-col items-start">
                <h2 class="text-2xl title-font font-medium text-white mt-4 mb-4 bg-blue-200 w-full">
                    关于我们
                </h2>
                <p class="leading-relaxed mb-8">
                    <b class="text-blue-800">怡家康复网</b>成立于2010年，是我国最大的专业脑卒中康复训练服务网站。怡家康复网提供独到的能和康复医师双向互动的远程康复训练和评估服务，从而使广大脑卒中患者可以便利的在家庭或社区实现受损肢体的康复。
                </p>
                <p class="leading-relaxed mb-8">
                    <b class="text-blue-800">怡家康复网</b>以外商独资企业恒怡科技作为强大的技术支持，和浙江省最大的康复中心嘉兴第二医院康复中心紧密合作，通过对互联网，物联网，电子芯片以及智能传感技术的有机整合，为我国日益增多的脑卒中患者提供了一个个性化的，随时化的，有效的，现代康复服务
                </p>
                <p class="leading-relaxed mb-8">
                    如果您或您的亲人是中风患者，为了早日恢复功能，实现生活自理，请加入怡家康复网这个大家庭！
                </p>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('common._footer')
@endsection
