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
export default {
  data: function() {
    return {
      month: ['01', '02','03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
      index: 0,
      now: '',
    };
  },
  created: function() {
    this.now = dayjs()
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
