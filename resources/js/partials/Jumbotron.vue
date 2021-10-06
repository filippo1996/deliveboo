<template>
  <div>
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
          <div class="col-10 col-sm-6 position-absolute scooter me-4">
            <div class="position-relative w-100 h-100">
              <img src="storage/frontend/images/scooter2.png" alt="scooter" class="position-absolute">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wave"></div>
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
      transform: rotate(358.7deg);
      animation-delay: 2s;
      animation-duration: 2.5s;
      animation-name: delivery-man;
      animation-timing-function: ease-out;
      animation-fill-mode: forwards;
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

.wave{
  height: 50px;
  background-image: url('/storage/frontend/images/wave2.png');
  background-size: cover;
  background-position: bottom;
}


//media query
@media screen and (min-width: 0px) and (max-width: 575px) {
  .scooter{
    img{
      height: 280px;
      bottom: -45px;
      right: -30px;
    }

  }
}

@media screen and (min-width: 575px) and (max-width: 768px ){
  .subtitle{
    padding-right: 110px;
  }

  .scooter{
    img{
      height: 320px;
      bottom: -39px;
      right: -27px;
    }

    @keyframes delivery-man {
      0% {right: -27px; bottom: -39px};
      100% {right: 120px; bottom: -42px};
      from {right: -27px; bottom: -39px};
      to {right: 120px; bottom: -42px};
    }
  }
}

@media screen and (min-width: 768px) and (max-width: 1200px) {
  .subtitle{
    padding-right: 120px;
  }

  .scooter{
    img{
      height: 380px;
      bottom: -37px;
      right: -27px;
    }

    @keyframes delivery-man {
      0% {right: -27px; bottom: -37px};
      100% {right: 140px; bottom: -39px};
      from {right: -27px; bottom: -37px};
      to {right: 140px; bottom: -39px};
    }
  }
}

@media screen and (min-width: 1200px) {
  .scooter{
    img{
      height: 380px;
      bottom: -34px;
      right: -27px;
    }

    @keyframes delivery-man {
      0% {right: -27px; bottom: -34px};
      100% {right: 180px; bottom: -36px};
      from {right: -27px; bottom: -34px};
      to {right: 180px; bottom: -36px};
    }
  }
}

@media screen and (min-width: 1400px) {
  .scooter{
    img{
      height: 380px;
      bottom: -30px;
      right: -27px;
    }

    @keyframes delivery-man {
      0% {right: -27px; bottom: -30px};
      100% {right: 200px; bottom: -33px};
      from {right: -27px; bottom: -30px};
      to {right: 200px; bottom: -33px};
    }
  }
}
</style>