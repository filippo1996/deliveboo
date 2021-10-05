<template>
  <div class="jumbo position-relative">
    <div class="container py-4">
      <div class="row text-center">
        <div class="col-10 col-md-9 col-xl-6 m-auto">
          <h3 class="mb-4 text-light">
            Cerca i tuoi prodotti o locali preferiti
          </h3>
          <input type="text" class="w-100">
        </div>
      </div>
      <div class="row clearfix">
        <div class="jumbo-text d-none d-sm-block col-sm-6 text-light position-absolute">
          <div class="title text-uppercase">
            Consegnamo la felicità
          </div>
          <div class="subtitle my-2">
            Il cibo che ami direttamente a casa tua
          </div>
        </div>
        <div class="col-10 col-sm-4 position-absolute scooter me-4">
          <img src="../../../public/img/scooter.png" alt="scooter">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Jumbotron"
}
</script>

<style lang="scss" scoped>
.jumbo{
  height: 30rem;
  background-color: rgb(133, 193, 255);

  .jumbo-text{
    top: 50%;
    float: left;
    padding-right: 100px;

    .title{
      font-size: clamp(1rem, 3vw, 3rem);
    }

    .subtitle{
      font-size: clamp(0.5rem, 3vw, 1.5rem);
    }
  }

  .scooter{
    height: 370px;
    bottom: 0;
    right: 0;

    img{
      height: 100%;
      float: right;
    }
  }

  input{
    height: 30px;
    border: none;
    border-radius: 50px;
    padding: 20px;
    z-index: 3;
  }
}
</style>