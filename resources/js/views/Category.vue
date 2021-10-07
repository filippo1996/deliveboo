<template>
  <section>
    <div class="container py-5">
      <Tag/>
      <div class="row justify-content" :class="{'d-none': loading}" v-if="!message">

        <!-- start card category -->
        <div 
          class="col-12 col-sm-6 border-white col-lg-3 d-flex my-3" 
          v-for="restaurant in restaurants" :key="restaurant.id">
          
          <router-link 
            class="nav-link rest-tag fw-bold" 
            :to="{name: 'restaurant', params:{ slug: slugRestaurant(restaurant.name) }}">

              <!-- Card Ristorante -->
              <div class="card text-white overflow-hidden rest-card">
                <!-- Cover e nome-->
                <img :src="restaurant.cover" class="card-img" :alt="restaurant.name">
                <!-- Nome e tag -->
                <div class="card-img-overlay text-center text-light shadow">
                  <div class="description">
                    <h3 class="card-title">{{ restaurant.name }}</h3>
                    <span class="tag">{{ tag }}</span>
                  </div>
                </div>
              </div>
              <!-- Card Ristorante -->

          </router-link>
        </div>
        <!-- end card category -->
      </div>
      
      <h3 v-else>{{ message }}</h3>
    </div>  
    <!-- Container -->
  </section>
</template>

<script>
import Tag from '../components/Tag.vue';
import slugRestaurant from '../utils/factory.js';

export default {
  name: 'Category',
  components:{
    Tag
  },
  props: {
    slug: String
  },
  data(){
    return {
      restaurants: [],
      tag: '',
      url: '/api/category/',
      message: undefined,
      loading: true,
      slugRestaurant: (function(){
        return slugRestaurant;
      }())
    }
  },
  mounted(){
    this.callApi();
  },
  methods: {
    async callApi(){
      this.loading = true;
      this.message = '';
      let response = await axios.get(this.url + this.slug);
      if(response.data.success){
        this.restaurants = response.data.results.users;
        this.tag = response.data.results.name;
        if(!this.restaurants.length) this.message = 'Nessun ristorante trovato';
      } else {
        this.$router.push({ name: '404' });
      }
      this.loading = false;
    }
  },
  watch: {
    slug: function(){
      this.callApi();
    }
  }
}
</script>

<style lang="scss" scoped>
section{
  background-color: rgb(255, 214, 112);

  .rest-tag{
    color: #393f46;
  }

  .rest-card{
    cursor: pointer;

    img{
      transition: 0.3s;
    }
  }
  
  .rest-card:hover img{
    transform: scale(1.1);
  }

  .shadow{
    background-color: rgba(100, 100, 100, 0.4);
    
    .description{
      position: relative;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
    }
  }

  .tag{
    background-color: rgba(0, 0, 0, 0.5);
    padding: 5px 10px;
    border-radius: 20px;
  }
}
</style>