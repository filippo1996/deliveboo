<template>
  <div class="jumbo position-relative">
    <div class="jumbo-img w-100">
      <div class="container pt-5">
        <div class="row text-center">
          <div class="col-10 col-md-9 col-xl-6 m-auto">
            <input v-model="search" type="text" placeholder="Cerca i tuoi locali preferiti" class="border-0 text-light text-center">
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
            <div class="position-relative w-100 smoke-container">
              <img src="/images/smoke.png" alt="smoke" class="smoke position-absolute">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="street d-flex">
      <div id="linea"></div>
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
  height: 33rem;
  background-color: rgb(133, 193, 255);
  overflow: hidden;

  .jumbo-img{
    height: calc(100% - 30px);
    background: url('/images/background.png');
    background-position: 60% 0;
    background-size: cover;
    background-repeat:no-repeat;
    animation-name: jumbo;
    animation-timing-function: ease-in-out;
    animation-fill-mode: forwards;
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
        bottom: 7px;
        right: -27px;
        animation-duration: 2s;
        animation-name: delivery-man;
        animation-timing-function: ease-in-out;
        animation-fill-mode: forwards;
        z-index: 100;
      }

      .smoke-container{
        .smoke{
          top: 0px;
          animation-delay: 0.7s;
          animation-duration: 1.7s;
          animation-name: smoke;
          animation-timing-function: ease-in-out;
          animation-fill-mode: forwards;
          opacity: 0;
          z-index: 99;
        }
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

}

.street{
  height: 30px;
  width: 150%;
  position: absolute;
  bottom: 0;
  background-color: rgb(167, 167, 167);
  overflow: hidden;

  #linea{
    overflow: hidden;
    width: 100%;
    height: 4px;
    position: relative;
    top: 10px;
    left: -80px;
    animation-name: linea;
    animation-duration: 2s;
    animation-timing-function: ease-in-out;
    animation-fill-mode: forwards;
    background: repeating-linear-gradient(to right,white 0,white 40px,transparent 10px,transparent 80px);
  }
}

//        ---------------  animazione media query  ---------------
@media screen and (min-width: 0px) and (max-width: 575px) {
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
      0% { background-position: 60% 0 };
      100% { background-position: 55% 0 };
    }

    @keyframes delivery-man {
      from {right: -27px};
      to {right: 120px};
    }
  }

  @keyframes linea {
      0% {left: -80px};
      100% {left: 30px};
  }
}

@media screen and (min-width: 768px) and (max-width: 1200px) {
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
      0% { background-position: 60% 0 };
      100% { background-position: 50% 0 };
    }

    @keyframes delivery-man {
      from {right: -27px};
      to {right: 180px};
    }

    @keyframes smoke {
      0% {right: 50px; top: -45px; opacity: 0; transform: scale(0.8);};
      50% {opacity: 1; transform: scale(1.2);}
      100% {right: 0; top: -60px; opacity: 0; transform: scale(1.4);};
    }
  }

  @keyframes linea {
      0% {left: -80px};
      100% {left: 30px};
  }
}

@media screen and (min-width: 1200px) {
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
      0% {right: 120px; top: -45px; opacity: 0; transform: scale(0.8);};
      50% {opacity: 1; top: -50px; transform: scale(1.2);};
      100% {right: 10px; top: -55px; opacity: 0; transform: scale(1.4);};
    }
  }

  @keyframes linea {
      0% {left: -80px};
      100% {left: 10px};
  }
}

@media screen and (min-width: 1400px) {
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
      0% { background-position: 60% 0 };
      100% { background-position: 50% 0 };
    }

    @keyframes delivery-man {
      from {right: -27px};
      to {right: 300px};
    }
    
    @keyframes smoke {
      0% {right: 100px; top: -60px; opacity: 0; transform: scale(0.8)};
      50% {opacity: 1; top: -65px; transform: scale(1.1)};
      100% {right: 10px; top: -70px; opacity: 0; transform: scale(1.4)};
    }
  }

  @keyframes linea {
    0% {left: -80px};
    100% {left: 10px};
  }
}

</style>