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
              <a class="nav-link active text-light" aria-current="page" href="#">Chi siamo</a>
            </li>
          </ul>
          <div>
            <a class="btn bottone me-2 text-decoration-none" href="http://localhost:8000/restaurant/login">Accedi</a>
            <a class="btn bottone me-2 text-decoration-none" href="http://localhost:8000/restaurant/register">Registrati</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: "Header",
}
</script>

<style lang="scss" scoped>
.navbar {
  // position: fixed;

  background-color: rgba(65, 113, 142, 0.884);
  
  .bottone{
    background-color: rgb(133, 193, 255);
    border-radius: 50px;
    padding: 2px 15px;
    color: white;

    &:hover{
      background-color: rgb(112, 163, 214);
      transition: 0.3s;
    }
  }
  .logo{
    width: 100px;
  }
  .logo-icon{
    width: 35px;
  }
  
}

</style>

