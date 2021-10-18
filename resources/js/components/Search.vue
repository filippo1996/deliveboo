<template>
  <div>
    <!-- Stai mostrando {{ word }} quantità {{ items.length }} -->

    <!-- Modal -->
    <div aria-labelledby="exampleModalLabel" aria-hidden="true" class="z_index">
      <div class="modal-content mt-3">
        <div class="modal-body" >
          <div class="row" v-for="item in items" :key="item.id">
            <div class="p-2">
              <div class="card mb-1">
                <router-link  :to="{name: 'restaurant', params:{ slug: item.slug }}">
                  <div class="d-flex ">
                    <div class="align-items-center rounded-circle">
                      <img :src="item.cover" :alt="item.name">
                    </div>
                    <div class="card-body text-start">
                      <h5 class="card-title">{{item.name}}</h5>
                      <span>Costo ristorante: €€€</span>
                    </div>
                  </div>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  props:{
    word: String
  },
  data(){
    return {
      url: '/api/search/restaurants?search=',
      items: []
    }
  },
  mounted(){
    this.searchProducts();
  },
  methods: {
    async searchProducts(){
      if(!this.word){
        this.items = [];
        return null;
      }
      let response = await axios(this.url + this.word);
      this.items = response.data;
    }
  },
  watch: { 
   word: function(){
     this.searchProducts();
   }
  }
}
</script>


<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

.z_index {
  margin: 0 auto;
  position: relative;
  z-index: 500;
  height: 55vh;
  

  .modal-content {
    background-color: #41718eda;
    height: 100%;
    width: 50%;
    margin: 0 auto;
    border-radius: 10px;


    .modal-body {
      height: 500px;
      overflow-y: auto;
      
      .card {
        margin: 0 20px;
        background-color: #fff;
        border-radius: 16px;
        padding: 10px;


        img {
          width: 100px; 
          height: 100px;
          -webkit-border-radius: 50%; 
          -webkit-background-clip: padding-box; 
          -moz-border-radius: 50%; 
          -moz-background-clip: padding; 
          border-radius: 50%; 
          background-clip: padding-box; 
          object-fit: fill;
        }
      } 
    }
  }
}
</style>