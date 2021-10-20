<template>
  <section>
    <div class="container">
      <div class="row pt-5">
        <div class="col-12 col-md-6 mt-5 d-flex align-items-center">
         <h3>L'ordine è stato completato con successo, arriverà il prima possibile.</h3>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-center mt-5">
          <img src="/images/food.png" alt="food">
        </div>
        <div class="col-12 col-md-4 d-flex justify-content-center my-5">
         <router-link 
              class="text-decoration-none bottone p-2 px-3" 
              :to="{ name: 'home' }">
                <i class="fas fa-home"></i> {{ 'Torna alla home' }} 
        </router-link>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Success'

}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

  section{
    background-color: $yellow;
  }

  h3{
    color: $blue;
    text-align: center;
  }

  img{
    width: 300px;
  }

</style>