@extends('layouts.doctor')

@section('content')
    <div class="p-4 mx-4 my-4 bg-white rounded-md shadow-lg">
        <div class="container p-4 mx-auto">
            <div class="flex mb-4 justify-between">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">康复处方</h2>
                </div>
                <form class="flex" method="get" action="{{ url('doctor/prescription/'.session()->get('patient_id')) }}">
                    @csrf
                    <div class="datepicker relative form-floating text-sm" data-mdb-toggle-button="false">
                        <input type="text" name="startTime"
                               class="block mx-2 px-2 py-1.5 text-sm bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="开始时间"
                               data-mdb-toggle="datepicker"/>
                    </div>
                    <div class="datepicker relative form-floating text-sm" data-mdb-toggle-button="false">
                        <input type="text" name="endTime"
                               class="block mx-2 px-2 py-1.5 text-sm bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="结束时间"
                               data-mdb-toggle="datepicker"/>
                    </div>
                    <button type="submit"
                        class="inline-block mx-2 px-4 py-1.5 text-sm font-medium text-indigo-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white active:bg-blue-600 focus:outline-none focus:ring">
                        选定
                    </button>
                </form>
                {{--                <div>--}}
                {{--                    <a href="{{ url('doctor/prescription/index') }}">--}}
                {{--                        <button class="inline-block mx-2 px-4 py-1.5 text-sm font-medium text-indigo-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white active:bg-blue-600 focus:outline-none focus:ring">--}}
                {{--                           返回--}}
                {{--                        </button>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
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
                    @foreach($prescriptions as $key => $prescription)
                        <tr class="border-b border-opacity-20 text-center">
                            <td class="p-6">
                                <p>
                                    {{ $key + 1 }}
                                </p>
                            </td>
                            <td class="p-6">
                                <p>
                                    {{ $prescription->name }}
                                </p>
                            </td>
                            <td class="p-6">
                                <p>
                                    {!! nl2br($prescription->comment) !!}
                                </p>
                            </td>
                            <td class="p-6">
                                <p>
                                    {{ $prescription->time }}
                                </p>
                            </td>
                            <td class="p-6">
                                <a
                                    href="{{ url('doctor/patients/'.$prescription->userId) }}"
                                    class="inline-block px-6 py-2.5
                                    justify-center text-center
                                    bg-red-600 text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-red-700
                                    hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0
                                    active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                    删除
                                </a>
                            </td>
                        </tr>
                    @endforeach
{{--                    <tr class="border-b border-opacity-20 text-center">--}}
{{--                        <td class="p-6">--}}
{{--                            <p>1</p>--}}
{{--                        </td>--}}
{{--                        <td class="p-6">--}}
{{--                            <p>123</p>--}}
{{--                        </td>--}}
{{--                        <td class="p-6">--}}
{{--                            <p>--}}
{{--                                1.Bobath握手训练:每天2次,每次2组,每组10遍<br>--}}
{{--                                5.患手摸肩训练:每天3次,每次2组,每组10遍<br>--}}
{{--                            </p>--}}
{{--                        </td>--}}
{{--                        <td class="p-6">--}}
{{--                            <p>13年12月09日 17:02</p>--}}
{{--                        </td>--}}
{{--                        <td class="p-6">--}}
{{--                            <a href="/" class="hover:text-blue-600">删除</a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $prescriptions->links() }}
            </div>
        </div>
    </div>
@endsection
