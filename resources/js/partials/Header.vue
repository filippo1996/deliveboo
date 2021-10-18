<template>
  <header>

    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <router-link class="nav-link active text-light d-none d-sm-block" :to="{name: 'home'}"> <img src="/images/logo.png" class="logo" alt="logo"></router-link>
        <router-link class="nav-link active text-light d-block d-sm-none align-item-center logo-icon" :to="{name: 'home'}"> <img src="/images/logo_icon.png" class="logo-icon" alt="icona-logo"></router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
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
            <h6>Ciao, {{ name }} <a class="link-success" href="http://127.0.0.1:8000/restaurant">La tua Dashboard</a></h6>
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

</style>

