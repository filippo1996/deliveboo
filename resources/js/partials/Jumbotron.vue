<template>
  <div class="jumbo position-relative">
    <div class="container py-4">
      <div class="row text-center">
        <div class="col-10 col-md-9 col-xl-6 m-auto">
          <h2 class="mb-4">
            Trova quello che vuoi
          </h2>
          <input type="text" class="w-100">
        </div>
      </div>
      <div class="row clearfix">
        <div class="d-none d-sm-block col-sm-6 jumbo-text text-uppercase text-center position-absolute">
          Consegnamo la felicità
        </div>
        <div class="col-12 col-sm-6 position-absolute scooter">
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
    font-size: 3rem;
    float: left;

  }

  .scooter{
    height: 400px;
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
  }
}
</style>