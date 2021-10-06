<template>
  <main>
    <div class="container py-5">
      <!-- category -->
      <Tag/>
      <!-- end category -->
      <div class="row justify-content">
        <div class="col-12 col-sm-6 border-white col-lg-3 d-flex my-3" v-for="restaurant in restaurants" :key="restaurant.id">
          <div class="card text-white overflow-hidden rest-card">
            <img :src="restaurant.cover" class="card-img" :alt="restaurant.name">
            <div class="card-img-overlay text-center text-light shadow">
              <div class="description">
                <h3 class="card-title">{{restaurant.name}}</h3>
                <span class="tag">Tag</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import Tag from '../components/Tag.vue';

export default {
    name: "Main",
    components: {
      Tag,
    },
    data(){
        return{
            apiUrl: 'http://127.0.0.1:8000/api/restaurants',
            restaurants: []
        }
    },
    created(){
        this.getRestaurant()
    },
    methods: {
        getRestaurant(){
            axios.get(this.apiUrl)
            .then(resp =>{
                this.restaurants= resp.data.results;
            })
        }
    }
}
</script>
<style lang="scss" scoped>
main{
  background-color: #ffd670;

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