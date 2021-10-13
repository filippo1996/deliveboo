<template>
  <section>
    <div class="container py-5">
      <Tag/>
      <div class="row justify-content" :class="{'d-none': loading}" v-if="!message">

        <!-- start card category -->
        <div class="col-12 col-sm-6 col-lg-3 border-white mb-3" v-for="restaurant in restaurants" :key="restaurant.id">
          <router-link class="nav-link rest-tag fw-bold" :to="{name: 'restaurant', params:{ slug: restaurant.slug }}">
            <div class="card text-white overflow-hidden rest-card box_shadow">
              <img :src="restaurant.cover" class="card-img" :alt="restaurant.name">
              <div class="card-img-overlay text-center text-light shadow">
                <div class="description">
                  <h3 class="card-title">{{ restaurant.name }}</h3>
                  <span class="tag">{{ tag }}</span>
                </div>
              </div>
              <!-- Card Ristorante -->
            </div>
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
      loading: true
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
  
  .card-title {
    text-shadow: 2px 2px 2px rgb(0, 0, 0);
  }
  .rest-card{
    height: 200px;
    cursor: pointer;
    border-radius: 15px;
    transition: 0.3s;

    img{
      filter: blur(0.5px);
      position: relative;
      transition: 0.3s;
      height: 100%;
      width: 100%;
      object-fit: cover;
    }
  }
  
  .rest-card:hover img{
    filter: blur(0px);
    transform: scale(1.1);
  }

  .shadow {
    background-color: rgba(0, 0, 0, 0.1);
    
    .description{
      color: white;
      position: relative;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
    }
  }

  .tag {
    background-color: rgba(150, 150, 150, .8);
    padding: 5px 10px;
    border-radius: 8px;
  }

  .box_shadow:hover {
    box-shadow: 15px 15px 0 hsl(0deg 0% 0% / 0.25);
  }
}
</style>