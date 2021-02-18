<template>
  <div class="flex items-center">
    <div
      class="rounded-full h-6 w-6 flex items-center justify-center bg-blue-100 hover:bg-red-100 cursor-pointer"
      @click="shift('l')"
    >
      <font-awesome-icon icon="chevron-left" />        
    </div>
    <div class="month_box flex overflow-hidden w-full sm:h-full sm:w-full w-1/2">
      <div
        v-for="(month, index) in months"
        :key="index"
        v-bind="{ id:index+1 }"
        :ref="month[1]"
        class="border-2 rounded-3xl flex-full transform transition-transform ease-in-out duration-1000"
        :style="{transform: 'translateX('+translate+'px'}"
        @mouseover="hover_month(month)"
      >
        <div
          class="bg-jan bg-cover rounded-t-2xl bg-gray-100 dark:bg-gray-900 h-80 sm:h-2/3 bg-no-repeat bg-center"
          v-bind="{ id:index+1 }"
        >
          <p class="pt-3 pl-1 font-semibold text-red-500">
            {{ ho_day }}.&nbsp;{{ month[1] }}&nbsp;2021
          </p>
          <p class="pt-2 pl-1 font-semibold text-red-500">
            {{ now.format('DD. MMMM YYYY') }}
          </p>
        </div>
        <div
          class="days x-2 grid grid-cols-7 pl-2 pt-2 sm:pl-3
                    gap-4"
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
            v-for="day in filterMonth(month[0])"
            class="hover:text-green-500"
            @mouseover="hover_date(day)"
            @click="showModal"
          >
            <span
              v-if="day == now.format('DD')"
              class="text-green-500 cursor-pointer"
            >
              {{ day }}
            </span>
            <span
              v-if="day != now.format('DD')"
              class="cursor-pointer"
            >
              {{ day }}
            </span>
          </div>
        </div>
      </div>
    </div>
    <div
      class="rounded-full h-6 w-6 flex items-center justify-center bg-blue-100 hover:bg-red-100 cursor-pointer"
      @click="shift('r')"
    >
      <font-awesome-icon icon="chevron-right" />        
    </div>

    <modal
      v-show="isModalVisible"
      :day="ho_day"
      :month="ho_month"
      @close="closeModal"
    />
  </div>
</template>

<script>
    import modal from '../components/modal.vue';
    import dayjs from 'dayjs';
    import relativeTime from 'dayjs/plugin/relativeTime';
    import utc from 'dayjs/plugin/utc';
    import timezone from 'dayjs/plugin/timezone';
    import advancedFormat from 'dayjs/plugin/advancedFormat';
    import locale_de from 'dayjs/locale/de';
    import localeData from 'dayjs/plugin/localeData';
    import _ from 'lodash'

    export default
    {

        data()
        {
            return {
                date: "2019-05-13 13:52:15",
                months: [],
                now: "",
                width: "",
                translate: 0,
                ho_day: "",
                ho_month: "",
                isModalVisible: false,
                events: [],
                eventLoaded: false,
            }
        },

        mounted: function() {
            //this.set_init()
        },

        async created()
        {
            await axios.get('/api/event')
                .then(response => {
                    this.events = response.data.map(
                        (val, index) => 
                        {
                            val.dateTime = dayjs(new Date(val.dateTime))                            
                            return val
                        }
                    )
                    this.eventLoaded = true
            })
            this.$nextTick(() => {
                 console.log(this.$refs)
            })
            console.log(this.eventLoaded)
            dayjs.extend(relativeTime);
            dayjs.extend(timezone);
            dayjs.extend(utc);
            dayjs.extend(advancedFormat);
            dayjs.extend(localeData);
            dayjs.locale('de');
            this.now = dayjs()
            this.ho_day = this.now.format('DD')
            window.addEventListener("resize", this.set_trans);

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

        destroyed() {
            window.removeEventListener("resize", this.set_trans);
        },

        methods:
        {
            set_init: function() { 
                let elem = this.$refs[1][0]
                let flex_basis = window.getComputedStyle(elem,null).getPropertyValue("width")
                this.width = parseFloat(flex_basis)
                let month = this.now.format('M')
                //console.log(month)
                this.translate = 0
                this.translate -= (this.width)*(month-1)
            },
            set_trans: _.debounce(function() {
                this.set_init()
            }, 400),
            showModal() {
            this.isModalVisible = true;
            },
            closeModal() {
            this.isModalVisible = false;
            },
            hover_month(month)
            {
                this.ho_month = month[0]
                
            },
            hover_date(day)
            {
                if( day ){
                    this.ho_day = day
                }    
                
            },
            shift(direc)
            {
                let elem = this.$refs[1][0]
                let flex_basis = window.getComputedStyle(elem,null).getPropertyValue("width")
                flex_basis = parseFloat(flex_basis)
                if (direc == 'r' && this.translate > -11*flex_basis)
                {
                    this.translate -= (flex_basis)
                }
                else if(direc == 'r') 
                {
                    this.translate = 0
                }
                else if (direc == 'l' && this.translate == 0) 
                {
                    this.translate += -11*flex_basis 
                }
                else if(direc == 'l') 
                {
                    this.translate += flex_basis
                }
            },
            getDatesBetweenDates(start)
            {
                let dates = []
                start = dayjs(start)
                //console.log(start.format('D.M.YYYY'))
//                console.log(this.events[1])
//                console.log(start.isSame(this.events.dateTime, 'day'))
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
        },

    }
</script>
