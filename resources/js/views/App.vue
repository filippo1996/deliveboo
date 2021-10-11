<template>
  <div>
    <Header/>
    <Jumbotron v-if="$route.meta.requiresJumbotron"/>
    <main>
      <!-- rendering -->
      <router-view></router-view>
    </main>
    <ContactUs/>
    <Footer/>
  </div>
</template>

<script>
import Header from '../partials/Header.vue';
import Jumbotron from '../partials/Jumbotron.vue';
import Affiliati from '../partials/Affiliati.vue';
import ContactUs from '../partials/ContactUs.vue';
import Footer from '../partials/Footer.vue';

export default {
  name: 'App',
    components: {
    Header,
    Jumbotron,
    Affiliati,
    ContactUs,
    Footer,
    }
}
</script>

<style lang="scss">
@import 'resources/sass/_variables.scss';
*{
  font-family: 'Comfortaa', cursive;
}

</style>

