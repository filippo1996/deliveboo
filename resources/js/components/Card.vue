<template>
<div class="container">
  <div class="row">
    <h2>I locali più ricercati</h2>
    <div 
      class="col-12 col-sm-6 col-lg-3 border-white mb-3" 
      v-for="restaurant in items" :key="restaurant.id">
      
      <router-link 
        class="nav-link rest-tag fw-bold" 
        :to="{name: 'restaurant', params:{ slug: restaurant.slug }}">
          

          <div class="card text-white overflow-hidden rest-card box_shadow">
            <img 
              :src="restaurant.cover" 
              class="card-img" 
              :alt="restaurant.name">

            <div class="card-img-overlay text-center shadow">
              <div class="description">
                <h3 class="card-title mb-5">{{ restaurant.name }}</h3>
                <span class="tag">{{ restaurant.tags[0]?.name }}</span>
              </div>
            </div>
          </div>
      </router-link>
    </div>

  </div>
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
@import 'resources/sass/_variables.scss';
h2{
  color: $blue;
  font-weight: 500;
}

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
      position: relative;
      transition: 0.3s;
      height: 100%;
      width: 100%;
      object-fit: cover;
    }
  }

  .shadow {
    background-color: rgba(0, 0, 0, 0.15);
    
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

@media screen and (min-width: 576px) {
  img{
    filter: blur(0.5px);
  }
  .rest-card:hover img{
    filter: blur(0px);
    transform: scale(1.1);
  }
}
</style>