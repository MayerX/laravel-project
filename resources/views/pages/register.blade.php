@extends('layouts.app')

@section('title', '注册')

<div class="flex flex-col h-screen">
    <!-- Auth Card Container -->
    <div class="grid mx-2 my-auto place-items-center">
        <div class="bg-white p-12 px-6 pt-6 pb-4 shadow-lg w-1/2" x-data="{ page : 1 }">
            <h2 class="font-semibold text-2xl text-center text-gray-800">注册</h2>
            <form class="mt-10" method="POST" autocomplete="on">
                <div x-show="page === 1">
                    <x-input show="用户名" name="userID" type="text"/>
                    <x-input show="密码" name="password" type="password"/>
                    <x-input show="确认密码" name="password_confirmation" type="password"/>
                    <x-input show="真实姓名" name="username" type="text"/>
                    <x-input show="邮箱" name="email" type="email"/>

                    <x-select name="类型">
                        <option value="doctor">医生</option>
                        <option value="patient">患者</option>
                    </x-select>

                    <div class="flex flex-row-reverse mt-6">
                        <button type="button"
                                class="w-1/2 py-3 mx-2 bg-gray-800 rounded-md font-medium text-white uppercase focus:outline-none hover:bg-gray-700 hover:shadow-none"
                                x-on:click="page ++">
                            下一步
                        </button>
                    </div>

                </div>

                <div x-show="page === 2">
                    <x-select name="性别">
                        <option value="doctor">男</option>
                        <option value="patient">女</option>
                    </x-select>

                    <x-select name="婚姻">
                        <option value="unmarried">未婚</option>
                        <option value="married">已婚</option>
                    </x-select>

                    <x-select name="民族">
                        <option value="汉族" selected="selected">汉族</option>
                        <option value="蒙古族">蒙古族</option>
                        <option value="彝族">彝族</option>
                        <option value="侗族">侗族</option>
                        <option value="哈萨克族">哈萨克族</option>
                        <option value="畲族">畲族</option>
                        <option value="纳西族">纳西族</option>
                        <option value="仫佬族">仫佬族</option>
                        <option value="仡佬族">仡佬族</option>
                        <option value="怒族">怒族</option>
                        <option value="保安族">保安族</option>
                        <option value="鄂伦春族">鄂伦春族</option>
                        <option value="回族">回族</option>
                        <option value="壮族">壮族</option>
                        <option value="瑶族">瑶族</option>
                        <option value="傣族">傣族</option>
                        <option value="高山族">高山族</option>
                        <option value="景颇族">景颇族</option>
                        <option value="羌族">羌族</option>
                        <option value="锡伯族">锡伯族</option>
                        <option value="乌孜别克族">乌孜别克族</option>
                        <option value="裕固族">裕固族</option>
                        <option value="赫哲族">赫哲族</option>
                        <option value="藏族">藏族</option>
                        <option value="布依族">布依族</option>
                        <option value="白族">白族</option>
                        <option value="黎族">黎族</option>
                        <option value="拉祜族">拉祜族</option>
                        <option value="柯尔克孜族">柯尔克孜族</option>
                        <option value="布朗族">布朗族</option>
                        <option value="阿昌族">阿昌族</option>
                        <option value="俄罗斯族">俄罗斯族</option>
                        <option value="京族">京族</option>
                        <option value="门巴族">门巴族</option>
                        <option value="维吾尔族">维吾尔族</option>
                        <option value="朝鲜族">朝鲜族</option>
                        <option value="土家族">土家族</option>
                        <option value="傈僳族">傈僳族</option>
                        <option value="水族">水族</option>
                        <option value="土族">土族</option>
                        <option value="撒拉族">撒拉族</option>
                        <option value="普米族">普米族</option>
                        <option value="鄂温克族">鄂温克族</option>
                        <option value="塔塔尔族">塔塔尔族</option>
                        <option value="珞巴族">珞巴族</option>
                        <option value="苗族">苗族</option>
                        <option value="满族">满族</option>
                        <option value="哈尼族">哈尼族</option>
                        <option value="佤族">佤族</option>
                        <option value="东乡族">东乡族</option>
                        <option value="达斡尔族">达斡尔族</option>
                        <option value="毛南族">毛南族</option>
                        <option value="塔吉克族">塔吉克族</option>
                        <option value="德昂族">德昂族</option>
                        <option value="独龙族">独龙族</option>
                        <option value="基诺族">基诺族</option>
                    </x-select>

                    <x-select name="文化程度">
                        <option value="小学">小学</option>
                        <option value="初中">初中</option>
                        <option value="高中">高中</option>
                        <option value="本科">本科</option>
                        <option value="硕士">硕士</option>
                        <option value="博士">博士</option>
                    </x-select>

                    <x-input show="地址" name="address" type="text"/>
                    <x-input show="籍贯" name="nativeplace" type="text"/>

                    <div class="flex flex-row mt-6">
                        <button type="button"
                                class="w-1/2 py-3 mx-2 bg-gray-800 rounded-md font-medium text-white uppercase focus:outline-none hover:bg-gray-700 hover:shadow-none"
                                x-on:click="page --">
                            上一步
                        </button>

                        <button type="button"
                                class="w-1/2 py-3 mx-2 bg-gray-800 rounded-md font-medium text-white uppercase focus:outline-none hover:bg-gray-700 hover:shadow-none"
                                x-on:click="page ++">
                            下一步
                        </button>
                    </div>
                </div>

                <div x-show="page === 3">

                    <x-input show="籍贯" name="nativeplace" type="text"/>

                    <x-datepicker></x-datepicker>

                    <x-select name="所属医院">
                        <option value="小学">小学</option>
                        <option value="初中">初中</option>
                        <option value="高中">高中</option>
                        <option value="本科">本科</option>
                        <option value="硕士">硕士</option>
                        <option value="博士">博士</option>
                    </x-select>

                    <div class="flex flex-row mt-6">
                        <button type="button"
                                class="w-1/2 py-3 mx-2  bg-gray-800 rounded-md font-medium text-white uppercase focus:outline-none hover:bg-gray-700 hover:shadow-none"
                                x-on:click="page --">
                            上一步
                        </button>

                        <button type="submit"
                                class="w-1/2 py-3 mx-2 bg-gray-800 rounded-md font-medium text-white uppercase focus:outline-none hover:bg-gray-700 hover:shadow-none">
                            完成
                        </button>
                    </div>

                </div>

                <!-- Another Auth Routes -->
                <div class="flex flex-wrap mt-4 mb-4 text-sm text-center">
                    <a href="{{ asset('index') }}" class="flex-2 underline">
                        返回首页
                    </a>

                    <p class="flex-1 text-gray-500 text-md mx-4 my-1 sm:my-auto">
                        or
                    </p>

                    <a href="register" class="flex-2 underline">
                        忘记密码
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Container -->
