<template>
  <div>
    <ul v-if="!message">
      <li v-for="restaurant in restaurants" :key="restaurant.id">
        {{ restaurant.name }}
      </li>
    </ul>
    <h3 v-else>{{ message }}</h3>
  </div>
</template>

<script>
export default {
  name: 'Category',
  props: {
    slug: String
  },
  data(){
    return {
      restaurants: [],
      url: '/api/category/',
      message: undefined
    }
  },
  mounted(){
    this.callApi();
  },
  methods: {
    async callApi(){
      let response = await axios.get(this.url + this.slug);
      if(response.data.success){
        this.restaurants = response.data.results.users;
        if(!this.restaurants.length) this.message = 'Nessun ristorante trovato';
      } else {
        alert('Categoria non trovata');
      }
    }
  }
}
</script>

<style>

</style>