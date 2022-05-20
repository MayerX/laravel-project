@extends('layouts.doctor')

@section('content')
    <div class="p-4 mx-4 my-4 bg-white rounded-md shadow-lg">
        <div class="container p-4 mx-auto">
            <div class="flex mb-4 justify-between">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">沈木根</h2>
                </div>
                <div>2</div>
                <div>

                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-xs">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col class="w-24">
                    </colgroup>
                    <thead>
                    <tr class="text-center">
                        <th class="p-8 w-3 font-bold text-lg">成员ID</th>
                        <th class="p-8 w-3 font-bold text-lg">姓名</th>
                        <th class="p-8 w-6 font-bold text-lg">用户类型</th>
                        <th class="p-8 w-6 font-bold text-lg">出生日期</th>
                        <th class="p-8 w-6 font-bold text-lg">头像</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border-b border-opacity-20 text-center">
                        <td class="p-6">
                            <p>97412378923</p>
                        </td>
                        <td class="p-6">
                            <a href="{{ url('doctor/prescription/show') }}" class="hover:text-blue-500">Microsoft Corporation</a>
                        </td>
                        <td class="p-6">
                            <p>14 Jan 2022</p>
                        </td>
                        <td class="p-6">
                            <p>01 Feb 2022</p>
                        </td>
                        <td class="p-6">
                            <p>$15,792</p>
                        </td>
                    </tr>
                    <tr class="border-b border-opacity-20 text-center">
                        <td class="p-6">
                            <p>97412378923</p>
                        </td>
                        <td class="p-6">
                            <a href="{{ url('doctor/prescription/show') }}" class="hover:text-blue-500">Microsoft Corporation</a>
                        </td>
                        <td class="p-6">
                            <p>14 Jan 2022</p>
                        </td>
                        <td class="p-6">
                            <p>01 Feb 2022</p>
                        </td>
                        <td class="p-6">
                            <p>$15,792</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
