<template>
    <div id="products" class="pt-20" ref="container">
        <div class="relative w-full overflow-x">
            <div class="absolute z-10">
                <div class="cursor-pointer" @click="goLeft">
                    <img
                        class="h-24 opacity-90"
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
                        <img
                            v-if="index==currentElementIndex"
                            class="h-24 flex-none transform transition ease filter cursor-pointer border-8 border-yellow-300"
                            :src="item.image"
                            :style="styleTrafo"
                        />
                        <img
                            v-else
                            class="h-24 flex-none transform transition ease filter brightness-75 cursor-pointer hover:brightness-100"
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
                        class="h-24 opacity-90"
                        src="/../storage/images/assets/arrow_right_gallery.jpg"
                    />
                </button>
            </div>
        </div>
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
            // styleTrafo: { "--tw-translate-x": -4640+1838-38.39+"px" },
            // styleTrafo: { "--tw-translate-x": -1657 + 38.39 + "px" },
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
                console.log(this.clickDict[this.clickCounter - 1]);
                this.styleTrafo["--tw-translate-x"] =
                    this.clickDict[this.clickCounter - 1] + "px";
                this.clickCounter -= 1;
                this.carouselEnd = false;
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
                // console.log(clickWith);
                if (clickWith > item) {
                    // console.log(item);
                    finalWidth = item - 38.39;
                    return true;
                }
            });
            if (-finalWidth < -maxTransl) {
                this.clickDict[this.clickCounter] = -maxTransl;
                console.log(this.clickDict[this.clickCounter]);
                this.styleTrafo["--tw-translate-x"] = -maxTransl + "px";
                console.log(this.clickDict);
                this.clickcounter -= 1;
                this.carouselEnd = true;
            } else {
                this.clickDict[this.clickCounter] = -finalWidth;
                console.log(this.clickDict[this.clickCounter]);
                this.styleTrafo["--tw-translate-x"] = -finalWidth + "px";
            }
        },
    },
    created() {
        this.prependUrl;
        // console.log(window.innerWidth);
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
