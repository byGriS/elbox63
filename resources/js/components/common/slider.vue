<template>
  <div>
    <splide class="header-slider" :options="sliderOptions">
      <splide-slide v-for="image in images" :key="image.id">
        <div
          class="image"
          :style="'background-image: url(' + image.src + ');'"
        ></div>
      </splide-slide>
    </splide>
  </div>
</template>

<script>
import { Splide, SplideSlide } from "@splidejs/vue-splide";
import "@splidejs/splide/dist/css/themes/splide-default.min.css";

export default {
  props: ["images"],
  components: { Splide, SplideSlide },
  data() {
    return {
      sliderOptions: {
        rewind: true,
        autoplay: true,
        pagination: true,
        cover: true,
        interval: 3000,
        perPage: 1,
        perMove: 1,
        gap: 5,
        padding: 15,
        arrows: true,
      },
    };
  },
  beforeMount() {
    if (this.images.length < 2) {
      this.sliderOptions.arrows = false;
       this.sliderOptions.pagination = false;
    }
  },
};
</script>

<style scoped>
.image {
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
  height: 300px;
  width: 100%;
}
</style>