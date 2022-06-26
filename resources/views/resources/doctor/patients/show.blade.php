@extends('layouts.doctor')

@section('content')
    <div class="p-4 mx-4 my-4 bg-white rounded-md shadow-lg divide-y-2"
         x-data="{information: true, medical: false, recovery: false}">
        <header>
            <div class="max-w-screen-xl pb-4 mx-auto">
                <div class="flex items-center justify-center space-x-4">
                    <nav class="space-x-8 text-sm font-medium">
                        <button class="hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium"
                                @click="information=true;medical=false;recovery=false"
                                :class="{ 'text-gray-800': false, 'text-gray-300':!information}">基本资料
                        </button>
                        <button class="hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium"
                                @click="information=false;medical=true;recovery=false"
                                :class="{ 'text-gray-800': false, 'text-gray-300':!medical}">病史
                        </button>
                        <button class="hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium"
                                @click="information=false;medical=false;recovery=true"
                                :class="{ 'text-gray-800': false, 'text-gray-300':!recovery}">康复信息
                        </button>
                    </nav>
                </div>
            </div>
        </header>
        <div>
            <div id="information" x-show="information">
                <form class="container flex flex-col mx-auto space-y-12 ng-untouched ng-pristine ng-valid">
                    <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm">
                        <div class="grid grid-cols-6 gap-4 col-span-full">
                            <div class="col-span-4">
                                <label for="firstname" class="text-sm">用户ID</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ session()->get('patient_id') }}
                                </p>
                            </div>
                            <div class="col-span-2 row-span-2 items-center justify-center">
                                @if($detail['photo'] == null)
                                    <img src="{{ asset('image/morentouxiang.jpg') }}"
                                         alt="" class="w-40 h-40 m-auto rounded-full object-cover">
                                @else
                                    <img src="{{ $detail['photo'] }}"
                                         alt="" class="w-40 h-40 m-auto rounded-full object-cover">
                                @endif
                            </div>
                            <div class="col-span-2">
                                <label for="lastname" class="text-sm">用户名</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $username }}
                                </p>
                            </div>
                            <div class="col-span-2">
                                <label for="email" class="text-sm">全名</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ session()->get('patient_name') }}
                                </p>
                            </div>
                            <div class="col-span-2">
                                <label for="address" class="text-sm">用户类型</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    病人（
                                    @if($patient->limited == 1)
                                        初级用户
                                    @elseif($patient->limited == 2)
                                        中级用户
                                    @elseif($patient->limited == 3)
                                        高级用户
                                    @endif
                                    ）
                                </p>
                            </div>
                            <div class="col-span-1">
                                <label for="address" class="text-sm">性别</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    @if($detail['sex'] == 'M')
                                        男
                                    @elseif($detail['sex'] == 'F')
                                        女
                                    @endif
                                </p>
                            </div>
                            <div class="col-span-1">
                                <label for="address" class="text-sm">民族</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $detail['minzu'] }}
                                </p>
                            </div>
                            <div class="col-span-1">
                                <label for="address" class="text-sm">婚姻</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $detail['hunyin'] }}
                                </p>
                            </div>
                            <div class="col-span-1">
                                <label for="address" class="text-sm">籍贯</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $detail['jiguan'] }}
                                </p>
                            </div>
                            <div class="col-span-1">
                                <label for="address" class="text-sm">文化程度</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $detail['wenhuachengdu'] }}
                                </p>
                            </div>
                            <div class="col-span-1">
                                <label for="address" class="text-sm">职业</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $detail['zhiye'] }}
                                </p>
                            </div>
                            <div class="col-span-4">
                                <label for="address" class="text-sm">工作单位</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $detail['gongzuodanwei'] }}
                                </p>
                            </div>
                            <div class="col-span-3">
                                <label for="address" class="text-sm">出生时间</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $detail['dateOfBirth'] }}
                                </p>
                            </div>
                            <div class="col-span-3">
                                <label for="address" class="text-sm">年龄</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $detail['age'] }}
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="address" class="text-sm">地址</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $detail['address'] }}
                                </p>
                            </div>
                            <div class="col-span-3">
                                <label for="address" class="text-sm">所属医院</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    @if($detail['Hospital'] != null)
                                        {{ session()->get('hospitalName')->find($detail['Hospital'])['name'] }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-span-3">
                                <label for="address" class="text-sm">所属社区</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    @if($detail['community'] != null)
                                        {{ session()->get('communityName')->find($detail['community'])['name'] }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-span-2">
                                <label for="address" class="text-sm">手机</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $detail['mobilephone'] }}
                                </p>
                            </div>
                            <div class="col-span-2">
                                <label for="address" class="text-sm">登记日期</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $detail['dateJoined'] }}
                                </p>
                            </div>
                            <div class="col-span-2">
                                <label for="address" class="text-sm">最近登陆</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ date_create()->format('Y-m-d') }}
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div id="medical" x-show="medical">
                <form class="container flex flex-col mx-auto space-y-12 ng-untouched ng-pristine ng-valid">
                    <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm">
                        <div class="grid grid-cols-6 gap-4 col-span-full">
                            <div class="col-span-2">
                                <label for="firstname" class="text-sm">病人ID</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $patient['userId'] }}
                                </p>
                            </div>
                            <div class="col-span-2">
                                <label for="firstname" class="text-sm">病人类型</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    病人类型</p>
                            </div>
                            <div class="col-span-2">
                                <label for="firstname" class="text-sm">权限</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    @if($patient->limited == 1)
                                        初级用户
                                    @elseif($patient->limited == 2)
                                        中级用户
                                    @elseif($patient->limited == 3)
                                        高级用户
                                    @endif
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">现病史</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $patient['xianbingshi'] }}
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">既往史</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $patient['jiwangshi'] }}
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">家族史</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $patient['jiazushi'] }}
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">个人史</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $patient['gerenshi'] }}
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">婚育史</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $patient['hunyushi'] }}
                                </p>
                            </div>
                            <div class="col-span-3">
                                <label for="firstname" class="text-sm">诊断年份</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md">
                                    {{ $patient['diagnosisYear'] }}
                                </p>
                            </div>
                            <div class="col-span-3">
                                <label for="firstname" class="text-sm">医生</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    @for($index = 0; $index < count($doctorsName); $index +=1)
                                        {{ $doctorsName[$index] }};
                                    @endfor
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div id="recovery" x-show="recovery">
                <form class="container flex flex-col mx-auto space-y-12 ng-untouched ng-pristine ng-valid">
                    <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm">
                        <div class="grid grid-cols-6 gap-4 col-span-full">
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">康复评定</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
{{--                                    @for($index = 0; $index = count(explode("；", $patient['kangfupingding'])) - 1; $index += 1)--}}
{{--                                        {{ $index }}--}}
{{--                                    @endfor--}}
                                    {{ $patient['kangfupingding'] }}
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">临床诊断</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $patient['linchuangzhenduan'] }}
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">康复诊断</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $patient['kangfuzhenduan'] }}
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">康复目标</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $patient['kangfumubiao'] }}
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">康复计划</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    {{ $patient['kangfujihua'] }}
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
