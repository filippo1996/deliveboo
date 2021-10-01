<template>
  <div>
    <Header/>
    <Jumbotron/>
    <Main/>
  </div>
</template>

<script>
import Header from '../traits/Header.vue';
import Jumbotron from '../traits/Jumbotron.vue';
import Main from '../traits/Main.vue';

export default {
  name: 'App',
    components: {
    Header,
    Jumbotron,
    Main,
    }
}
</script>

<style lang="scss" scoped>

</style>

