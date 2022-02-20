<div class="h-40 bg-gray-100 bg-opacity-50 flex items-center shadow mx-12 my-4 rounded">
    <div class="inline-flex ml-4">
        <div class="flex items-center p-5 space-x-2 bg-white rounded-xl shadow-lg">
            <div class="flex bg-gray-100 p-4 w-60 space-x-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-30" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input class="bg-gray-100 outline-none" type="text" placeholder="文章" />
            </div>
            <div
                class="bg-slate-600 py-4 px-5 w-20 text-center text-white font-semibold rounded-lg hover:shadow-lg transition duration-3000 cursor-pointer hover:bg-slate-700">
                <span class="">搜索</span>
            </div>
        </div>
    </div>
    <div class="inline-flex mx-auto">
        <div class="grid gap-y-5 gap-x-2 grid-flow-row text-center grid-rows-2 grid-cols-3">
            @for ($index = 0; $index < 6; $index++)
                <div>
                    <span class="pl-3 py-2 text-base rounded-full text-slate-700 hover:text-slate-500">
                        <i class="fas fa-tag"></i>
                        <a href="#" class="text-sm break-words">{{ $categories[$index]->name }}</a>
                    </span>
                </div>
            @endfor
        </div>
    </div>
</div>
