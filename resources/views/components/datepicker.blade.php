<div class="">

</div>
<div class="antialiased sans-serif">
    <div x-data="app()" x-init="[initDate(), getNoOfDays(year, month), isCross()]" x-cloak>
        <div class="container mx-auto">
            <div class="mb-5 w-64">
                {{--标题--}}
                <label for="datepicker" class="block text-xs font-semibold text-gray-600 uppercase mt-4">出生时间</label>
                {{--日历--}}
                <div class="relative">
                    {{--获得日历时间--}}
                    <input type="hidden" name="date" x-ref="date">
                    {{--keydown按下时监听时间--}}
                    {{--showDatepicker变量表示是否显示日历--}}
                    {{--x-model双向绑定--}}
                    <input type="text" readonly x-model="datepickerValue" @click="showDatepicker = !showDatepicker"
                           @keydown.escape="showDatepicker = false"
                           class="block py-3 px-1 mt-1 text-gray-800 appearance-none border-b-2 border-gray-100 focus:text-gray-500 focus:outline-none focus:border-gray-200 w-full"
                           placeholder="出生时间">

                    {{--日历svg图--}}
                    <div class="absolute top-0 right-0 px-3 py-2">
                        <img src="{{ asset('svg/calendar.svg') }}" alt="" class="h-6 w-6 text-gray-400">
                    </div>

                    <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0" style="width: 17rem"
                         x-show.transition="showDatepicker" @click.away="showDatepicker = false">

                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <span x-text="year" class="ml-1 text-lg text-gray-800 font-bold pr-1"></span>
                                <span x-text="MONTH_NAMES[month]"
                                      class="text-lg font-normal text-gray-600 pl-1"></span>
                            </div>
                            <div>
                                <button type="button"
                                        class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                        @click="year--; getNoOfDays(year, month); isCross()">
                                    <img src="{{ asset('svg/left-d.svg') }}" alt=""
                                         class="h-4 w-4 text-gray-500 inline-flex">
                                </button>
                                <button type="button"
                                        class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                        @click="month--; getNoOfDays(year, month); isCross()">
                                    <img src="{{ asset('svg/left.svg') }}" alt=""
                                         class="h-4 w-4 text-gray-500 inline-flex">
                                </button>
                                <button type="button"
                                        class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                        @click="month++; getNoOfDays(year, month); isCross()">
                                    <img src="{{ asset('svg/right.svg') }}" alt=""
                                         class="h-4 w-4 text-gray-500 inline-flex">
                                </button>
                                <button type="button"
                                        class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                        @click="year++; getNoOfDays(year, month); isCross()">
                                    <img src="{{ asset('svg/right-d.svg') }}" alt=""
                                         class="h-4 w-4 text-gray-500 inline-flex">
                                </button>
                            </div>
                        </div>

                        {{--最上面的星期--}}
                        <div class="flex fle-wrap mb-3 -mx-1">
                            <template x-for="(day, index) in DAYS" :key="index">
                                <div style="width: 14.26%" class="px-2">
                                    <div x-text="day" class="text-gray-800 font-medium text-center text-xs"></div>
                                </div>
                            </template>
                        </div>

                        <div class="flex flex-wrap -mx-1">
                            <template x-for="blankday in blankdays">
                                <div style="width: 14.28%"
                                     class="text-center border p-1 border-transparent text-sm"></div>
                            </template>
                            <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                <div style="width: 14.28%" class="px-1 mb-1">
                                    <div @click="getDateValue(date)" x-text="date"
                                         class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                         :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }">
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const MONTH_NAMES = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
    const DAYS = ['日', '一', '二', '三', '四', '五', '六'];

    function app() {
        return {
            showDatepicker: false,
            datepickerValue: '',

            month: '',
            year: '',
            no_of_days: [],
            blankdays: [],
            days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

            // 初始化
            initDate() {
                let today = new Date();
                console.log(today.getDate())
                // 年/月/日
                this.year = today.getFullYear();
                // 从0开始计算月份
                this.month = today.getMonth();
                this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
            },

            // 判断所选的日子是否是今天
            isToday(date) {
                const today = new Date();
                const d = new Date(this.year, this.month, date);

                return today.toDateString() === d.toDateString();
            },

            getDateValue(date) {
                let selectedDate = new Date(this.year, this.month, date);

                this.datepickerValue = selectedDate.toDateString();

                // 获取name=date的标签
                this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + selectedDate.getMonth()).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);

                this.showDatepicker = false;
            },

            getNoOfDays(year, month) {
                let daysInMonth = new Date(year, month + 1, 0).getDate();

                // find where to start calendar day of week
                let dayOfWeek = new Date(year, month).getDay();
                let blankdaysArray = [];
                for (var i = 1; i <= dayOfWeek; i++) {
                    blankdaysArray.push(i);
                }

                let daysArray = [];
                for (var i = 1; i <= daysInMonth; i++) {
                    daysArray.push(i);
                }

                this.blankdays = blankdaysArray;
                this.no_of_days = daysArray;
            },

            isCross() {
                if (this.month === 12) {
                    this.month = 0;
                    this.year++;
                } else if (this.month === -1) {
                    this.month = 11;
                    this.year--;
                }
            }
        }
    }
</script>
