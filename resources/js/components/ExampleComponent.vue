<template>
    <div class="flex items-center">

        <div class="rounded-full h-6 w-6 flex items-center justify-center bg-blue-100 hover:bg-red-100 cursor-pointer" @click="shift('r')">
            <font-awesome-icon icon="chevron-left" />        
        </div>

        <div class="month_box flex overflow-hidden w-full sm:h-full sm:w-full w-1/2">
            <div  class="border-2 rounded-3xl flex-full transform " v-for="(month, index) in months" :key="index" v-bind="{ id:index+1 }" :style="{transform: 'translateX('+translate+'%'}">

                <div class="bg-jan bg-cover rounded-t-2xl bg-gray-100 dark:bg-gray-900 h-80 sm:h-2/3 bg-no-repeat bg-center" v-bind="{ id:index+1 }">
                    <p class="pt-3 pl-1 font-semibold text-red-500">
                    {{ month[1] }}
                    </p>
                    <p class="pt-2 pl-1 font-semibold text-red-500">
                    {{ now.format('DD.MMMM YYYY') }}
                    </p>
                </div>
                <div class="days x-2 grid grid-cols-7 pl-2 pt-2 sm:pl-3
                    gap-4">
                    <div class="calendar__day text-red-500">M</div>
                    <div class="calendar__day text-red-500">T</div>
                    <div class="calendar__day text-red-500">W</div>
                    <div class="calendar__day text-red-500">T</div>
                    <div class="calendar__day text-red-500">F</div>
                    <div class="calendar__day text-red-500">S</div>
                    <div class="calendar__day text-red-500">S</div>

                    <div class="hover:text-green-500" v-for="day in filterMonth(month[0])" >
                        <span class="text-green-500"  v-if="day == 20">
                            {{day}}
                        </span>
                        <span v-if="day != 20">
                            {{day}}
                        </span>

                    </div>
                </div>

            </div>
        </div>
        <div class="rounded-full h-6 w-6 flex items-center justify-center bg-blue-100 hover:bg-red-100 cursor-pointer" @click="shift">
            <font-awesome-icon icon="chevron-right" />        
        </div>
    </div>
</template>

<script>
    import dayjs from 'dayjs';
    import relativeTime from 'dayjs/plugin/relativeTime';
    import utc from 'dayjs/plugin/utc';
    import timezone from 'dayjs/plugin/timezone';
    import advancedFormat from 'dayjs/plugin/advancedFormat';
    import locale_de from 'dayjs/locale/de';
    import localeData from 'dayjs/plugin/localeData';

    export default
    {

        created()
        {
            dayjs.extend(relativeTime);
            dayjs.extend(timezone);
            dayjs.extend(utc);
            dayjs.extend(advancedFormat);
            dayjs.extend(localeData);
            dayjs.locale('de');
            this.now = dayjs()
            this.months = dayjs().localeData().months().map(
                (val, index) =>
                {
                    if (index.toString().length == 1)
                    {
                        return ['0' + (index + 1).toString(), val]
                    }
                    else
                    {
                        return [index, val]
                    }
                }
            )
        },

        methods:
        {
            shift(direc='l')
            {
                if( direc=='r' ){
                    this.translate -= 100
                } else {
                    this.translate += 100
                }   
                

            },
            getDatesBetweenDates(start)
            {
                let dates = []
                start = dayjs(start)
                let end = start.add(1, 'M').subtract(1, 'd')
                const tot_days = end.diff(start, 'd')
                var i;
                for (i = 0; i < tot_days; i++)
                {
                    dates = [...dates, start.add(i, 'd')]
                }
                dates = [...dates, end]
                return dates
            },
            filterMonth(month)
            {
                const start = new Date('2021-' + month + '-01')
                let between = this.getDatesBetweenDates(start)
                let weekday = between[0].format('dddd')
                between = between.map(
                    (val, index) =>
                    {
                        return val.format('D')
                    }
                )
                if (weekday == 'Dienstag')
                {
                    return ['', ...between]
                }
                else if (weekday == '')
                {
                    return ['', ...between]
                }
                else if (weekday == 'Mittwoch')
                {
                    return ['', '', ...between]
                }
                else if (weekday == 'Donnerstag')
                {
                    return ['', '', '', ...between]
                }
                else if (weekday == 'Freitag')
                {
                    return ['', '', '', '',
                        ...between
                    ]
                }
                else if (weekday == 'Samstag')
                {
                    return ['', '', '', '',
                        '', ...between
                    ]
                }
                else if (weekday == 'Sonntag')
                {
                    return ['', '', '', '',
                        '', '', ...between
                    ]
                }
                else
                {
                    return between
                }
            },
        },

        filters:
        {
            diffForHumans: (date) =>
            {
                if (!date)
                {
                    return null;
                }

                return dayjs(date).fromNow();
            },
        },

        data()
        {
            return {
                date: "2019-05-13 13:52:15",
                months: [],
                now: "",
                translate: 0,
            }
        },

        mounted()
        {
            console.log('Component mounted.')
        }

    }
</script>
