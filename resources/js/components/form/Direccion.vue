<template>
  <div class="App"/>
</template>

<script>
import gmapsInit from './gmaps';

export default {
  async mounted() {
    try {
      const google = await gmapsInit();
      const geocoder = new google.maps.Geocoder();
      var locationRio = {lat: -22.915, lng: -43.197};
      const map = new google.maps.Map(this.$el, {
          zoom: 13,
          center: locationRio,
          gestureHandling: 'cooperative'
        });


    } catch (error) {
      console.error(error);
    }
  },
};
</script>

<style>
.App {
  width: 100%;
  height: 500px;
}
</style>