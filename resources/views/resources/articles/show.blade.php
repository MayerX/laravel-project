@extends('layouts.app')

@section('title', '文章')

@section('link')
    <style>
        p {
            padding-bottom: 0.3rem;
            padding-top: 0.3rem;
        }
    </style>
@endsection

@section('content')
    {{-- 首页视频 --}}
    @include('common._video')
    {{-- 导航栏 --}}
    @include('pages._navigation')

    <div class="flex border-b border-gray-200 justify-around">
        <div>
            <button
                class="h-10 px-4 py-2 -mb-px text-sm text-center text-gray-700 bg-transparent border-b-2 border-transparent whitespace-nowrap cursor-base focus:outline-none hover:border-blue-500">
                <a href="{{ asset('index') }}">返回首页</a>
            </button>
        </div>

        <div>
            <button
                class="h-10 px-4 py-2 -mb-px text-sm text-center text-gray-700 bg-transparent border-b-2 border-transparent whitespace-nowrap cursor-base focus:outline-none hover:border-blue-500">
                <a href="{{ asset('articles/') }}">所有文章</a>
            </button>

            <button
                class="h-10 px-4 py-2 -mb-px text-sm text-center text-gray-700 bg-transparent border-b-2 border-transparent whitespace-nowrap cursor-base focus:outline-none hover:border-blue-500">
                <a href="{{ asset('articles/tag/'. $post->category) }}">{{ $categories[$post->category] }}</a>
            </button>

            <button
                class="h-10 px-4 py-2 -mb-px text-sm text-center text-blue-500 bg-transparent border-b-2 border-blue-500 whitespace-nowrap focus:outline-none">
                <a href="{{ asset('articles/articles/'. $post->postid) }}">{{ $post->title }}</a>
            </button>
        </div>

        <div class="flex">
            <form action="{{ asset('/articles/search') }}">
                <label>
                    <input type="text" name="keyword"
                           class="h-10 w-40 px-4 py-2 -mb-px text-sm text-left text-gray-700 bg-transparent border-b-2 border-transparent whitespace-nowrap cursor-base focus:outline-none hover:border-blue-500"
                           placeholder="搜索"/>
                </label>

                <button
                    class="flex-shrink-0 ml-2 px-4 py-2 text-base font-semibold text-white bg-slate-600 rounded-md shadow-lg hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                    type="submit">
                    搜索
                </button>
            </form>
        </div>
    </div>

    <div class="px-4 py-6 mx-auto max-w-full px-16">
        <div class="mb-6">
            <h2 class="mb-5 font-sans text-3xl font-bold tracking-tight text-gray-900">
                {{ $post->title }}
            </h2>
            <div
                class="inline-flex items-center font-semibold transition-colors duration-200 text-gray-400">
                <div class="text-center px-3.5">
                    时间：{{ $post->posted }}
                </div>
                <div class="text-center px-3.5">
                    作者：{{ $name }}
                </div>
                <div class="text-center px-3.5">
                    点击次数：{{ $post->timesofview }}
                </div>
            </div>
        </div>
        <div class="text-base text-gray-700 leading-normal tracking-wide">
            {!! $post->content !!}
            {{--            <p>--}}
            {{--                有人说得了脑血管病就活不长了，至少不可能长寿。这种说法固然有一定道理，因为迄今为止脑血管病的死亡率高，而且发病后存活者几乎一半的人在3～10年内死亡，但也不绝对认为患了脑血管病一定活不长了。因为脑血管病发生以后再活上20年者也不乏其人，活到70岁或80岁以上者也经常能看到。据国内有人观察结果，脑血管病后活5年者占62％，活6～10年者占20％，活11～15年占15％，活15年甚至20年以上者占3％。值得注意的是，脑血管病以后能活上10年以上者占20％左右。该组脑血管病人的平均寿命为66岁，有40％的脑血管病人寿命为70岁以上，5％为80岁以上，有一例活到88岁。有一女病人在63岁时发生脑血管病，左侧肢体部分瘫痪，但能在室内活动和处理自己的一些生活琐事、由于坚持长期治疗和功能锻炼，发病后已活了24年，至今已经87岁高龄了。一名男性高级工程师，70岁时发生脑血栓形成，左侧肢体瘫痪，经治疗后能依靠拐仗行走，思维智力无大影响，4年后仍能指导研究生和发表论文翻译资料，至今6年多仍能做一些工作，情况良好。为什么脑血管病发生后仅五分之一的病人可以活10年以上呢？这就要看该病人脑血管病的性质和严重程度如何了。譬如出血量大，脑血管梗塞的范围大。神经系统的损害和偏瘫的程度严重，则病人存活的时间短；如在脑血管病发生后的三个月到一年内治疗效果好，恢复程度佳，则后遗症明显减少。病人的寿命就可延长；长期卧床严重偏瘫病人多因合并感染或其他并发症而容易早亡，而轻度偏瘫治疗，注意功能锻炼，多数病人可再活10年甚至20年以上，因此，患中风患者应以积极疗法的态度面对疾病。--}}
            {{--            </p>--}}
            {{--            <p>--}}
            {{--                无论哪种情况的脑血管病患者，预后好坏始终离不开持续可靠的综合治疗对脑血管病患者预后的决定权。只有坚持科学有效的针对病因的康复防治，才有可能使病情重的患者得到最大程度的恢复，能够达到自理回归幸福的生活甚至工作中去；才有可能使病症轻的患者完全康复远离疾病困扰。--}}
            {{--            </p>--}}
            {{--            <p>--}}
            {{--                无论哪种情况的脑血管病患者，预后好坏始终离不开持续可靠的综合治疗对脑血管病患者预后的决定权。只有坚持科学有效的针对病因的康复防治，才有可能使病情重的患者得到最大程度的恢复，能够达到自理回归幸福的生活甚至工作中去；才有可能使病症轻的患者完全康复远离疾病困扰。--}}
            {{--            </p>--}}
        </div>
    </div>
@endsection

@section('footer')
    @include('common._footer')
@endsection
