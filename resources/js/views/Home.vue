<template>
  <section>
    <div>
      <div class="container py-5">
        <div class="row justify-content">
          <Card :items="restaurants"/>
        </div>
        <!-- start category -->
        <Category />
        <!-- end category -->
      </div>
      <div>
        <Affiliati />
      </div>
      <div>
        <ContactUs />
      </div>
    </div>
  </section>
</template>

<script>
import Card from '../components/Card.vue';
import Affiliati from '../partials/Affiliati.vue';
import ContactUs from '../partials/ContactUs.vue';
import Category from '../views/Category.vue';

export default {
  name: "Main",
  components: {
    Card,
    Affiliati,
    ContactUs,
    Category,
  },
  data(){
    return{
      apiUrl: '/api/restaurants',
      restaurants: [],
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
@import 'resources/sass/_variables.scss';

section{
  background-color: $yellow;
}


</style>