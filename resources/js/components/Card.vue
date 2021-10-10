<template>
  <div 
    class="col-12 col-sm-4 col-lg-3 border-white my-3" 
    v-for="restaurant in items" :key="restaurant.id">
    
    <router-link 
      class="nav-link rest-tag fw-bold" 
      :to="{name: 'restaurant', params:{ slug: restaurant.slug }}">
        

        <div class="card text-white overflow-hidden rest-card box_shadow">
          <img 
            :src="restaurant.cover" 
            class="card-img" 
            :alt="restaurant.name">

          <div class="card-img-overlay text-center text-white shadow">
            <div class="description">
              <h3 class="card-title mb-5">{{ restaurant.name }}</h3>
              <span class="tag">{{ restaurant.tags[0]?.name }}</span>
            </div>
          </div>
        </div>
    </router-link>
  </div>
</template>


<script>
export default {
  name: 'Card',
  props: {
    items: Object
  }
}
</script>


<style lang="scss" scoped>
.rest-tag{
    color: #393f46;
  }
  
  .card-title {
    text-shadow: 1px 2px rgb(55, 55, 55);
  }
  .rest-card{
    cursor: pointer;
    border-radius: 15px;
    height: 200px;

    img{
      position: relative;
      transition: 0.3s;
      height: 100%;
      width: 100%;
    }
  }
  
  .rest-card:hover img{
    transform: scale(1.3);
  }

  .shadow {
    background-color: rgba(150, 150, 150, .5);
    
    .description{
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

  .box_shadow {
    box-shadow: 8.0px 16.0px 16.0px hsl(0deg 0% 0% / 0.25);
  }
</style>