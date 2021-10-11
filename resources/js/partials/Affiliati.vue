<template>
  <div class="jumbo">
    <div class="container h-100">
      <div class="row h-100">
        <div class="jumbo-text col-12 col-md-6 text-center text-light">
          <h2 class="title">
            I ristoranti migliori della tua città, selezionati direttamente dai nostri esperti
          </h2>  
          <div class="subtitle mt-5">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores rem nihil quod culpa nam! Hic asperiores distinctio, dolore alias ullam impedit nam placeat accusantium, eaque magni adipisci? Dolores, mollitia atque.
          </div>
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

  .jumbo-text{
    margin-top: 80px;

    .title{
      text-align: center;
      line-height: 1.4;
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