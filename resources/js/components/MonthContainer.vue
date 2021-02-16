<template>
  <div>

    <p>{{ month[index] }} </p>
    <month-component :propMonth="month[index]" ref="child"></month-component>
    <button @click="next">add</button>
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
        console.log()
        let month = (this.month[this.index])
        console.log(this.$refs.child.days)
        this.$refs.child.between(month)

      }
    }
  }
};
</script>
