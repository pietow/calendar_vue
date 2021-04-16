<template>
    <div id="products" class="pt-20 mb-12" ref="container">
        <div class="relative w-full ">
            <div class="absolute z-10">
                <div class="cursor-pointer" @click="goLeft">
                    <img
                        class="h-24 opacity-90 my-2"
                        src="/../storage/images/assets/arrow_left_gallery.jpg"
                    />
                </div>
            </div>

            <div class="absolute z-0" ref="carousel">
                <div class="inline-flex w-auto overflow-hidden">
                    <div
                        class="w-max"
                        v-for="(item, index) in imgObj"
                        :key="item.id"
                        ref="imgs"
                    >
                        <div
                            v-if="index == currentElement.index"
                            class="flex-none transform transition ease-out duration-700 border-t-8 border-gray-100"
                            :style="styleTrafo"
                        >
                            <img
                                class="h-24 filter cursor-pointer border-8 border-secondary"
                                :src="item.image"
                            />
                            <span
                                style="background: rgba(0, 0, 0, 0) url(/../storage/images/assets/arrow-image-frame.png) no-repeat scroll 0 0; left:calc(50% - 13px)"
                                class="absolute -top-2 w-1/2 h-1/2 -ml-0.5 z-20"
                            ></span>
                        </div>

                        <img
                            v-else
                            @click="currentElement.index = index"
                            class="h-24 my-2 flex-none transform transition ease-out duration-700 filter brightness-75 cursor-pointer hover:brightness-100"
                            :src="item.image"
                            :style="styleTrafo"
                        />
                    </div>
                </div>
            </div>

            <div class="absolute top-0 right-0 z-10">
                <button
                    class=""
                    @click="goRight"
                    :disabled="carouselEnd"
                    style="outline:none"
                >
                    <img
                        class="h-24 my-2 opacity-90"
                        src="/../storage/images/assets/arrow_right_gallery.jpg"
                    />
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { store } from "../../store/carousel_store.js";

export default {
    props: {
        propGallery: {
            type: Array,
        },
    },
    data() {
        return {
            imgObj: this.propGallery,
            currentElement: store.state,
            styleTrafo: { "--tw-translate-x": "38.39px" },
            clickCounter: 0,
            clickDict: { 0: "38.39" },
            carouselEnd: false,
        };
    },
    computed: {
        prependUrl() {
            this.imgObj = this.imgObj.map((ele) => {
                ele.image = "/../storage/images/" + ele.image;
                return ele;
            });
        },
    },
    watch: {
        "currentElement.index": function(id) {
            this.moveCarousel(id);
        },
    },

    methods: {
        arrWidth() {
            let dummy = 0;
            let imgWidth = [];
            this.$refs.imgs.forEach((item, index) => {
                dummy += item.clientWidth;
                imgWidth[index] = dummy;
            });
            return imgWidth;
        },
        goLeft() {
            if (this.clickCounter > 0) {
                this.styleTrafo["--tw-translate-x"] =
                    this.clickDict[this.clickCounter - 1] + "px";
                this.clickCounter -= 1;
                this.carouselEnd = false;
            }
        },
        moveCarousel(id) {
            let divWidth = this.$refs.container.clientWidth;
            let imgWidth = this.arrWidth()[id];
            const clickWith = (fac) =>
                (this.clickCounter + fac) * (divWidth - 2 * 38.39);
            if (clickWith(1) < imgWidth) {
                this.goRight();
            } else if (clickWith(0) > imgWidth) {
                this.goLeft();
            }
        },
        goRight() {
            this.clickCounter += 1;
            let divWidth = this.$refs.container.clientWidth;
            let carouselWidth = this.$refs.carousel.clientWidth;
            let maxTransl = carouselWidth - divWidth + 38.39;
            let imgWidth = this.arrWidth();
            let finalWidth = 0;

            imgWidth.every((item, index) => {
                let clickWith = this.clickCounter * (divWidth - 2 * 38.39);
                if (clickWith > item) {
                    finalWidth = item - 38.39;
                    return true;
                }
            });
            if (-finalWidth < -maxTransl) {
                this.clickDict[this.clickCounter] = -maxTransl;
                this.styleTrafo["--tw-translate-x"] = -maxTransl + "px";
                this.clickcounter -= 1;
                this.carouselEnd = true;
            } else {
                this.clickDict[this.clickCounter] = -finalWidth;
                this.styleTrafo["--tw-translate-x"] = -finalWidth + "px";
            }
        },
    },
    created() {
        this.prependUrl;
    },
};
</script>

<style scoped>
.fade-enter-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
