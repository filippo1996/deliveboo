<template>
  <main>
    <div class="container pt-5 pb-2">
    <div class="row">
      <h2>Tipologie di Ristoranti</h2>
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
  </div>
  </main>
</template>

<script>
export default {
  name: "Tag",
  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/restaurants',
      restaurants: []
    }
    },
    mounted(){
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
    li{
      transition: 0.3s;
      transform: perspective(200px) rotateX(35deg);
      &:hover{
        transform: perspective(100px) rotateX(0deg);
      }
    }

    .rest-tag{
      background: rgb(226,225,206);
      background: linear-gradient(0deg, rgba(226,225,206,1) 0%, rgba(215,84,3,1) 5%);
      margin: 0 12px;
      border-radius: 10px;
      color: white;
      
    }
  }
</style>