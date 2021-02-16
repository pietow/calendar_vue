<template>
  <div>

    <p>{{ month[index] }} </p>
    <month-component :month="month[index]"></month-component>
    <div @click="next">add</div>
  </div>
</template>

<script>
// import month-container from '../components/MonthContainer.vue';

export default {
  data: function() {
    return {
      greeting: "Hello",
      month: ['01', '02','03'],
      index: 0
    };
  },
  methods: {
    next: function(){
      if (this.month.length-1 > this.index) {
        this.index ++
      }
    }
  }
};
</script>
