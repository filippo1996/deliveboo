<template>
  <main>
    <div class="container py-5">
      <Tag/>
      <div class="row justify-content" v-if="!message">
        <div class="row">
          <h2>Risultati ricerca</h2>
        </div>
        <div class="col-12 col-sm-6 border-white col-lg-3 d-flex my-3" v-for="restaurant in restaurants" :key="restaurant.id">
          <div class="card text-white overflow-hidden rest-tag">
            <img src="https://www.obiettivoinsalute.it/media/k2/items/cache/4fcf9d660236ddb62c8456017158615a_XL.jpg" class="card-img" :alt="restaurant.name">
            <div class="card-img-overlay text-center text-light shadow">
              <div class="description">
                <h3 class="card-title">{{restaurant.name}}</h3>
                <span class="tag">Tag</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <a href="http://127.0.0.1:8000/">
            <div class="btn btn-primary">
              Torna alla home
            </div>
          </a>
        </div>
      </div>
      <h3 v-else>{{ message }}</h3>
    </div>   
  </main>
</template>

<script>
import Tag from '../components/Tag.vue';

export default {
  name: 'Category',
  components:{
    Tag,
  },
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
    //this.$router.push({name: '404'});
    this.callApi();
  },
  methods: {
    async callApi(){
      let response = await axios.get(this.url + this.slug);
      if(response.data.success){
        this.restaurants = response.data.results.users;
        if(!this.restaurants.length) this.message = 'Nessun ristorante trovato';
      } else {
        this.$router.push({ name: '404' });
      }
    }
  }
}
</script>

<style lang="scss" scoped>
main{
  background-color: rgb(255, 214, 112);

    
    .rest-tag{
      cursor: pointer;

      img{
        transition: 0.3s;
      }
    }
    
    .rest-tag:hover img{
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