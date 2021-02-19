<template>
  <div class="w-4/6 border-2 rounded-3xl">
    <div class="bg-jan bg-cover rounded-t-2xl bg-gray-100 dark:bg-gray-900 h-80 sm:h-2/3 bg-no-repeat bg-center">
      <p class="pt-3 pl-1 font-semibold text-red-500">
        {{ ho_day }}.&nbsp;{{ month }}.&nbsp;2021
      </p>
      <p class="pt-2 pl-1 font-semibold text-red-500">
        {{ now.format('DD. MMMM YYYY') }}
      </p>
    </div>
    <div
      class="days x-2 h-80 grid grid-cols-7 pl-12 pt-2 sm:pl-3 "
    >
      <div class="calendar__day text-red-500">
        M
      </div>
      <div class="calendar__day text-red-500">
        T
      </div>
      <div class="calendar__day text-red-500">
        W
      </div>
      <div class="calendar__day text-red-500">
        T
      </div>
      <div class="calendar__day text-red-500">
        F
      </div>
      <div class="calendar__day text-red-500">
        S
      </div>
      <div class="calendar__day text-red-500">
        S
      </div>

      <div 
        v-for="(day, index) in filterMonth()"
        :key="index"
        @mouseover="mark(day)"
        @click="showModal"
        class="cursor-pointer"
      >
        <span
          v-if="day != 20" 
          class="hover:text-green-500"
        >{{ day }}</span>

        <span
          v-if="day == 20 && propMonth == month"
          class="text-green-500"
        >{{ day }}</span>

        <span
          v-else-if="day == 20" 
          class="hover:text-green-500"
        >{{ day }}</span>
        <span class="text-xs align-top">Charly</span>
      </div>
    </div>

    <modal
      v-show="isModalVisible"
      :day="ho_day"
      :month="month"
      @close="closeModal"
    />
  </div>
</template>


<script>
    import dayjs from 'dayjs'

    export default
    {
        props:
        {
            propMonth:
            {
              type: String,
              default: '02'
            },
            propEvent:
          {
            type: Array,
            default: []
          }
        },

        data()
        {
            return {
                date: "2019-05-13 13:52:15",
                now: "",
                ho_day: "",
                ho_month: "",
                isModalVisible: false,
                eventLoaded: false,
                days: [],
                month: this.propMonth,
                isModalVisible: false,
                eventApi: [],
            }
        },
        created: function()
        {
            dayjs.locale('de')
            this.now = dayjs()
            this.ho_day = this.now.format('DD')
            this.between()
        },
        methods:
        {
          showModal() {
            this.isModalVisible = true;
          },
          closeModal: function() {
            this.isModalVisible = false;
          },
          mark: function(day){
            if (day) this.ho_day = day
          },
            between: function(month)
            {
                console.log(this.propEvent)
                if (month)
                {
                    this.month = month
                }
                let start = new Date('2021-' + this.month + '-01')
                start = dayjs(start)
                let end = start.add(1, 'M').subtract(1, 'd')
                this.days = []
                const tot_days = end.diff(start, 'd')
                for (var i = 0; i < tot_days; i++)
                {
                    this.days.push(start.add(i, 'd'))
                }
                this.days.push(end)

            },
            filterMonth: function()
            {
                let between = this.days

                let weekday = between[0].format('dddd')
                between = between.map(
                    (val) =>
                    {
                        return val.format('DD')
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
        }
    }
</script>
