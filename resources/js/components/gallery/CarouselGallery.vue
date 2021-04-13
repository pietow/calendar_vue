<template>
    <div id="products" class="pt-20" ref="container">
        <div class="relative w-full overflow-x">
            <div class="absolute z-10">
                <div
                    class="cursor-pointer"
                    @click="widthCurrentElement"
                    :disabled="reachedMaxLeft"
                >
                    <img
                        class="h-24 opacity-90"
                        src="/../storage/images/assets/arrow_left_gallery.jpg"
                    />
                </div>
            </div>

            <div class="absolute z-0">
                <div class="inline-flex w-auto overflow-hidden">
                    <div
                        class="w-max"
                        v-for="item in imgObj"
                        :key="item.id"
                        ref="imgs"
                    >
                        <img
                            class="h-24 flex-none transform"
                            :src="item.image"
                            style="--tw-translate-x: 38.39px;"
                        />
                    </div>
                </div>
            </div>

            <div class="absolute top-0 right-0 z-10">
                <div
                    class="cursor-pointer"
                    @click="currentElementIndex++"
                    :disabled="reachedMaxRight"
                >
                    <img
                        class="h-24 opacity-90"
                        src="/../storage/images/assets/arrow_right_gallery.jpg"
                    />
                </div>
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
        widthCurrentElement() {
            console.log();
            console.log();
            let divWidth = this.$refs.container.clientWidth;
            let dummy = 0;
            this.$refs.imgs.every((item, index) => {
                dummy += item.clientWidth;
                if (dummy < divWidth) {
                    console.log(dummy)
                    return true;
                }
            });
        },
    },
    created() {
        this.prependUrl;
        console.log(window.innerWidth);
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
