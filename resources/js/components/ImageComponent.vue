<template>
  <div class="row">
    <div v-for="(picture,index) in pictures" :key="index" class="col-3">
      <img class="portfolio-img" :src="'/storage/photo/'+picture.image" alt />
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      pictures: "",
      index: "",
    };
  },
  methods: {},
  mounted() {
    axios.get("/pictures").then((response) => {
      this.pictures = response.data;
    });
  },
};
</script>
<style lang="sass">
.portfolio-img
  width: 100%
  height: auto
</style>