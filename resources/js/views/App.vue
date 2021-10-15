<template>
  <div>
    <div class="preload w-100 vh-100 d-flex flex-column justify-content-center align-items-center position-fixed">
      <div class="fw-bold buffering fs-5">Caricamento...</div>
      <img src="/images/metamorphosis.gif" alt="food">
      <!-- <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div> -->
    </div>
    <div>
      <Header/>
      <Jumbotron v-if="$route.meta.requiresJumbotron"/>
      <main>
        <!-- rendering -->
        <router-view></router-view>
      </main>
      <Footer/>
    </div>
  </div>
</template>

<script>
import Header from '../partials/Header.vue';
import Jumbotron from '../partials/Jumbotron.vue';
import Affiliati from '../partials/Affiliati.vue';
import Footer from '../partials/Footer.vue';

export default {
  name: 'App',
    components: {
    Header,
    Jumbotron,
    Affiliati,
    Footer,
    }
}

window.addEventListener('load', () => {
  const preload = document.querySelector('.preload');
  preload.classList.add('preload-finish');
})

</script>

<style lang="scss">
@import 'resources/sass/_variables.scss';
*{
  font-family: 'Comfortaa', cursive;
}

.preload{
  top: 0;
  background-color: $yellow;
  z-index: 1500;
  transition: opacity 0.5s ease;

  .buffering{
    color: $blue;
  }

  img{
    width: 250px;
  }
}


.preload-finish{
  opacity: 0;
  pointer-events: none;
}

// .lds-ellipsis {
//   display: inline-block;
//   position: relative;
//   width: 80px;
//   height: 80px;
// }
// .lds-ellipsis div {
//   position: absolute;
//   top: 33px;
//   width: 13px;
//   height: 13px;
//   border-radius: 50%;
//   background: $blue;
//   animation-timing-function: cubic-bezier(0, 1, 1, 0);
// }
// .lds-ellipsis div:nth-child(1) {
//   left: 8px;
//   animation: lds-ellipsis1 0.6s infinite;
// }
// .lds-ellipsis div:nth-child(2) {
//   left: 8px;
//   animation: lds-ellipsis2 0.6s infinite;
// }
// .lds-ellipsis div:nth-child(3) {
//   left: 32px;
//   animation: lds-ellipsis2 0.6s infinite;
// }
// .lds-ellipsis div:nth-child(4) {
//   left: 56px;
//   animation: lds-ellipsis3 0.6s infinite;
// }
// @keyframes lds-ellipsis1 {
//   0% {
//     transform: scale(0);
//   }
//   100% {
//     transform: scale(1);
//   }
// }
// @keyframes lds-ellipsis3 {
//   0% {
//     transform: scale(1);
//   }
//   100% {
//     transform: scale(0);
//   }
// }
// @keyframes lds-ellipsis2 {
//   0% {
//     transform: translate(0, 0);
//   }
//   100% {
//     transform: translate(24px, 0);
//   }
// }


</style>

