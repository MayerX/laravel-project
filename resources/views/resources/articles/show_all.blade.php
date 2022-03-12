@extends('layouts.app')

@section('title', '所有文章')

@section('content')
    {{-- 首页视频 --}}
    @include('common._video')
    {{-- 导航栏 --}}
    @include('pages._navigation')

    {{--    <div class="flex border-b border-gray-200 justify-center">--}}
    {{--        <button class="h-10 px-4 py-2 -mb-px text-sm text-center text-blue-500 bg-transparent border-b-2 border-blue-500  whitespace-nowrap focus:outline-none">--}}
    {{--            <a href="{{ asset('articles/') }}">所有文章</a>--}}
    {{--        </button>--}}
    {{--    </div>--}}
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

    <div class="px-4 py-8 mx-auto max-w-full">
        @foreach($articles as $article)
            <div class="mb-10 border-t border-b divide-y">
                <div class="grid py-8 grid-cols-4">
                    <div class="mb-4">
                        <div class="space-y-1 text-xs font-semibold tracking-wide uppercase">
                            <a href="{{ asset('articles/tag/'.$article->category) }}"
                               class="transition-colors duration-200 text-slate-800 hover:text-blue-500"
                               aria-label="Category"><p>{{ $categories[$article->category] }}</p></a>
                            <p class="text-gray-600">{{ $article->posted }}</p>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="text-center">
                            <a href="{{ asset('articles/'. $article->postid) }}" aria-label="Article"
                               class="inline-block text-black transition-colors duration-200 hover:text-blue-500">
                                <p class="text-lg font-extrabold leading-none">
                                    {{ $article->title }}
                                </p>
                            </a>
                        </div>
                        <p class="text-gray-700 text-left truncate pt-2">
                            {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 57, '...') }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $articles->links() }}
@endsection

@section('footer')
    @include('common._footer')
@endsection
