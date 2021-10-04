<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">DeliveBoo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link class="nav-link active" :to="{name: 'shop'}">{{ 'Shop' }}</router-link>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Prodotti</a>
            </li>
          </ul>
          <div>
            <button type="button" class="btn btn-danger me-2"><a class="text-decoration-none text-dark" href="http://localhost:8000/restaurant/login">Accedi</a></button>
            <button type="button" class="btn btn-danger text-decoration-none  me-2"><a class="text-decoration-none text-dark" href="http://localhost:8000/restaurant/register">Registrati</a></button>
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


</style>

