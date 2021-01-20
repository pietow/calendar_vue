<template>
    <div class="flex items-center justify-center h-full">
        <font-awesome-icon icon="chevron-left" />
            <div class="month_box flex overflow-hidden w-1/2 sm:h-full sm:w-full">
                <div  class="border-2 rounded-3xl flex-full "v-for="(month, index) in months" :key="index" v-bind="{ id:index+1 }">
                    <div class="bg-jan bg-cover rounded-t-2xl h-80 sm:h-2/3 bg-no-repeat bg-center" v-bind="{ id:index+1 }">
                        <p class="pt-3 pl-1 font-semibold">
                        {{ month[1] }}
                        </p>
                        <p class="pt-2 pl-1 font-semibold">
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
                             <span class="text-grid-500"  v-if="day != 20">
                             {{day}}
                             </span>

                         </div v-bind:class>
                    </div>
                </div>
            </div>
        <font-awesome-icon icon="chevron-right" />
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
                        return [ '0' + (index + 1).toString(), val ]
                    }
                    else
                    {
                        return [ index, val ]
                    }
                }
            )
        },

        methods:
        {
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
                    ( val, index  ) => {
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




            }
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
            }
        },

        mounted()
        {
            console.log('Component mounted.')
        }

    }
</script>
