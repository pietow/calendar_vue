<template>
    <div id="products" class="">
        <!-- <h1>{{ propGallery[0].image }}</h1> -->
        <!-- <img :src="imgObj[0].image" /> -->
        <!-- <img src="/../storage/images/blog/bio.jpg" /> -->
        <div class="relative w-full h-96">
            <div class="absolute top-40">
                <button
                    @click="currentElementIndex--"
                    :disabled="reachedMaxLeft"
                >
                    <img
                        src="/../storage/images/assets/arrow_left_main_gallery.jpg"
                    />
                </button>
            </div>
            <div class="flex h-full">
              <transition name="fade" mode="out-in">
              <img
                 class="m-auto max-h-96"
                 :src="currentElement.image"
                 v-if="currentElementIndex % 2 === 0"
                 key=0
                 rel="preload"
                 />
              <img
                 class="m-auto max-h-96"
                 :src="currentElement.image"
                 v-else
                 key=1
                 rel="preload"
                 />
              </transition>
            </div>
            <div class="absolute top-40 right-0">
                <button
                    @click="currentElementIndex++"
                    :disabled="reachedMaxRight"
                >
                    <img
                        src="/../storage/images/assets/arrow_right_main_gallery.jpg"
                    />
                </button>
            </div>
        </div>
        <!-- <ul id="example-1"> -->
        <!--     <li v-for="item in imgObj" :key="item.id"> -->
        <!--       <img :src="item.image" alt=""> -->
        <!--     </li> -->
        <!-- </ul> -->
    </div>
</template>

<script>
export default {
    props: {
        propGallery: {
            type: Array,
        },
    },
    data() {
        return {
            imgObj: this.propGallery,
            currentElementIndex: 0,
        };
    },
    computed: {
        prependUrl() {
            this.imgObj = this.imgObj.map((ele) => {
                ele.image = "/../storage/images/" + ele.image;
                return ele;
            });
        },
        currentElement() {
            return this.imgObj[this.currentElementIndex];
        },
        reachedMaxLeft() {
            return this.currentElementIndex === 0;
        },
        reachedMaxRight() {
            return this.currentElementIndex === this.imgObj.length - 1;
        },
    },
    created() {
        this.prependUrl;
    },
};
</script>
<style scoped>
.fade-enter-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
