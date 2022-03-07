@extends('layouts.app')

@section('title', '所有文章')

@section('content')
    {{-- 首页视频 --}}
    @include('common._video')
    {{-- 导航栏 --}}
    @include('pages._navigation')

    <div class="px-4 py-8 mx-auto max-w-full">
        @foreach($articles as $article)
            <div class="mb-10 border-t border-b divide-y">
                <div class="grid py-8 grid-cols-4">
                    <div class="mb-4">
                        <div class="space-y-1 text-xs font-semibold tracking-wide uppercase">
                            <a href="/"
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
