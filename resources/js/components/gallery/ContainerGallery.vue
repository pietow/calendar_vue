<template>
    <div id="products" class="box">
        <!-- <h1>{{ propGallery[0].image }}</h1> -->
        <!-- <img :src="imgObj[0].image" /> -->
        <!-- <img src="/../storage/images/blog/bio.jpg" /> -->
        <ul id="example-1">
            <li v-for="item in imgObj" :key="item.id">
              <img :src="item.image" alt="">
                
            </li>
        </ul>
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
    created() {
        this.prependUrl;
    },
};
</script>
