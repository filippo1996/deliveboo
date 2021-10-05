<template>
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <router-link class="nav-link active" :to="{name: 'home'}">{{ 'Deliveboo' }}</router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Prodotti</a>
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
.navbar{
  background-color: rgb(65, 112, 142);
  
  .bottone{
    background-color: rgb(133, 193, 255);
    color: white;
  }
  
}

</style>

