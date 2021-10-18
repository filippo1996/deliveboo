<template>
  <section class="pb-3">
    <div class="container mt-5 bg-color">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-8">
          <form @submit.prevent="saveAddress">
          <div class="col-12 col-md-6 mb-3 pt-5">
            <input type="name" class="form-control" id="name" placeholder="Nome" required>
          </div>
          <div class="col-12 col-md-6 mb-3">
            <input type="name" class="form-control" id="lastname" placeholder="Cognome" required>
          </div>
          <div class="col-12 col-md-6 mb-3">
            <input type="email" class="form-control" id="email" placeholder="Email" required>
          </div>
          <div class="col-12 col-md-6 mb-3">
            <input minlength="10" maxlength="10" type="name" placeholder="Numero di telefono" class="form-control" id="phone_number" required>
          </div>

          <div class="col-12 mt-4" id="infowindow-content">
            <input type="hidden" id="street_number">
            <input type="hidden" id="route">
            <input type="hidden" id="locality">
            <input type="hidden" id="country">
            <input type="hidden" id="postal_code">
          </div>
          <div class="mb-3 col-12 col-md-9">
            <label for="pac-input" class="form-label">Indirizzo di spedizione</label>
            <input class="form-control" type="text" id="pac-input" name="pac-input" placeholder="Inserisci la tua via" required>
            <div id="map" class="w-100"></div>
          </div>
          <div>
            <button class="btn bottone text-decoration-none">Salva Indirizzo</button>
          </div>
        </form>
        </div>


        <div class="col-12 col-md-12 col-lg-4 my-3" v-if="'name' in statusAddress">
          <div class="mb-2">Il tuo Indirizzo</div>
          <div class="card">
            <div class="card-body text-black w-100">
              <p class="card-text">Nome: {{ name}} </p>
              <p class="card-text">Cognome: {{ lastname }} </p>
              <p class="card-text">Email: {{ email }} </p>
              <p class="card-text">Telefono {{ phone_number }} </p>
              <p class="card-text">Indirizzo: {{ route }}, {{ street_number }}</p>
              <p class="card-text">Città: {{ locality }} </p>
              <p class="card-text">CAP: {{ postal_code }} </p>
              <p class="card-text">Stato: {{ country }} </p>
            </div>
          </div>
          
          <div class="bottone btn me-2 my-2">
            <router-link 
              class="text-reset text-decoration-none" 
              :to="{name: 'payment'}">{{ 'Pagamento' }}
            </router-link>
          </div>
        </div>

      </div>
    </div>
    <!-- <div ref="googleMaps"></div> -->
  </section>
</template>

<script>
import initMap from '../googlemaps.js';

export default {
  name: 'Checkout',
  data(){
    return {
      name: '',
      lastname: '',
      email: '',
      phone_number: '',
      street_number: '',
      route: '',
      locality: '',
      country: '',
      postal_code: '',
      statusAddress: {}
    }
  },
  created(){
    const modal = document.querySelector('.modal-open');
    if(modal) {
      modal.style = null;
      modal.classList.remove('modal-open');
      document.querySelector('.modal-backdrop.fade.show').remove();
    }
  },
  mounted(){
    this.removeGoogleMapScript();
    // API Google
    let googlemaps = document.createElement('script');
    googlemaps.setAttribute('src', "https://maps.googleapis.com/maps/api/js?key=AIzaSyDvVNeZeFGMSHvpISRfYdY68X5EMs2V7Yg&libraries=places&callback=initMap");
    googlemaps.setAttribute('defer', "");
    document.head.appendChild(googlemaps);
    
    // Set function maps
    let funcMap = document.createElement('script');
    funcMap.setAttribute('id', "initMap");
    funcMap.innerHTML = initMap;
    document.body.appendChild(funcMap);
    //this.$refs.googleMaps.appendChild(funcMap);

    // get address
    this.getAddress();

  },
  methods: {
    saveAddress(){
      // messagge error
      let values = {
        name: 'Il nome',
        lastname: 'Il cognome',
        email: 'La mail',
        phone_number: 'Il numero di telefono',
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
          address[key] = input.value;
        } else {
          //alert(values[key] + ' non è presente, si prega di inserirlo.');
          customMessage('alert', 'Campo mancante!', `${values[key]} non è presente, si prega di inserirlo.`);
          return;
        }
      }

      localStorage.setItem('address', JSON.stringify(address));
      // set variable address
      this.getAddress();
    },
    getAddress(){
      let address = JSON.parse(localStorage.getItem('address')) || {};
      this.name = address.name;
      this.lastname = address.lastname;
      this.email = address.email;
      this.phone_number = address.phone_number;
      this.street_number = address.street_number;
      this.route = address.route;
      this.locality = address.locality;
      this.country = address.country;
      this.postal_code = address.postal_code;
      this.statusAddress = address;
    },
    removeGoogleMapScript(){
      const keyword = 'maps.googleapis.com';
      //Remove google from BOM (window object)
      window.google = undefined;
      //Remove google map scripts from DOM
      let scripts = document.head.querySelectorAll(`script[src*='${keyword}']`);
      scripts.forEach(element => element.remove());
      // Remove script init Map
      let script = document.getElementById('initMap');
      script?.remove();
    }
  }
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

#map {
  height: 500px;
}

#pac-input{
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
  font-size: 15px;
  border-radius: 3px;
  border: 0;
  margin-top: 10px;
  width: 50%;
  height: 40px;
  text-overflow: ellipsis;
  padding: 0 1em;
  position: absolute;
  left: 25%;
}

section{
  background-color: #6FA3D6;
  color: white;

  .bottone{
    background-color: $blue;

    &:hover{
      background-color: #5087aa;
    }
  }
}

</style>