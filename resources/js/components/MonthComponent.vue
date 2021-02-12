<template>
    <div>
        <div class="bg-jan bg-cover rounded-t-2xl bg-gray-100 dark:bg-gray-900 h-80 sm:h-2/3 bg-no-repeat bg-center">
            <p class="pt-3 pl-1 font-semibold text-red-500">
            {{ho_day}}.&nbsp;{{ month[0] }}&nbsp;2021
            </p>
            <p class="pt-2 pl-1 font-semibold text-red-500">
            {{ now.format('DD. MMMM YYYY') }}
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

            <div v-for="day in filterItems(month[0])">
                {{day}}
            </div>

        </div>
    </div>
</template>


<script>
    import dayjs from 'dayjs'
    import relativeTime from 'dayjs/plugin/relativeTime'
    import utc from 'dayjs/plugin/utc'
    import timezone from 'dayjs/plugin/timezone'
    import advancedFormat from 'dayjs/plugin/advancedFormat'
    import locale_de from 'dayjs/locale/de'
    import localeData from 'dayjs/plugin/localeData'

    export default
    {

        data()
        {
          return {
              date: "2019-05-13 13:52:15",
              month: ['01', 1],
              now: "",
              width: "",
              ho_day: "",
              ho_month: "",
              isModalVisible: false,
              eventLoaded: false,
              day: [],
          }
        },
      created: function () {
            dayjs.extend(relativeTime)
            dayjs.extend(timezone)
            dayjs.extend(utc)
            dayjs.extend(advancedFormat)
            dayjs.extend(localeData)
            dayjs.locale('de')
            this.now = dayjs()
            this.ho_day = this.now.format('DD')
      },
      methods: {
            filterItems: function(month) {
                let start = new Date('2021-' + '01'+ '-01')
                start = dayjs(start)
                let end = start.add(1, 'M').subtract(1, 'd')
                const tot_days = end.diff(start, 'd')
                var i;
                for (i = 0; i < tot_days; i++)
                {
                    this.day = [...this.day, start.add(i, 'd')]
                }
                return [...this.day, end]
            }
        }
    }
</script>
