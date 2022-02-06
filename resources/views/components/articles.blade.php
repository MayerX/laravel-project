<div class="bg-white max-w-2xl shadow overflow-hidden mb-4">
    <div class="px-4 py-5">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
{{--            脑中卒常识--}}
            {{ $title->name }}
        </h3>
    </div>
    <div class="border-t border-gray-200 ">
        @foreach($list as $article)
            <dl>
                <div class="bg-gray-50 px-4 py-5 grid grid-flow-col gap-y-10">
                    <dd class="text-sm font-medium text-gray-600 hover:text-gray-700 text-center mt-1">
                        {{--                    <a href="#">得了脑血管病可以活多少年？</a>--}}
                        <a href="#">{{ $article->title }}</a>
{{--                    </dd>--}}
                    <dd class="mt-1 text-sm text-gray-900 text-right">{{ $article->posted }}</dd>
                </div>
            </dl>
        @endforeach
    </div>
    <div class="p-4 w-full md:w-1/2 mx-auto">
        <button type="button"
            class="py-2 px-4  bg-slate-600 hover:bg-slate-700 focus:ring-slate-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
            View all
        </button>
    </div>
</div>
