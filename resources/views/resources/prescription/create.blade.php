@extends('layouts.doctor')

@section('content')
    <div class="p-4 mx-4 my-4 bg-white rounded-md shadow-lg">
        <div class="container p-4 mx-auto">
            <div class="flex mb-4 justify-between">
                <div>
                    <a href="{{ url('doctor/prescription/'.session()->get('patient_id')) }}"
                       class="inline-block px-6 py-2.5 mx-2
                                    justify-center text-center
                                    bg-blue-600 text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-blue-700
                                    hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                    active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        返回
                    </a>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">添加康复运动处方</h2>
                </div>
                <div></div>
            </div>
            <div>
                <form class="grid grid-cols-6 gap-4 col-span-full" action="{{ url('doctor/prescription/create') }}"
                      method="post">
                    @csrf
                    @for($index = 0; $index < count($actions); $index += 1)
                        <div class="relative col-span-full">
                            <input class="hidden group peer" type="checkbox" name="value_{{ $index }}"
                                   value="1" id="value_{{ $index }}"/>
                            <label
                                class="text-center block p-4 text-sm font-medium transition-colors border border-gray-100 rounded-lg shadow-sm cursor-pointer peer-checked:border-blue-600 hover:bg-gray-50 peer-checked:ring-1 peer-checked:ring-blue-600"
                                for="value_{{ $index }}">
                                <span> {{ $actions[$index] }} </span>
                                <span class="text-sm ml-8">每天次数：</span>
                                <input id="day" type="text" name="day_{{ $index }}"
                                       class="w-1/12 h-6 text-center rounded-md" autocomplete="off"
                                       onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')">
                                <span class="text-sm ml-4">每次组数：</span>
                                <input id="number" type="text" name="group_{{ $index }}"
                                       class="w-1/12 h-6 text-center rounded-md" autocomplete="off"
                                       onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')">
                                <span class="text-sm ml-4">每组10遍</span>
                            </label>
                            <svg class="absolute w-6 h-6 text-blue-600 opacity-0 top-4 right-4 peer-checked:opacity-100"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    @endfor
                    <div class="flex flex-row-reverse col-span-full">
                        <button type="submit"
                                class="inline-block px-6 py-2.5 mx-2
                                    justify-center text-center
                                    bg-red-600 text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-red-700
                                    hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0
                                    active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                            提交
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
