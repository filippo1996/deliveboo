<template>
  <div>
    <div class="preload w-100 vh-100 d-flex flex-column justify-content-center align-items-center position-fixed">
      <div class="fw-bold buffering fs-5">Caricamento...</div>
      <img src="/images/metamorphosis.gif" alt="food">
    </div>
    <div>
      <Header :items="AboutUs"/>
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
  },
  created(){
    window.addEventListener('load', () => {
      const preload = document.querySelector('.preload');
      preload.classList.add('preload-finish');
    });
  },
  watch: {
    $route: {
      immediate: true,
      handler(to, from) {
        document.title = to.meta.title || 'Deliveboo';
      }
    },
  }
}
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

</style>

