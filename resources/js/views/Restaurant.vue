<template>
  <section :class="{'d_none': loading}">
    <div class="container">
      <div class="row">
        <!-- Restaurant -->
        <div class="col-12 col-lg-9" :class="{'col-lg-12': !cart?.length}">
          
          <!-- Restaurant Header -->
          <div class="row row-ristorante text-white my-3 py-5">
            <h1>{{ restaurant.name }}</h1>
            <span>Contatta: {{ restaurant.phone_number }}</span>
          </div>

          <!-- Card Product -->
          <div class="row g-4">
            <div class="col-12 col-sm-6 col-xl-6" v-for="product in products" :key="product.id">
              <div class="card" id="prodotto">
                <div class="row d-flex align-items-center">
                  <div class="col-md-4 img-box d-flex justify-content-center">
                    <img :src="product.img_path" class="img-fluid card-img" :alt="product.name">
                  </div>
                  
                  <div class="col-md-8">
                    <div class="card-body p-2"> 
                      <h5 class="card-title text-uppercase fs-5 mt-3">{{ product.name }}</h5>
                      <p class="card-text descrizione my-3 overflow-auto d-none d-md-inline-block">{{ product.description }}</p>
                      <input 
                        :data-product="product.id" 
                        value="1" 
                        type="number" 
                        placeholder="qty" 
                        min="1"
                        class="w-25 h-auto border border mb-5 rounded_5">
                      <div class="float-lg-end ">{{ product.price.toFixed(2) }} &euro; 
                        <span class="cart" @click="insertCart(product)">
                          <i class="fas fa-plus big-icon"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>


        <!-- Cart button -->
        <div class="fixed-bottom text-center mb-4 d-lg-none">
          <a href="#" class="cart-button px-4 py-3 rounded-pill text-decoration-none">Carrello</a>
        </div>


        <!-- Cart -->
        <div class="col-3 align-self-start d-lg-block" :class="{'d_none': !cart?.length}" id="carrello">
          <div class="row mt-3 justify-content-center">
            <div class="card">
              <div class="card-header bg-white">
                 <h2 class="card-title text-center fs-4 pb-1">Il tuo Carrello</h2>
                <h6 class="card-subtitle text-center text-muted fs-6 mb-2">Spendi € 8,00 per evitare il supplemento</h6>
              </div>

              <div class="card-body">
                <div class="row my-2 pb-2" v-for="(obj, index) in cart" :key="index">
                  <div class="row">
                    <div class="col-2 fw-bold n-carrello">{{ obj.qty }}x</div>
                    <div class="col-7 text-start ">{{ obj.item.name }}</div>
                    <div class="col-3 price">{{ obj.item.price.toFixed(2) }} &euro;</div>
                  </div>
                  <div class="row p-2">
                    <div class="col-md-6 d-flex justify-content-start">
                      <span class="cart" @click="setQuantity(obj, '-')">
                        <i class="fas fa-minus"></i>
                      </span>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end mb-4">
                      <span class="cart" @click="setQuantity(obj, '+')">
                        <i class="fas fa-plus"></i>
                      </span>
                    </div>
                  </div>
                </div>
                
                <!-- end cart -->
              </div>

              <div class="card-footer text-center bg-white mt-2">
                <h3 class="fw-bold fs-5">Totale carrello {{ totalPriceCart.toFixed(2) }} &euro;</h3>
              </div>

            </div>
          </div> 
        </div>


        <!-- Home & Return to Top -->
        <div class="row mt-5">
          <div class="col-lg-9 d-flex justify-content-center mb-5" :class="{'col-lg-12': !cart?.length}">
            <router-link class="home px-3" :to="{ name: 'home' }"><i class="fas fa-home"></i> {{ 'Torna alla home' }}</router-link>
          </div>
          <a class="freccia text-center" @click="returnToTop" id="returnBtn"><i class="fas fa-arrow-up"></i></a>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { Cart } from '../utils/factory.js';

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
      loading: true,
      cart: [],
      totalPriceCart: 0
    }
  },
  mounted(){
    this.getRestaurant();
    let cart = new Cart();
    this.cart = cart.getCart();
    this.totalPriceCart = cart.getTotalPrice();
  },
  methods: {
    async getRestaurant(){
      try {
        this.loading = true;
        let response = await axios(this.url + this.slug);
        let value = response.data;
        this.restaurant = {id: value.id, name: value.name, slug: value.slug, phone_number: value.phone_number};
        this.products = response.data.products;
        this.loading = false;
      } catch(err){
        //console.log(err);
        this.$router.push({ name: '404'});
      }
    },
    insertCart(product){
      const qty = document.querySelector(`input[data-product="${product.id}"]`);
      const cart = new Cart(product);
      cart.setCart(+qty.value);
      // set property cart
      this.cart = cart.getCart();
      this.totalPriceCart = cart.getTotalPrice();
    },
    setQuantity(product, symbol){
      const cart = new Cart(product);
      cart.setQty(1, symbol);
      // set property cart
      this.cart = cart.getCart();
      this.totalPriceCart = cart.getTotalPrice();
    },
    returnToTop(){
      document.documentElement.scrollTop = 0;
    }
  }
}

</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

section{
background: #ffd670;
}

.card {
  box-shadow: 8.0px 16.0px 16.0px hsl(0deg 0% 0% / 0.25);
}
input{
  &.rounded_5 {
    border: 1px solid #000;
    border-radius: 5px;
  }
  
  &:focus{
    outline: $blue solid 1px!important;
    box-shadow:inset 0 1px 3px $blue;
    -moz-box-shadow:inset 0 1px 3px $blue;
    -webkit-box-shadow:inset 0 1px 3px $blue;
  }
}

.card-title{
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}
#prodotto{
  border-radius: 15px;
  height: 250px;
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

.img-box{
  .card-img{
    width: 120px; 
    height: 120px;
    -webkit-border-radius: 50%; 
    -webkit-background-clip: padding-box; 
    -moz-border-radius: 50%; 
    -moz-background-clip: padding; 
    border-radius: 50%; 
    background-clip: padding-box; 
    object-fit: cover;
  } 
}

.big-icon{
  font-size: 15px;
  color: $blue;
  background-color: $light-blue;
  padding: 8px 10px;
  border-radius: 50%;
  margin-left: 20px;
}

.cart-button{
  background-color: $light-blue;
  color: white;
}

#carrello {
  position: fixed;
  right: 0;
  transform: translateX(-22px);
  
  .card {
    border-radius: 15px;
    height: 85vh;
    

    .card-body {
      overflow-y: auto;  
    }
    }
}

.n-carrello, .price{
  font-size: 12px;
}

.lista{
  border-bottom: 1px solid lightgray;
}

.row-ristorante{
  background-image: url("https://wallpaperaccess.com/full/462778.jpg");
}

.order-button{
  background-color: $light-blue;
  padding: 2px 15px;

  &:hover{
    background-color: #70a3d6;
  }
}

.home{
  background-color: $light-blue;
  padding: 10px;
  border-radius: 20px;
  text-decoration: none;
}

.cart{
  cursor: pointer;
}

.d_none{
  display: none !important;
}



#returnBtn {
  left: 0;
  transform: translateX(22px);
}
.freccia{
  // display: none;
  position: fixed;
  height: 40px;
  width: 40px;
  right: 30px;
  bottom: 50px;
  padding: 10px;
  background-color: $light-blue;
  color: $blue;
  border-radius: 50%;
  transition: ease all 0.3s;
    &:hover{
      transform: scale(1.5);
    }
}
</style>