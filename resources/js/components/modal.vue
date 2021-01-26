<script>
  export default {
    name: 'modal',

    props: ['day', 'month'],
    methods: {
      close() {
        this.$emit('close');
      },
    },
  };
</script>

<template>
  <div class="bg-gray-100 fixed bottom-0 top-0 right-0 left-0 bg-opacity-50 flex justify-center items-center" @click.self="close">
    <div class="shadow-2xl bg-white flex-col rounded-lg">
        <div class="flex p-5 w-80 justify-between relative">
            <h1 class="font-bold">
                Termin:
                {{ day }}.{{month}} 2021
            </h1>
            <div class="top-0 absolute right-5 cursor-pointer" @click="close">
                &#120;
            </div>
        </div>
        <div class="p-5">
            <textarea
            class="h-80 w-80 rounded border-gray-300 focus:border-indigo-300 focus:ring-2 focus:ring-indigo-200 focus:ring-opacity-50 text-indigo-500"
            />
        </div>
    </div>
  </div>
</template>

