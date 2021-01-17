<template>
    <div>
        <font-awesome-icon icon="chevron-left" />
            <div class="month_box">
                <div class="month_pic">
                    
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
    export default
    {
        mounted()
        {
            console.log('Component mounted.')
        }
    }
</script>
