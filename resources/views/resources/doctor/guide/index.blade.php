@extends('layouts.doctor')

@section('content')
    <div class="p-4 mx-4 my-4 bg-white rounded-md shadow-lg">
        <div class="container mx-auto p-4">
            <div>
                <h2 class="mb-4 text-2xl font-semibold leading-tight">视频指导</h2>
            </div>
            <div class="overflow-x-auto flex justify-center">
                <input autocomplete="off" type="text" value="{{ $guideIP }}" id="guideIP"
                       class="block mx-2 px-2 py-1.5 text-sm bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       placeholder="视频IP"/>
                <button type="submit" onclick="save()"
                        class="inline-block px-6 py-2.5 mx-2
                                    justify-center text-center
                                    bg-blue-600 text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-blue-700
                                    hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                    active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    保存
                </button>
                <a href="https://{{$guideIP}}"
                   class="inline-block px-6 py-2.5 mx-2
                                    justify-center text-center
                                    bg-red-600 text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-red-700
                                    hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0
                                    active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                    连接
                </a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function save() {

            let guideIP = $('#guideIP');

            $.ajax({
                type: 'POST',
                url: '{{ url('doctor/guide/'. session()->get('patient_id')) }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "guideIP": guideIP.val(),
                },
                success: function (msg) {
                    alert('成功保存');
                    console.log(msg);
                    window.location.href = "{{ url('doctor/guide/'. session()->get('patient_id')) }}"
                },
                error: function (msg) {
                    alert('删除失败，请重新尝试');
                    console.log(msg);
                }
            })
        }
    </script>
@endsection
