<template>
  <section>
    <div>
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
      <div>
        <ContactUs />
      </div>
    </div>
  </section>
</template>

<script>
import Tag from '../components/Tag.vue';
import Card from '../components/Card.vue';
import Affiliati from '../partials/Affiliati.vue';
import ContactUs from '../partials/ContactUs.vue';

export default {
  name: "Main",
  components: {
    Tag,
    Card,
    Affiliati,
    ContactUs,
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