@extends('layouts.doctor')

@section('content')
    <div class="p-4 mx-4 my-4 bg-white rounded-md shadow-lg">
        <div class="container p-4 mx-auto">
            <div class="flex mb-4 justify-between">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">康复数据</h2>
                </div>
                <form class="flex" method="get" action="{{ url('doctor/rehab/'.session()->get('patient_id')) }}">
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
                    <button type="submit" name="sort"
                            value="@if(session()->has('sort'))
                            {{ session()->get('sort') }}
                            @else
                                asc
                            @endif"
                            class="inline-block px-6 py-1.5 mx-2
                            justify-center text-center
                            bg-blue-600 text-white font-medium text-xs leading-tight
                            uppercase rounded shadow-md hover:bg-blue-700
                            hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                            active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        按动作排序
                    </button>
                </form>
                <div hidden>1</div>
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
                        <th class="p-8 w-1/6 font-bold text-lg">文件类型</th>
                        <th class="p-8 w-1/12 font-bold text-lg">文件上传时间</th>
                        <th class="p-8 w-1/12 font-bold text-lg">数据生成时间</th>
                        <th class="p-8 w-1/6 font-bold text-lg">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blobs as $key => $blob)
                        <tr class="border-b border-opacity-20 text-center">
                            <td class="p-6">
                                <p>
                                    {{ 5 * ($blobs->currentPage() - 1) + $key + 1 }}
                                </p>
                            </td>
                            <td class="p-6">
                                <p>
                                    {{ $types[$blob->MovementType] }}
                                </p>
                            </td>
                            <td class="p-6">
                                <p>
                                    {{ $blob->time }}
                                </p>
                            </td>
                            <td class="p-6">
                                <p>
                                    {{ $blob->SamplingTime }}
                                </p>
                            </td>
                            <td class="p-6 justify-center">
                                <a href="{{ url('doctor/rehab/' . $blob->userId . '/' . $blob->time) }}"
                                   class="inline-block px-6 py-2.5
                                    justify-center text-center
                                    bg-blue-600 text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-blue-700
                                    hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                    active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                    查看
                                </a>
                                <button
                                    onclick="destroy('{{ $blob->userId }}/{{ $blob->time }}/destroy')"
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
                {{ $blobs->links() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        $(function () {
            let pickerStart = $("#datepickerStart");
            let pickerEnd = $("#datepickerEnd");
            // let clickNumber = 0;

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
                    window.location.href = "{{ url('doctor/rehab/'.session()->get('patient_id')) }}"
                },
                error: function () {
                    alert('删除失败，请重新尝试');
                    console.log('无法删除，请重新删除');
                }
            })
        }
    </script>
@endsection
