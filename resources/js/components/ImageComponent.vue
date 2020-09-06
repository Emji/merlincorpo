<template>
  <div>
    <lightbox v-if="lightbox" class="lightbox-square" :Img="random"></lightbox>
    <div v-else class="row">
      <div v-for="(picture,index) in pictures" :key="index" class="col-3">
        <img
          @click="tell"
          ref="picture.image"
          class="portfolio-img"
          :src="'/storage/photo/'+picture.image"
          alt
        />
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import lightbox from "./lightbox";

export default {
  components: {
    lightbox,
  },
  data() {
    return {
      pictures: [],
      index: "",
      random: "",
      lightbox: false,
    };
  },
  methods: {
    tell: function (event, index) {
      console.log(event.target.src);
      this.random = event.target.src;
      this.lightbox = true;
    },
  },
  mounted() {
    axios.get("/pictures").then((response) => {
      this.pictures = response.data;
    });
  },
};
</script>
<style lang="sass">
.lightbox-square
  background-color: red
  width: 100vw
  height: 100vh
  position: relative
  left: 0
  top: 0
  z-index: 9999999
</style>