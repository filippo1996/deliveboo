<template>
  <section :class="{'load': loading}">
    <div class="container py-5">
      <div class="row">
        <!-- Restaurant -->
        <div class="col-12 col-lg-9 pe-4" :class="{'col-lg-12': !cart?.items?.length}">
          
          <!-- Restaurant Header -->
          <div class="row restaurant_header text-white my-4 py-5" :class="{'d_none': loading}">
            <h1>{{ restaurant.name }}</h1>
            <span>Contatta: {{ restaurant.phone_number }}</span>
          </div>

          <!-- Card Product -->
          <div class="row g-4">
            <div class=" col-sm-12 col-lg-6" v-for="product in products" :key="product.id">
              <div class="card prodotto"> 
                <div class="row">
                  <div class="col-md-4 img-box d-flex align-items-center justify-content-center">
                    <img :src="product.img_path" class="card-img m-0 text" :alt="product.name">
                  </div>
                  
                  <div class="col-md-8">
                    <div class="card-body"> 
                      <h5 class="card-title text-uppercase fs-5 mt-3">{{ product.name }}</h5>
                      <p class="card-text w-100 descrizione overflow-auto d-md-inline-block my-3 px-2">{{ product.description }}</p>
                      <input 
                        :data-product="product.id" 
                        value="1" 
                        type="number" 
                        placeholder="qty" 
                        min="1"
                        class="w-25 h-auto border rounded_5">
                      <div class="d-inline-block ps-2">{{ product.price.toFixed(2) }} &euro; 
                        <span class="cursor_pointer" @click="insertCart(product)">
                          <i class="fas fa-plus plus_icon"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>

        <!-- Button trigger modal -->
        <div class="row fixed-bottom justify-content-center">
          <button type="button" class="btn bottone mb-4 col-4 d-lg-none cart-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Carrello {{ totalPriceCart.toFixed(2) }}&euro;
          </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Il tuo carrello</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="my-2 pb-2 d-flex justify-content-between" v-for="(obj, index) in cart?.items" :key="index">
                  <div class="d-flex align-items-center">
                    <div class="fw-bold qty_cart me-2">{{ obj.qty }}x</div>
                    <div class="text-start me-2">{{ obj.product.name }}</div>
                    <div class="price">{{ obj.product.price.toFixed(2) }}&euro;</div>
                  </div>
                  <div class="p-2">
                    <div class="col-md-6 d-flex justify-content-between align-items-center">
                      <span class="cursor_pointer" @click="setQuantity(obj, '-')">
                        <i class="fas fa-minus"></i>
                      </span>
                      <span class="trash mx-2" @click="deleteProduct(index)"><i class="fas fa-trash-alt"></i></span>
                      <div class="col-md-6">
                        <span class="cursor_pointer" @click="setQuantity(obj, '+')">
                          <i class="fas fa-plus"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center border-0">
                <div class="card-footer text-center bg-white mt-2">
                  <h3 class="fw-bold fs-5">Totale carrello {{ totalPriceCart.toFixed(2) }}&euro;</h3>
                  <div class="position-relative">
                    <router-link 
                      class="text-reset bottone text-decoration-none mt-1" 
                      :to="{name: 'checkout'}">{{ 'Checkout' }}
                    </router-link>
                    <span class="trash" @click="deleteProduct()"><i class="fas fa-trash-alt"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Cart -->
        <div class="d-none align-self-start d-lg-block col-lg-3" :class="{'d_none': !cart?.items?.length}" id="carrello">
          <div class="row mt-3 justify-content-center">
            <div class="card">
              <div class="card-header bg-white">
                 <h2 class="card-title text-center fs-4 pb-1">Il tuo Carrello</h2>
                <h6 class="card-subtitle text-center text-muted fs-6 mb-2">Spendi € 8,00 per evitare il supplemento</h6>
              </div>

              <div class="card-body">
                <div class="row my-2 pb-2" v-for="(obj, index) in cart?.items" :key="index">
                  <div class="row">
                    <div class="col-2 fw-bold qty_cart">{{ obj.qty }}x</div>
                    <div class="col-7 text-start ">{{ obj.product.name }}</div>
                    <div class="col-3 price">{{ obj.product.price.toFixed(2) }}&euro;</div>
                  </div>
                  <div class="row p-2 align-items-center">
                    <div class="col-md-4 d-flex justify-content-start">
                      <span class="cursor_pointer" @click="setQuantity(obj, '-')">
                        <i class="fas fa-minus"></i>
                      </span>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <span class="trash" @click="deleteProduct(index)"><i class="fas fa-trash-alt"></i></span>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                      <span class="cursor_pointer" @click="setQuantity(obj, '+')">
                        <i class="fas fa-plus"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end cart -->

              <!-- start message cart -->
              <div class="alert alert-success" :class="{ 'd-none' : !messageCart}" role="alert">
                {{ messageCart }}
              </div>
              <!-- end message cart -->

              <div class="card-footer text-center bg-white mt-2">
                <h3 class="fw-bold fs-5 mt-2 mb-3">Totale carrello {{ totalPriceCart.toFixed(2) }}&euro;</h3>
                <span class="trash" @click="deleteProduct()"><i class="fas fa-trash-alt"></i></span>
              </div>

              <div class="text-center text-light mt-2 mb-3">
                <router-link 
                  class="text-reset bottone text-decoration-none" 
                  :to="{name: 'checkout'}">{{ 'Checkout' }}
                </router-link>
              </div>

            </div>
          </div> 
        </div>


        <!-- Home & Return to Top -->
        <div class="row mt-5">
          <div class="col-lg-9 d-flex justify-content-center mb-5" :class="{'col-lg-12': !cart?.items?.length}">
            <router-link 
              class="text-decoration-none bottone p-2" 
              :to="{ name: 'home' }">
                <i class="fas fa-home"></i> {{ 'Torna alla home' }} 
            </router-link>

          </div>
          <a 
            class="arrow_up text-center cursor_pointer" 
            @click="returnToTop" 
            id="returnBtn">
              <i class="fas fa-arrow-up"></i>
          </a>
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
      cart: undefined,
      totalPriceCart: 0,
      messageCart: undefined,
    }
  },
  created(){
    document.title = 'Ristorante ' + this.slug;
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
        this.restaurant = {id: value.id, name: value.name, email: value.email, slug: value.slug, phone_number: value.phone_number};
        this.products = response.data.products;
        this.loading = false;
      } catch(err){
        //console.log(err);
        this.$router.push({ name: '404'});
      }
    },
    async insertCart(product){
      const qty = document.querySelector(`input[data-product="${product.id}"]`);
      const cart = new Cart(this.restaurant,product);
      await cart.setCart(+qty.value);
      // set property cart
      this.cart = cart.getCart();
      this.totalPriceCart = cart.getTotalPrice();
      this.showMessageCart('Prodotto aggiunto al carello');
    },
    setQuantity(product, symbol){
      const cart = new Cart(this.restaurant, product);
      cart.setQty(1, symbol);
      // set property cart
      this.cart = cart.getCart();
      this.totalPriceCart = cart.getTotalPrice();
      this.showMessageCart('Prodotto aggiornato');
    },
    deleteProduct(position = undefined){
      const cart = new Cart();
      if( position !== undefined ) {
        cart.deleteProductCart(position);
        // set property cart
        this.cart = cart.getCart();
        this.totalPriceCart = cart.getTotalPrice();
        this.showMessageCart('Prodotto eliminato dal carello');
      } else {
        cart.clearCart();
        this.totalPriceCart = cart.getTotalPrice();
        this.cart = undefined;
      }
    },
    showMessageCart(message){
      this.messageCart = message;
      setTimeout(() => {
        this.messageCart = undefined;
      },2000);
    },
    returnToTop(){
      document.documentElement.scrollTop = 0;
    }
  }
}

