<template>
    <div>
        <font-awesome-icon icon="chevron-left" />
            <div class="month_box">
                {{ date | diffForHumans }}
                {{ months }}
                <div class="month_pic">
                    <ul>
                        <li v-for="val in alldays" :key="val.id">{{ val.format('MMMM') }}</li>
                    </ul> 
                </div>
                <div class="month">
                     <div class="calendar__day">M</div>
                     <div class="calendar__day">T</div>
                     <div class="calendar__day">W</div>
                     <div class="calendar__day">T</div>
                     <div class="calendar__day">F</div>
                     <div class="calendar__day">S</div>
                     <div class="calendar__day">S</div>
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

        computed: {
            alldays() {
                const start = new Date('2021-01-01')
                const end = new Date('2021-12-31')
                //this.getDatesBetweenDates(start,end)
                return [dayjs(start), dayjs( end )] 
            }

        },

        methods: {
            getDatesBetweenDates(start, end) {
                let dates = []
                const theDate = new Date(start)
                while (theDate < end) {
                    dates = [...dates, new Date(theDate)]
                    theDate.setDate(theDate.getDate() + 1)
                }
                console.log(dates)

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
