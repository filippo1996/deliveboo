<template>
  <div>
    <Header/>
    <Jumbotron/>
    <Main/>
    <Footer/>
  </div>
</template>

<script>
import Header from '../traits/Header.vue';
import Jumbotron from '../traits/Jumbotron.vue';
import Main from '../traits/Main.vue';
import Footer from '../traits/Footer.vue';

export default {
  name: 'App',
    components: {
    Header,
    Jumbotron,
    Main,
    Footer,
    }
}
</script>

<style lang="scss" scoped>

</style>

