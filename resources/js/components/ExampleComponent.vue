<template>
    <div>
        <font-awesome-icon icon="chevron-left" />
            <div class="month_box">
                {{ date | diffForHumans }}
                <div v-for="(month, index) in months" :key="index" v-bind="{ id:index+1 }">
                    <div class="imag" v-bind="{ id:index+1 }">
                        {{ month }}
                    </div>
                    <div class="days">
                         <div class="calendar__day">M</div>
                         <div class="calendar__day">T</div>
                         <div class="calendar__day">W</div>
                         <div class="calendar__day">T</div>
                         <div class="calendar__day">F</div>
                         <div class="calendar__day">S</div>
                         <div class="calendar__day">S</div>
                         <div v-for="day in alldays" v-if="day.format('M')==index+1">{{ day.format('D') }}
                         </div>
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
            this.months = dayjs().localeData().months()
        },

        computed:
        {
            alldays()
            {
                const start = new Date('2021-01-01')
                const end = new Date('2021-12-31')
                const between = this.getDatesBetweenDates(start, end)
                return between
                //return [dayjs(start), ...between, dayjs(end)]
            }

        },

        methods:
        {
            getDatesBetweenDates(start, end)
            {
                let dates = []
                start = dayjs(start)
                end = dayjs(end)
                const tot_days = end.diff(start, 'd')
                var i;
                for (i = 0; i < tot_days; i++)
                {
                    dates = [...dates, start.add(i, 'd')]
                }
                dates = [...dates, end]
                return dates
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
            }
        },

        data()
        {
            return {
                date: "2019-05-13 13:52:15",
                months: []
            }
        },

        mounted()
        {
            console.log('Component mounted.')
        }

    }
</script>
