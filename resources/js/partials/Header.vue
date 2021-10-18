<template>
  <header>

    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <router-link class="nav-link active text-light d-none d-sm-block" :to="{name: 'home'}"> <img src="/images/logo.png" class="logo" alt="logo"></router-link>
        <router-link class="nav-link active text-light d-block d-sm-none align-item-center logo-icon" :to="{name: 'home'}"> <img src="/images/logo_icon.png" class="logo-icon" alt="icona-logo"></router-link>
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fas fa-bars text-light"></i></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="#contact">Contattaci</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="#">Chi siamo</a>
            </li>
          </ul>
          <div v-if="!auth">
            <a class="btn bottone me-3 text-decoration-none" href="http://127.0.0.1:8000/restaurant/login">Accedi</a>
            <a class="btn bottone me-2 text-decoration-none" href="http://127.0.0.1:8000/restaurant/register">Registrati</a>
          </div>
          <div v-else>
            <!-- menu da lg in su -->
            <div class="d-none d-lg-block">
              <h6 class="text-light mb-3 d-inline">Ciao, </h6>
              <div class="d-inline dropdown">
                <button class="btn bottone dropdown-toggle text-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ name }}<img class="logorest mx-1" :src="cover" alt="logo">
                </button>
                <ul class="dropdown-menu dropdown-menu-end prova" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="http://127.0.0.1:8000/restaurant">Dashboard</a></li>
                  <li><a class="dropdown-item" href="http://127.0.0.1:8000/restaurant/products">Prodotti</a></li>
                  <li><a class="dropdown-item" href="http://127.0.0.1:8000/restaurant/orders">Ordini</a></li>
                </ul>
              </div>
            </div>
            <!-- menu mobile -->
            <div class="d-lg-none">
              <hr class="dropdown-divider text-light">
              <h6 class="text-light mb-3 d-inline">Ciao, {{ name }} <img class="logorest" :src="cover" alt="logo"></h6>
              <a href="http://127.0.0.1:8000/restaurant" class="nav-link active text-light">Dashboard</a>
              <a href="http://127.0.0.1:8000/restaurant/products" class="nav-link active text-light">Prodotti</a>
              <a href="http://127.0.0.1:8000/restaurant/orders" class="nav-link active text-light">Ordini</a>
            </div>

          </div>
        </div>
      </div>
    </nav>
    
  </header>
</template>

<script>
export default {
  name: "Header",
  data(){
    return {
      name: undefined,
      email: undefined,
      cover: undefined,
      auth: false
    }
  },
  mounted(){
    this.checkAuth();
  },
  methods: {
    async checkAuth(){
      try {
        let response = await axios('/auth');
        response = response.data;
        if(response.success){
          this.auth = true;
          this.name = response.auth.name;
          this.email = response.auth.email;
          this.cover = response.auth.cover;
        }
      } catch(error) {
        console.log(error);
      }
    }
  },
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

.navbar {
  background-color: rgb(65, 113, 142);
  
  .logo{
    width: 100px;
  }
  .logo-icon{
    width: 35px;
  }
  
}

.logorest{
  width: 30px;
  border-radius: 50%;
}

.prova{
  margin-top: 13px;
}

</style>