</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

// loading
.load{
  height: 500px;
  background-color: $yellow;
  z-index: 500;
  background-image: url("/images/meta.gif");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 250px;
}


// General

section {
  background: #ffd670;
}

.d_none {
  display: none !important;
}

.cursor_pointer {
  cursor: pointer;
}

.restaurant_header {
  background-image: url("https://wallpaperaccess.com/full/462778.jpg");
}


// Button
#returnBtn {
  left: 0;
  transform: translateX(22px);
}

.arrow_up {
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

  &:hover {
    transform: scale(1.5);
  }
}

.to_home_btn {
  background-color: $light-blue;
  padding: 10px;
  border-radius: 20px;
  text-decoration: none;
}


// Product

.prodotto {
  padding: 0 15px;
  border-radius: 15px;
  height: 280px;
  overflow: hidden;
}

.card {
  transition: 0.4s;

  &:hover{
    box-shadow: 10px 10px 0 hsl(0deg 0% 0% / 0.25);  
  }

  .img-box {
    .card-img {
      width: 100px; 
      height: 100px;
      -webkit-border-radius: 50%; 
      -webkit-background-clip: padding-box; 
      -moz-border-radius: 50%; 
      -moz-background-clip: padding; 
      border-radius: 50%; 
      background-clip: padding-box; 
      object-fit: cover;
    } 
  }

  .card-title {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    font-size: 16px;
    margin: 2px;
  }

  input {
    &.rounded_5 {
      border: 1px solid #000;
      border-radius: 5px;
    }
  
    &:focus {
      outline: $blue solid 1px!important;
      box-shadow:inset 0 1px 3px $blue;
      -moz-box-shadow:inset 0 1px 3px $blue;
      -webkit-box-shadow:inset 0 1px 3px $blue;
    }
  }

  .descrizione {
    height: 50px;
    overflow: auto;
    font-size: 12px;

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

  .plus_icon {
    font-size: 15px;
    color: $blue;
    background-color: $light-blue;
    padding: 8px 10px;
    border-radius: 50%;
    margin-left: 20px;
  }
}



// Cart

#carrello {
  position: fixed;
  top: 55px;
  right: 15px;
  z-index: 100;
  
  .card {
    border-radius: 15px;
    height: 85vh;

    .card-body {
      font-size: 11px;
      overflow-y: auto; 
      
      .qty_cart, 
      .price {
        font-size: 12px;
      } 
    }
  }
}


// Da implementare

.cart-button {
  background-color: $light-blue;
  color: white;
}

.order-button{
  background-color: $light-blue;
  padding: 2px 15px;

  &:hover{
    background-color: #70a3d6;
  }
}

.trash{
  cursor: pointer;
  padding: 5px 8px;
  border-radius: 5px;
  transition: 0.5s;
  background-color: rgb(255, 96, 96);

  &:hover{
    background-color: rgb(255, 66, 66);
  }
}

.bottone:hover{
  background-color:  #6694c2;
}

.modal-footer{
  .trash{
    position: absolute;
    right: 0;
    top: -5px;
  }
} 




/////// MEDIA QUERIES ///////

@media screen and (min-width: 768px) {
  .prodotto {
    height: 200px;
  }
}
</style>