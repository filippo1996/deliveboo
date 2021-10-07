<template>
  <div class="col-12 col-sm-6 border-white col-lg-3 d-flex my-3" v-for="restaurant in items" :key="restaurant.id">
    <router-link class="nav-link rest-tag fw-bold" :to="{name: 'restaurant', params:{ slug: slug(restaurant.name) }}">
      <div class="card text-white overflow-hidden rest-card">
        <img :src="restaurant.cover" class="card-img" :alt="restaurant.name">
        <div class="card-img-overlay text-center text-light shadow">
          <div class="description">
            <h3 class="card-title">{{ restaurant.name }}</h3>
            <span class="tag">{{ restaurant.tags[0]?.name }}</span>
          </div>
        </div>
      </div>
    </router-link>
  </div>
</template>

<script>
import slug from '../utils/factory.js';

export default {
  name: 'Card',
  props: {
    items: Object
  },
  data(){
    return {
      slug: (function(){
        return slug;
      }()),
    }
  }
}
</script>

<style lang="scss" scoped>
.rest-tag{
    color: #393f46;
  }

  .rest-card{
    cursor: pointer;
    border-radius: 10px;
    height: 200px;

    img{
      position: relative;
      bottom: 20%;
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
</style>