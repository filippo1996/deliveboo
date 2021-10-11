<template>
  <div class="jumbo position-relative">
    <div class="h-100 w-100">
      <div class="container pt-5">
        <div class="row text-center">
          <div class="col-10 col-md-9 col-xl-6 m-auto">
            <input v-model="search" type="text" placeholder="Cerca i prodotti dei tuoi locali preferiti" class="border-0 text-light text-center">
          </div>
          <Search v-if="search" :word="search"/>
        </div>
        <div class="row clearfix">
          <div class="jumbo-text d-sm-block col-sm-6 position-absolute">
            <div class="title">
              Consegniamo la felicità
            </div>
            <div class="subtitle my-2">
              Il cibo che ami direttamente a casa tua
            </div>
          </div>
          <div class="col-10 col-sm-6 position-absolute scooter me-4">
            <div class="position-relative w-100 h-100">
              <img src="/images/scooter.png" alt="scooter" class="bike position-absolute">
            </div>
            <div class="position-relative w-100 h-100 smoke-container">
              <img src="/images/smoke.png" alt="smoke" class="smoke position-absolute">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- lo so che è osceno non giudicatemi, poi lo sistemo vvb :))) -->
    <div class="street d-flex">
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
      <div class="linea"></div>
    </div>
  </div>
</template>

<script>
import Search from '../components/Search.vue';

export default {
  name: "Jumbotron",
  components:{
    Search
  },
  data(){
    return {
      search: null
    }
  },
  methods:{
    searchUrl(active){
      let url = new URL(window.location.href);
      if(active){
        url.searchParams.set('search', this.search);
        window.history.replaceState({foo: 'search'}, 'Search', url.search);
      }
      let word = url.searchParams.get('search');
      this.search = word;

      if(!word) window.history.replaceState({foo: 'search'}, 'Search', "/");
    }
  },
  created(){
    this.searchUrl(false);
  },
  watch:{
    search: function(){
      this.searchUrl(true);
    }
  }
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

.jumbo{
  height: 30rem;
  background-color: rgb(133, 193, 255);
  background: url('/images/background.png');
  background-size: cover;
  // background-position: 70% 0;
  background-repeat:no-repeat;
  animation-name: jumbo;
  animation-timing-function: ease-in-out;
  animation-fill-mode: forwards;
  animation-delay: 2s;
  animation-duration: 2s;

  .jumbo-text{
    font-family: 'Comfortaa', cursive;
    top: 140px;
    float: left;
    padding-right: 100px;
    font-style: oblique;
    color: white;

    .subtitle{
      font-size: clamp(0.5rem, 3vw, 1.5rem);
    }
  }

  .scooter{
    height: 270px;
    bottom: 0;
    right: 0;

    .bike{
      bottom: -20px;
      right: -27px;
      animation-delay: 2s;
      animation-duration: 2s;
      animation-name: delivery-man;
      animation-timing-function: ease-in-out;
      animation-fill-mode: forwards;
      z-index: 100;
    }

    .smoke{
      top: -20px;
      animation-delay: 2.7s;
      animation-duration: 1.7s;
      animation-name: smoke;
      animation-timing-function: ease-in-out;
      animation-fill-mode: forwards;
      opacity: 0;
      z-index: 99;
    }
  }

  input{
    width: 85%;
    background-color: #41708e;
    outline: none;
    border-radius: 20px;
    font-size: 17px;
    text-transform: capitalize;
    transition: 0.2s;
    height: 42px;
    margin-top: 35px;

    &:hover{
      transition: 0.5s;
      width: 100%;
      transform: scale(1.1);
      outline: none;
    }

    &::placeholder{
      color: rgba(255, 255, 255, 0.815);
      font-size: .8rem;
    }
  }
}

.street{
  height: 30px;
  width: 100%;
  background-color: rgb(167, 167, 167);
  overflow-x: hidden;

  .linea{
    width: 20px;
    height: 4px;
    background-color: white;
    margin-right: 20px;
    position: relative;
    top: 5px;
    flex-shrink: 0;
    overflow-x: hidden;
  }
}

//        ---------------  animazione media query  ---------------
@media screen and (min-width: 0px) and (max-width: 575px) {
  .jumbo{
    background-position: 45% 0;
  }

  .title{
    font-size: 30px;
  }

  .subtitle{
    display: none;
  }

  .scooter{
    .bike{
      height: 230px;
    }

    .smoke-container{
      display: none;
    }
  }
}

@media screen and (min-width: 575px) and (max-width: 768px ){
  .jumbo{
    background-position: 30% 0;
  }

  .title{
    font-size: 30px;
  }

  .subtitle{
    display: none;
  }

  .scooter{
    .bike{
      height: 300px;
    }
    
    .smoke-container{
      display: none;
    }

    @keyframes jumbo{
      0% { background-position: 30% 0 };
      100% { background-position: 20% 0 };
    }

    @keyframes delivery-man {
      from {right: -27px};
      to {right: 120px};
    }

    @keyframes smoke {
      0% {right: 0; bottom: -40px};
      100% {right: 80px; bottom: -42px};
      from {right: 0; bottom: -40px};
      to {right: 80px; bottom: -42px};
    }
  }
}

@media screen and (min-width: 768px) and (max-width: 1200px) {
  .jumbo{
    background-position: 50% 0;
  }

  .title{
    font-size: 30px;
  }

  .subtitle{
    padding-right: 120px;
    display: block;
  }

  .scooter{
    .bike{
      height: 320px;
    }

    .smoke{
      height: 40px;
    }

    @keyframes jumbo{
      0% { background-position: 50% 0 };
      100% { background-position: 40% 0 };
    }

    @keyframes delivery-man {
      from {right: -27px};
      to {right: 180px};
    }

    @keyframes smoke {
      0% {right: 50px; opacity: 0; transform: scale(0.8);};
      50% {opacity: 1; transform: scale(1.2);}
      100% {right: 0; top: -30px; opacity: 0; transform: scale(1.4);};
    }
  }
}

@media screen and (min-width: 1200px) {
  .jumbo{
    background-position: 60% 0;
  }

  .title{
    font-size: 42px;
  }

  .subtitle{
    display: block;
  }

  .scooter{
    .bike{
      height: 320px;
    }

    .smoke{
      height: 40px;
    }

    @keyframes jumbo{
      0% { background-position: 60% 0 };
      100% { background-position: 50% 0 };
    }

    @keyframes delivery-man {
      from {right: -27px};
      to {right: 270px};
    }

    @keyframes smoke {
      0% {right: 100px; opacity: 0; transform: scale(0.8);};
      50% {opacity: 1; top: -25px; transform: scale(1.2);};
      100% {right: 10px; top: -27px; opacity: 0; transform: scale(1.4);};
    }
  }
}

@media screen and (min-width: 1400px) {
  .jumbo{
    background-position: 70% 0;
  }

  .subtitle{
    display: block;
  }

  .scooter{
    .bike{
      height: 320px;
    }

    .smoke{
      height: 50px;
    }

    @keyframes jumbo{
      0% { background-position: 70% 0 };
      100% { background-position: 60% 0 };
    }

    @keyframes delivery-man {
      from {right: -27px};
      to {right: 300px};
    }
    
    @keyframes smoke {
      0% {right: 100px; top: -27px; opacity: 0; transform: scale(0.8)};
      50% {opacity: 1; top: -33px; transform: scale(1.1)};
      100% {right: 10px; top: -40px; opacity: 0; transform: scale(1.4)};
    }
  }
}

</style>