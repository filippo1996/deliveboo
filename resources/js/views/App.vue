<template>
  <div>
    <Header/>
    <Jumbotron v-if="$route.meta.requiresJumbotron"/>
    <main>
      <!-- rendering -->
      <router-view></router-view>
    </main>
    <Footer/>
  </div>
</template>

<script>
import Header from '../partials/Header.vue';
import Jumbotron from '../partials/Jumbotron.vue';
import Footer from '../partials/Footer.vue';

export default {
  name: 'App',
    components: {
    Header,
    Jumbotron,
    Footer,
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

</style>

