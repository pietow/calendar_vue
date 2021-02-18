<template>
  <div
    v-show="modal"
    class="bg-gray-500 border-2 h-screen w-screen z-50 relative transform ease-in-out duration-1000"
  > 
    <p>
      {{ day }}.{{ month }} 2021
    </p>
  </div>
</template>
<script>
    export default
    {
        props: ['day', 'month'],
        data()
        {
            return {
                modal: true,
            }
        },
        method:
        {
            toggleModal()
            {
                this.modal != this.modal
            }
        }
    }
</script>
