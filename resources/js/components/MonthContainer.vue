<template>
  <div class="flex items-center">
    <div
      class="rounded-full h-6 w-6 flex items-center justify-center bg-blue-100 hover:bg-red-100 cursor-pointer"
      @click="prev"
    >
      <font-awesome-icon icon="chevron-left" />        
    </div>
    <month-component
      ref="child"
      :prop-month="now.format('MM')"
      :prop-event= "this.eventApi"
      v-if="!isLoading"
    />
    <div
      class="rounded-full h-6 w-6 flex items-center justify-center bg-blue-100 hover:bg-red-100 cursor-pointer"
      @click="next"
    >
      <font-awesome-icon icon="chevron-right" />        
    </div>
  </div>
</template>

<script>
import dayjs from 'dayjs'
import VueForceNextTick from 'vue-force-next-tick'
export default {
  data: function() {
    return {
      month: ['01', '02','03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
      index: 0,
      now: '',
      eventApi: [],
      isLoading: false,
    };
  },
  created: function() {
    this.now = dayjs()
    this.index = dayjs().format('M')-1
    // console.log(!this.isLoading)
    // this.$nextTick(() =>
    //   {
        this.isLoading=true
        axios.get('api/event')
        .then(
          response => {
            this.eventApi = response.data.map(
              val => {
                // val.dateTime = dayjs(new Date(val.dateTime))                            
                let datTi = dayjs(new Date(val.dateTime))
                val.dateTime = datTi
                return val
              }
            )
            this.isLoading = false
          }
        )
      // })
  },
  methods: {
    next: function(){
      if (this.month.length-1 > this.index) {
        this.index ++
        this.rerenderDay()
      } else {
        this.index = 0
        this.rerenderDay()
      }
    },
    prev: function(){
      if (0 < this.index){
        this.index --
        this.rerenderDay()
      } else {
        this.index = this.month.length-1
        this.rerenderDay()
      }
    },
    rerenderDay: function(){
        let month = this.month[this.index]
        this.$refs.child.between(month)
    }
  }
};
</script>
