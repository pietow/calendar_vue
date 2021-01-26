<script>
  export default {
    name: 'modal',

    methods: {
      close() {
        this.$emit('close');
      },
    },
  };
</script>

<template>
  <div class="bg-gray-100 fixed bottom-0 top-0 right-0 left-0 bg-opacity-50 flex justify-center items-center">
    <div class="shadow-2xl bg-white flex-col rounded-lg">
        <header
          class="modal-header"
          id="modalTitle"
        >
          <slot name="header">
            This is the default tile!

            <button
              type="button"
              class="btn-close"
              @click="close"
              aria-label="Close modal"
            >
              x
            </button>
          </slot>
        </header>
        <section
          class="modal-body"
          id="modalDescription"
        >
          <slot name="body">
            I'm the default body!
          </slot>
        </section>
        <footer class="modal-footer">
          <slot name="footer">
            I'm the default footer!

            <button
              type="button"
              class="btn-green"
              @click="close"
              aria-label="Close modal"
            >
              Close me!
            </button>
          </slot>
        </footer>
    </div>
  </div>
</template>

<style>

  .modal-header,
  .modal-footer {
    padding: 15px;
    display: flex;
  }

  .modal-header {
    border-bottom: 1px solid #eeeeee;
    color: #4AAE9B;
    justify-content: space-between;
  }

  .modal-footer {
    border-top: 1px solid #eeeeee;
    justify-content: flex-end;
  }

  .modal-body {
    position: relative;
    padding: 20px 10px;
  }

  .btn-close {
    border: none;
    font-size: 20px;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
  }
</style>
