<template>
  <div class="container">
    <form>
      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="name" class="form-control" id="name" required>
      </div>
      <div class="mb-3">
        <label for="lastname" class="form-label">Cognome</label>
        <input type="lastname" class="form-control" id="lastname" required>
      </div>
      <input id="pac-input">
      <button type="submit" class="btn btn-primary">Salva</button>
    </form>
  </div>
</template>

<script>
import initMap from '../googlemaps.js';

export default {
  name: 'Checkout',
  data(){
    return {
      //
    }
  },
  mounted(){
    // API Google
    let googlemaps = document.createElement('script');
    googlemaps.setAttribute('src', "https://maps.googleapis.com/maps/api/js?key=AIzaSyDvVNeZeFGMSHvpISRfYdY68X5EMs2V7Yg&libraries=places&callback=initMap");
    googlemaps.setAttribute('async', "");
    document.head.appendChild(googlemaps);

    // Set function maps
    let funcMap = document.createElement('script');
    funcMap.innerHTML = initMap;
    document.body.appendChild(funcMap);

  }
}
</script>

<style>

</style>