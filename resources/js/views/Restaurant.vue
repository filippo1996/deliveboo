<template>
<section>

  <div class="container">
    <div class="row">
      <div class="col-9">

        <div class="row row-ristorante my-3 py-5">
          <h1>{{ restaurant.name }}</h1>
          <span>Contatta: {{ restaurant.phone_number }}</span>
        </div>
          <!--
          <div class="row mt-1 justify-content-center align-items-center">
            <input class="text-center" type="search" placeholder="Cerca qui">
          </div>
          -->

          <div class="row py-5">
            <!-- start card product -->
            <div class="col-9 col-xl-6" v-for="product in products" :key="product.id">
              <div class="card prodotto mb-4 pt-1 px-1">
                <div class="row">
                  <div class="  col-md-4">
                    <img :src="product.img_path" class="img-fluid card-img" :alt="product.name">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body p-3">
                      <h5 class="card-title text-uppercase fs-5">{{ product.name }}</h5>
                      <p class="card-text descrizione m-0 d-none d-md-inline-block">{{ product.description }}</p>
                      <div class="col-md-6 float-lg-end mt-4 ">{{ product.price.toFixed(2) }} &euro; <i class="fas fa-plus big-icon"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end card product -->
          </div>

      </div>
      <!-- start cart -->
      <div class="col-3 align-self-start">
        <div class="row mt-3 justify-content-center">
          <div class="card">
        <div class="card-body">
          <h2 class="card-title text-center">Carrello</h2>
          <h6 class="card-subtitle mb-2 text-muted text-center">Spendi € 8,00 per evitare il supplemento</h6>
          <div class="row my-3 lista pb-2">
            <div class="row">
              <div class="col-2 fw-bold n-carrello">1x</div>
              <div class="col-7 text-center">Nome del bellissimo prodotto</div>
              <div class="col-3 price">5,20€</div>
            </div>
            <div class="row">
              <div class="col-md-6 d-flex justify-content-start"><i class="fas fa-minus"></i></div>
              <div class="col-md-6 d-flex justify-content-end"><i class="fas fa-plus"></i></div>
            </div>
          </div>
          <div class="row my-3 lista pb-2">
            <div class="row">
              <div class="col-2 fw-bold n-carrello">1x</div>
              <div class="col-7 text-center">Nome del bellissimo prodotto</div>
              <div class="col-3 price">5,20€</div>
            </div>
            <div class="row">
              <div class="col-md-6 d-flex justify-content-start"><i class="fas fa-minus"></i></div>
              <div class="col-md-6 d-flex justify-content-end"><i class="fas fa-plus"></i></div>
            </div>
          </div>
          <div class="d-flex justify-content-center"><a href="#" class="order-button btn btn-success rounded-pill">Ordina</a></div>
        </div>
      </div>
      <!-- end cart -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-9 d-flex justify-content-center mb-5">
        <router-link class="home px-3" :to="{ name: 'home' }"><i class="fas fa-home"></i> {{ 'Torna alla home' }}</router-link>
      </div>
    </div>
  </div>

</section>
  
</template>

<script>
export default {
  name: 'Restaurant',
  props:{
    slug: String
  },
  data(){
    return {
      url: '/api/restaurant/',
      restaurant: {},
      products: [],
      loading: true
    }
  },
  mounted(){
    this.getRestaurant();
  },
  methods: {
    async getRestaurant(){
      try {
        let response = await axios(this.url + this.slug);
        let value = response.data;
        this.restaurant = {id: value.id, name: value.name, slug: value.slug, phone_number: value.phone_number};
        this.products = response.data.products;
      } catch(err){
        console.log(err);
      }
    }
  }
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';


section{
background: #ffd670;
}

input{
  border-radius: 20px;
  padding: 5px;
  border: none;
  background-color: white;
  width: 35rem;
  &:focus{
    outline: $light-blue solid 3px;
  }
}
.card-title{
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}
.prodotto{
  border-radius: 30px;
  height: 230px;
}
.descrizione{
  height: 100px;
  overflow: auto;

  &::-webkit-scrollbar {
  width: 5px;
  }
 
  &::-webkit-scrollbar-track {
  box-shadow: inset 0 0 6px #ffd670;
  }
 
  &::-webkit-scrollbar-thumb {
  background-color: $light-blue;
  outline: 1px solid $light-blue;
  }
}
.card-img{
  border-top-left-radius: 25px;
  height: 100px;
}

.big-icon{
  font-size: 20px;
  color: #41708E;
  background-color: $light-blue;
  padding: 5px 7px;
  border-radius: 50%;
  margin-left: 20px;
}

.lista{
  max-height: 500px;
  overflow-y: scroll;
}

.n-carrello, .price{
  font-size: 12px;
}

.lista{
  border-bottom: 1px solid lightgray;
}

.row-ristorante{
  background-image: url("https://wallpaperaccess.com/full/462778.jpg");
  color: white;
}

.order-button{
  background-color: $light-blue;
  color: white;
}

.home{
  background-color: $light-blue;
  padding: 10px;
  border-radius: 20px;
  text-decoration: none;
}

</style>