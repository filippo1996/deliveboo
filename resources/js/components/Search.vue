<template>
  <div>
    <!-- Stai mostrando {{ word }} quantità {{ items.length }} -->

    <!-- Modal -->
    <div aria-labelledby="exampleModalLabel" aria-hidden="true" class="z_index">
      <div class="modal-content mt-3">
        <div class="modal-body" >
          <div class="row" v-for="item in items" :key="item.id">
            <div class="col-8 m-auto p-2">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4 d-flex ps-4">
                    <div class="box_img d-flex align-items-center rounded-circle">
                      <img :src="item.img_path" alt="{{item.name}}">
                    </div>
                    
                  </div> 
                  <div class="col-md-8 ps-4">
                    <div class="card-body text-start">
                      <h5 class="card-title">{{item.name}}</h5>
                      <p class="card-text"> {{item.ingredient}} </p>
                      <p class="card-text"><small class="text-muted">{{item.price}}</small></p>
                    </div>
                  </div>
                </div>
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
      url: '/api/products/?search=',
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
  position: relative;
  z-index: 50;

  .modal-content {
    background-color: rgba(65, 112, 142, .3);
    
    width: 70%;
    margin: 0 auto;

    .modal-body {
      width: 100%;
      height: 500px;
      overflow-y: auto;
      
      .card {
        width: 80%;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 0px 16px 0px 16px;
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
          margin: 8px 0 0 8px; 
        }
      } 
    }
  }
}
</style>