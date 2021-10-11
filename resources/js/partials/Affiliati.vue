<template>
  <div class="jumbo">
    <div class="container h-100">
      <div class="row h-100">
        <div class="jumbo-text col-12 col-md-6 text-center text-light fs-3 mt-5 py-3">
          I ristoranti migliori della tua città, selezionati direttamente dai nostri esperti
        </div>
        <div class="col-12 col-md-6 h-100 text-center">
          <img src="/images/chef.png" alt="chef" class="w-100 my-3">
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
  
  img{
    max-width: 450px;
  }
  
}

</style>