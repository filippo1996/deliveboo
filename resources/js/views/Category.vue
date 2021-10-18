<template>
  <section>
    <div class="container py-5">
      <Tag @slugEmit="callSlug" :tagsActive="slugs"/>
      <div class="row-cols" :class="{'d-none': loading}" v-if="!message">
        <!-- row-cols-1 row-cols-sm-2 row-cols-lg-4 -->

        <div v-for="(restaurant, index) in restaurants" :key="index">
          <!-- Title category -->
           <h3 class="text_blue">{{ restaurant.tagName }}</h3>

          <div v-if="'0' in restaurant.item">
            <!-- start card category -->
            <div class="col-12 col-sm-6 col-lg-3 border-white mb-3 d-inline-block" v-for="item in restaurant.item" :key="item.id">
              <router-link class="nav-link rest-tag fw-bold" :to="{name: 'restaurant', params:{ slug: item.slug }}">
                <div class="card text-white overflow-hidden rest-card box_shadow" >
                  <img :src="item.cover" class="card-img" :alt="item.name">
                  <div class="card-img-overlay text-center shadow">
                    <div class="description">
                      <h3 class="card-title mb-5">{{ item.name }}</h3>
                      <span class="tag">{{ restaurant.tagName }}</span>
                    </div>
                  </div>
                  <!-- Card Ristorante -->
                </div>
              </router-link>
            </div>
            <!-- end card category -->
          </div>
          <div class="row" v-else>
            <h2 class="mb-4 text_blue">Presto in arrivo nuovi ristoranti</h2>
          </div>
        
        </div>
      </div>
      
      <h2 class="text_blue" v-else>{{ message }}</h2>
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
    //slug: String
  },
  data(){
    return {
      slug: '',
      restaurants: [],
      slugs: [],
      url: '/api/category/',
      message: 'Scopri le nostre categorie',
      loading: true
    }
  },
  mounted(){
    //this.callApi();
  },
  methods: {
    async callApi(){
      // Metod Active
      if(this.activeCategory()) return;
      this.loading = true;
      this.message = '';
      let response = await axios.get(this.url + this.slug);
      if(response.data.success){
        let restaurants = response.data.results.users;
        let tag = response.data.results.name;
        this.restaurants.unshift( {slug : this.slug, tagName: tag, item: {...restaurants}} );
      }
      this.loading = false;
    },
    activeCategory(){
      if(this.slugs.includes(this.slug)){
        let index = this.slugs.indexOf(this.slug);
        this.slugs.splice(index, 1);
        // Metod remove restaurant
        this.removeRestaurant(this.slug);
        return true;
      }

      this.slugs.push(this.slug);
      return false;
    },
    removeRestaurant(slug){
      const filter = this.restaurants.filter(element => {
        return element.slug !== slug;
      });
      this.restaurants = filter;
    },
    callSlug(slug){
      this.slug = slug;
      this.callApi();
      if(!this.slugs.length){
        this.message = 'Scopri le nostre categorie';
      }
    }
  }
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

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
    transform: scale(1.05);
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

.text_blue{
  color: $blue;
}
</style>