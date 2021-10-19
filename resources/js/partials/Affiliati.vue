<template>
  <div class="jumbo">
    <div class="container h-100">
      <div class="row h-100 py-3">
        <div class="jumbo-text col-12 col-md-6 text-center text-light d-flex flex-column justify-content-center">
          <h2 class="title text-center">
            I migliori ristoranti della tua città, <br> a portata di click
          </h2>  
          <div class="subtitle mt-4">
            I nostri esperti selezionano meticolosamente i locali migliori intorno a te, per garantirti una qualità ed un servizio unico
          </div>
        </div>
        <div class="col-12 col-md-6 h-100 text-center">
          <img src="/images/food.png" alt="chef" class="h-100 p-3">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Affiliati",
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

.jumbo{
  background-color: $blue;
  height: 300px;

  .jumbo-text{
    .title{
      line-height: 1.4;
      font-weight: 500;
    }

    .subtitle{
      font-size: 16px;
    }

  }

  img{
    max-width: 450px;
  }
  
}

</style>