@extends('layouts.doctor')

@section('content')
    <div class="p-4 mx-4 my-4 bg-white rounded-md shadow-lg">
        <div class="container p-4 mx-auto">
            <div class="flex mb-4 justify-between">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">沈木根</h2>
                </div>
                <div class="flex">
                    <div class="datepicker relative form-floating text-sm" data-mdb-toggle-button="false">
                        <input type="text"
                               class="block mx-2 px-2 py-1.5 text-sm bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="开始时间" data-mdb-toggle="datepicker"/>
                    </div>
                    <div class="datepicker relative form-floating text-sm" data-mdb-toggle-button="false">
                        <input type="text"
                               class="block mx-2 px-2 py-1.5 text-sm bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="结束时间" data-mdb-toggle="datepicker"/>
                    </div>
                    <button class="inline-block mx-2 px-4 py-1.5 text-sm font-medium text-indigo-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white active:bg-blue-600 focus:outline-none focus:ring">
                        选定
                    </button>
                </div>
                <div>
                    <a href="{{ url('doctor/prescription/index') }}">
                        <button class="inline-block mx-2 px-4 py-1.5 text-sm font-medium text-indigo-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white active:bg-blue-600 focus:outline-none focus:ring">
                           返回
                        </button>
                    </a>
                </div>
            </div>
            <div class="overflow-y-auto">
                <table class="text-xs">
                    <colgroup>
                        <col class="w-20">
                        <col>
                        <col>
                        <col>
                        <col class="w-24">
                    </colgroup>
                    <thead>
                    <tr class="text-center">
                        <th class="p-8 w-1/12 font-bold text-lg">ID</th>
                        <th class="p-8 w-1/12 font-bold text-lg">医生</th>
                        <th class="p-8 w-1/3 font-bold text-lg">康复运动处方</th>
                        <th class="p-8 w-2/12 font-bold text-lg">日期</th>
                        <th class="p-8 w-1/12 font-bold text-lg">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border-b border-opacity-20 text-center">
                        <td class="p-6">
                            <p>1</p>
                        </td>
                        <td class="p-6">
                            <p>123</p>
                        </td>
                        <td class="p-6">
                            <p>
                                1.Bobath握手训练:每天2次,每次2组,每组10遍<br>
                                5.患手摸肩训练:每天3次,每次2组,每组10遍<br>
                            </p>
                        </td>
                        <td class="p-6">
                            <p>13年12月09日 17:02</p>
                        </td>
                        <td class="p-6">
                            <a href="/" class="hover:text-blue-600">删除</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
