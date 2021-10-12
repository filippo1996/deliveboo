<template>
  <div class="container mt-5">
    <form>
      <div class="mb-3 pt-5">
        <label for="name" class="form-label">Nome</label>
        <input type="name" class="form-control" id="name" required>
      </div>
      <div class="mb-3">
        <label for="lastname" class="form-label">Cognome</label>
        <input type="lastname" class="form-control" id="lastname" required>
      </div>
      <div id="infowindow-content">
        <input type="hidden" id="street_number">
        <input type="hidden" id="route">
        <input type="hidden" id="locality">
        <input type="hidden" id="country">
        <input type="hidden" id="postal_code">
      </div>
      <div class="mb-3">
        <label for="pac-input" class="form-label">Indirizzo di spedizione</label>
        <input class="form-control" type="text" id="pac-input" name="pac-input" placeholder="Inserisci la tua via">
        <div id="map"></div>
      </div>

      <div class="mb-3">
        <div class="bottone btn me-2">
          <router-link 
            class="text-reset text-decoration-none" 
            :to="{name: 'payment'}">{{ 'payment' }}
          </router-link>
        </div>

        <button class="btn bottone" 
            @click.prevent="saveAddress">Salva Indirizzo
        </button>
      </div>

    </form>
  </div>
</template>

<script>
import initMap from '../googlemaps.js';

export default {
  name: 'Checkout',
  data(){
    return {
      name: '',
      lastname: '',
      street_number: '',
      route: '',
      locality: '',
      country: '',
      postal_code: ''
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

  },
  methods:{
    saveAddress(){
      let values = {
        name: 'Il nome',
        lastname: 'Il cognome',
        route: 'La via',
        street_number: 'Il numero civico',
        locality: 'La città',
        country: 'Lo stato',
        postal_code: 'Il codice postale'
      };

      const address = {};

      for(const key of Object.keys(values)){
        let input = document.querySelector(`#${key}`);
        if(input.value){
          this[key] = input.value;
          address[key] = this[key];
        } else {
          alert(values[key] + ' non è presente, si prega di inserirlo.');
          return;
        }
      }
      
      localStorage.setItem('address', JSON.stringify(address));

    }
  }
}
</script>

<style lang="scss" scoped>
#map {
  height: 500px;
}

#pac-input{
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
  font-size: 15px;
  border-radius: 3px;
  border: 0;
  margin-top: 10px;
  width: 30%;
  height: 40px;
  text-overflow: ellipsis;
  padding: 0 1em;
  position: absolute;
  left: 35%;
}

</style>