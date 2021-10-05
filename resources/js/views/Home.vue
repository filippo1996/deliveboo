<template>
  <main>
    <div class="container py-5">
        
      <div class="row">
        <ul class="list-unstyled d-flex flex-wrap">
          <li>
            <router-link class="nav-link rest-tag fw-bold" :to="{name: 'category', params:{ slug: 'panineria' }}">{{ 'Panineria' }}</router-link>
          </li>
          <li>
            <router-link class="nav-link rest-tag fw-bold" :to="{name: 'category', params:{ slug: 'gelateria' }}">{{ 'Gelateria' }}</router-link>
          </li>
          <li>
            <router-link class="nav-link rest-tag fw-bold" :to="{name: 'category', params:{ slug: 'fast-food' }}">{{ 'Fast Food' }}</router-link>
          </li>
          <li>
            <router-link class="nav-link rest-tag fw-bold" :to="{name: 'category', params:{ slug: 'pizzeria' }}">{{ 'Pizzeria' }}</router-link>
          </li>
        </ul>
      </div>
      <div class="row justify-content-md-around">
        <div class="col-12 col-sm-6 border-white col-lg-3 d-flex my-3" v-for="restaurant in restaurants" :key="restaurant.id">
          <div class="card text-white overflow-hidden pippo">
            <img src="https://www.obiettivoinsalute.it/media/k2/items/cache/4fcf9d660236ddb62c8456017158615a_XL.jpg" class="card-img" :alt="restaurant.name">
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
export default {
    name: "Main",
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
  background-color: rgb(255, 214, 112);

    .rest-tag{
      color: #393f46;
    }

    .pippo{
      cursor: pointer;

      img{
        transition: 0.3s;
      }
    }
    
    .pippo:hover img{
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