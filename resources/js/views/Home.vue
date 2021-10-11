<template>
  <section>
    <div class="container py-5">
      <!-- category -->
      <Tag/>
      <!-- end category -->
      <div class="row justify-content">
        <Card :items="restaurants"/>
      </div>
    </div>
    <div>
      <Affiliati />
    </div>
  </section>
</template>

<script>
import Tag from '../components/Tag.vue';
import Card from '../components/Card.vue';
import Affiliati from '../partials/Affiliati.vue';

export default {
  name: "Main",
  components: {
    Tag,
    Card,
    Affiliati,
  },
  data(){
    return{
      apiUrl: '/api/restaurants',
      restaurants: []
    }
  },
  created(){
    this.getRestaurant();
  },
  methods: {
    getRestaurant(){
      axios.get(this.apiUrl)
      .then(resp => {
        this.restaurants= resp.data.results;
      })
    }
  }
}
</script>

<style lang="scss" scoped>
section{
  background-color: #ffd670;
}
</style>