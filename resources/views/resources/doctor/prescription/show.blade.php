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
                        <input type="text" id="datepickerStart" name="startTime" autocomplete="off"
                               class="block mx-2 px-2 py-1.5 text-sm bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="开始时间"/>
                    </div>
                    <div class="datepicker relative form-floating text-sm" data-mdb-toggle-button="false">
                        <input type="text" id="datepickerEnd" name="endTime" autocomplete="off"
                               class="block mx-2 px-2 py-1.5 text-sm bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="结束时间"/>
                    </div>
                    <button type="submit"
                            class="inline-block px-6 py-1.5 mx-2
                                    justify-center text-center
                                    bg-blue-600 text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-blue-700
                                    hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                    active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        选定
                    </button>
                </form>
                <div>
                    <a
                        href="{{ url('doctor/prescription/create') }}"
                        class="inline-block px-6 py-2.5
                                    justify-center text-center
                                    bg-blue-600 text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-blue-700
                                    hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                    active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        增加
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
                    @foreach($prescriptions as $key => $prescription)
                        <tr class="border-b border-opacity-20 text-center">
                            <td class="p-6">
                                <p>
                                    {{ 5 * ($prescriptions->currentPage() - 1) + $key + 1 }}
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
                                <button
                                    onclick="destroy('{{ $prescription->userId }}/{{ $prescription->time }}')"
                                    class="inline-block px-6 py-2.5
                                    justify-center text-center
                                    bg-red-600 text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-red-700
                                    hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0
                                    active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                    删除
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                {{ $prescriptions->links() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            let pickerStart = $("#datepickerStart");
            let pickerEnd = $("#datepickerEnd");

            pickerStart.datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
            })

            pickerEnd.datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
            })
        });

        function destroy(param) {
            $.ajax({
                type: 'GET',
                url: param,
                success: function (msg) {
                    console.log(msg);
                    console.log(param);
                    alert('成功删除');
                    window.location.href = "{{ url('doctor/prescription/'.$prescription->userId) }}"
                },
                error: function () {
                    alert('删除失败，请重新尝试');
                    console.log('无法删除，请重新删除');
                }
            })
        }
    </script>
@endsection
