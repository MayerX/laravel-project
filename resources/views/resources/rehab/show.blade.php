@extends('layouts.doctor')
<script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
@section('links')

@endsection

@section('content')
    <div class="p-4 mx-4 my-4 bg-white rounded-md shadow-lg">
        <div class="container p-4 mx-auto">
            <div class="flex mb-4 justify-between">
                <div>
                    <a href="{{ url('doctor/rehab/' . session()->get('patient_id') ) }}"
                       class="inline-block px-6 py-2.5
                                    justify-center text-center
                                    bg-blue-600 text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-blue-700
                                    hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                    active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        返回
                    </a>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">动作类型: {{ $typeDetail }}</h2>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">分数: {{ $score }}</h2>

                </div>
            </div>
            <div x-data="{frontX: true, frontY: false, frontZ: false, backX: false, backY: false, backZ: false}">
                <div class="max-w-screen-xl pb-4 mx-auto">
                    <div class="flex items-center justify-center space-x-4">
                        <nav class="space-x-8 text-sm font-medium">
                            <button class="hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium"
                                    @click="frontX=true;frontY=false;frontZ=false;backX=false;backY=false;backZ=false;"
                                    :class="{ 'text-gray-800': false, 'text-gray-300':!frontX}">
                                {{ $typeName[0] }}
                            </button>
                            <button class="hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium"
                                    @click="frontX=false;frontY=true;frontZ=false;backX=false;backY=false;backZ=false;"
                                    :class="{ 'text-gray-800': false, 'text-gray-300':!frontY}">
                                {{ $typeName[1] }}
                            </button>
                            <button class="hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium"
                                    @click="frontX=false;frontY=false;frontZ=true;backX=false;backY=false;backZ=false;"
                                    :class="{ 'text-gray-800': false, 'text-gray-300':!frontZ}">
                                {{ $typeName[2] }}
                            </button>
                            <button class="hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium"
                                    @click="frontX=false;frontY=false;frontZ=false;backX=true;backY=false;backZ=false;"
                                    :class="{ 'text-gray-800': false, 'text-gray-300':!backX}">
                                {{ $typeName[3] }}
                            </button>
                            <button class="hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium"
                                    @click="frontX=false;frontY=false;frontZ=false;backX=false;backY=true;backZ=false;"
                                    :class="{ 'text-gray-800': false, 'text-gray-300':!backY}">
                                {{ $typeName[4] }}
                            </button>
                            <button class="hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium"
                                    @click="frontX=false;frontY=false;frontZ=false;backX=false;backY=false;backZ=true;"
                                    :class="{ 'text-gray-800': false, 'text-gray-300':!backZ}">
                                {{ $typeName[5] }}
                            </button>
                        </nav>
                    </div>
                </div>
                <div class="w-auto">
                    <div class="container h-screen flex-col flex min-w-max" id="frontX" x-show="frontX"></div>
                    <div class="container h-screen flex-col flex min-w-max" id="frontY" x-show="frontY"></div>
                    <div class="container h-screen flex-col flex min-w-max" id="frontZ" x-show="frontZ"></div>
                    <div class="container h-screen flex-col flex min-w-max" id="backX" x-show="backX"></div>
                    <div class="container h-screen flex-col flex min-w-max" id="backY" x-show="backY"></div>
                    <div class="container h-screen flex-col flex min-w-max" id="backZ" x-show="backZ"></div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let dataAll;

        getData();

        function getData() {
            $.ajax({
                type: 'POST',
                url: '{{ url('doctor/rehab/'.$patientId . '/' . $time) }}',
                async: false,
                data: {
                    '_token': '{{ csrf_token() }}',
                },
                success: function (res) {
                    console.log('success');
                    // console.log(res);
                    dataAll = res['data'];
                    getCharts(dataAll);
                },
                error: function () {
                    console.log('error');
                    console.log(this.url);
                },
            })
        }

        function getCharts(dataAll) {
            let ids = ['frontX', 'frontY', 'frontZ', 'backX', 'backY', 'backZ'];
            // let width = $('#frontX').width();
            // let height = $('#frontX').height();
            // $('#frontY').css('width', width).css('height', height);
            // $('#frontZ').css('width', width).css('height', height);
            // $('#backX').css('width', width).css('height', height);
            // $('#backY').css('width', width).css('height', height);
            // $('#backZ').css('width', width).css('height', height);

            for (let index = 0; index < 6; index++) {
                let dom = document.getElementById(ids[index]);
                let myChart = echarts.init(dom);

                // dom.style.width = 'auto';
                // dom.style.height = '100%';
                let data = dataAll[index];
                let option = {
                    tooltip: {
                        trigger: 'axis'
                    },

                    xAxis: {
                        name: '时间/s',
                        data: data.map(function (item) {
                            return item[0];
                        })
                    },
                    yAxis: {
                        name: '抽样值'
                    },
                    toolbox: {
                        right: 10,
                        feature: {
                            dataZoom: {
                                yAxisIndex: 'none'
                            },
                            restore: {},
                            saveAsImage: {}
                        }
                    },
                    dataZoom: [{
                        startValue: '0'
                    },
                        {
                            type: 'inside'
                        }
                    ],
                    series: {
                        name: 'type',
                        type: 'line',
                        data: data.map(function (item) {
                            return item[1];
                        }),
                        markLine: {
                            silent: true,
                            lineStyle: {
                                color: '#333'
                            },
                        }
                    }
                }

                myChart.setOption(option);
            }
        }
    </script>
@endsection
