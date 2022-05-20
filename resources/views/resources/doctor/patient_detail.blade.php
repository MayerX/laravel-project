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
                                :class="{ 'text-gray-800': recovery, 'text-gray-300':!information}">基本资料
                        </button>
                        <button class="hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium"
                                @click="information=false;medical=true;recovery=false"
                                :class="{ 'text-gray-800': recovery, 'text-gray-300':!medical}">病史
                        </button>
                        <button class="hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium"
                                @click="information=false;medical=false;recovery=true"
                                :class="{ 'text-gray-800': recovery, 'text-gray-300':!recovery}">康复信息
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
                                <label for="firstname" class="text-sm">ID</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-2 row-span-2 items-center justify-center">
                                <img src="https://tailus.io/sources/blocks/stats-cards/preview/images/second_user.webp"
                                     alt="" class="w-40 h-40 m-auto rounded-full object-cover">
                            </div>
                            <div class="col-span-2">
                                <label for="lastname" class="text-sm">用户名</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-2">
                                <label for="email" class="text-sm">全名</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-2">
                                <label for="address" class="text-sm">用户类型</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-1">
                                <label for="address" class="text-sm">性别</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-1">
                                <label for="address" class="text-sm">民族</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-1">
                                <label for="address" class="text-sm">婚姻</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-1">
                                <label for="address" class="text-sm">籍贯</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-1">
                                <label for="address" class="text-sm">文化程度</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-1">
                                <label for="address" class="text-sm">职业</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-4">
                                <label for="address" class="text-sm">工作单位</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-3">
                                <label for="address" class="text-sm">出生时间</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-3">
                                <label for="address" class="text-sm">年龄</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-full">
                                <label for="address" class="text-sm">地址</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-3">
                                <label for="address" class="text-sm">所属医院</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-3">
                                <label for="address" class="text-sm">所属社区</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-2">
                                <label for="address" class="text-sm">手机</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-2">
                                <label for="address" class="text-sm">登记日期</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
                            </div>
                            <div class="col-span-2">
                                <label for="address" class="text-sm">最近登陆</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    123</p>
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
                                    病人ID</p>
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
                                    权限</p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">现病史</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    患者在2个半月前工作时突发口齿含糊，右侧肢体活动障碍，右手不能抓握，右上肢不能抬举，不能行走，无昏迷抽搐，无大小便失禁等。起病后即被单位同事送往新安国际医院诊治，经头颅CT/MRI检查提示“左侧脑室体部及丘脑急性脑梗塞”，随即门诊拟诊“左侧脑梗塞，2型糖尿病，心房扑动”收治入院。予清除氧自由基、健脑、活血化瘀、抗血小板聚集、降糖、抗心律失常等对症处理（具体不详），口齿转清，但右侧肢体活动障碍，无畏寒发热，无头痛头晕，无咳嗽咳痰，无胸闷气促，无心慌心悸，无恶心呕吐，无腹痛腹胀，
                                    患者在2个半月前工作时突发口齿含糊，右侧肢体活动障碍，右手不能抓握，右上肢不能抬举，不能行走，无昏迷抽搐，无大小便失禁等。起病后即被单位同事送往新安国际医院诊治，经头颅CT/MRI检查提示“左侧脑室体部及丘脑急性脑梗塞”，随即门诊拟诊“左侧脑梗塞，2型糖尿病，心房扑动”收治入院。予清除氧自由基、健脑、活血化瘀、抗血小板聚集、降糖、抗心律失常等对症处理（具体不详），口齿转清，但右侧肢体活动障碍，无畏寒发热，无头痛头晕，无咳嗽咳痰，无胸闷气促，无心慌心悸，无恶心呕吐，无腹痛腹胀，
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">既往史</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    患者既往无“高血压”病史，有“2型糖尿病”病史10余年，长期皮下注射诺和锐30R针22U.16U，早晚餐前，血糖时有波动，未定期监测。有“心房扑动”病史10余年，未正规诊治。否认肺肾肝及其他内分泌系统疾病史，否认有“结核、伤寒、肝炎”等传染
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">家族史</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    父母早亡，死因不详，有1兄弟，体健。二系三代否认有家族性或遗传性疾病史，否认与本病相关疾病史。
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">个人史</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    自幼出生生长于本地，高中文化，工人，否认有外地长期居住史，否认有疫水疫源接触史及疫区停留史，否认有工业毒物、粉尘、放射性物质接触史，无吸烟史饮酒史，否认有吸毒冶游等不良习性。
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">婚育史</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    25岁结婚，育1儿，妻、儿均体健，家庭关系和睦。
                                </p>
                            </div>
                            <div class="col-span-3">
                                <label for="firstname" class="text-sm">诊断年份</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    2011
                                </p>
                            </div>
                            <div class="col-span-3">
                                <label for="firstname" class="text-sm">医生</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    傅建明(嘉兴市第二医院,康复医学);胡安龙(,康复中心);
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
                                    1、脑功能30分；</br>
                                    2、颈软，无抵抗，右侧鼻唇沟变浅，口角左 斜，伸舌居中；</br>
                                    3、Brunnstrom分期：右上肢III期、右手IV期、右下肢V期，Asworth评定：右上肢I级，四肢深浅感觉存在，双下肢无浮肿，右巴氏征（+）。</br>
                                    4、坐位平衡3级，站立平衡3级</br>
                                    5、吞咽评定IV级，饮水试验阴性</br>
                                    6、单侧空间忽略评定：未见异常</br>
                                    7、抑郁量表测定：SDS评分0.40分，无抑郁</br>
                                </p>
                            </div>

                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">康复评定</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    头颅CT/MRI：左侧脑室体部旁及丘脑急性梗塞灶，两侧大脑半球散在多发梗塞灶，部分软化。</br>
                                    心电图：心房扑动(2:1-4:1传导），心电轴左偏。
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">临床诊断</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">康复诊断</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    右侧肢体偏瘫
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">康复目标</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    功能性步行，实用手。
                                </p>
                            </div>
                            <div class="col-span-full">
                                <label for="firstname" class="text-sm">康复计划</label>
                                <p id="firstname" type="text"
                                   class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400">
                                    1、运动治疗<br>
                                    2、日常生活活动训练<br>
                                    3、步行训练<br>
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
