<template>
  <div>
    <div class="jumbo position-relative">
      <div class="container py-4">
        <div class="row text-center">
          <div class="col-10 col-md-9 col-xl-6 m-auto">
            <h3 class="mb-4 text-light">
              Cerca i tuoi prodotti o locali preferiti
            </h3>
            <input type="text" placeholder="Cerca Qui" class="border-0 text-light text-center">
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
              <img src="/images/scooter2.png" alt="scooter" class="bike position-absolute">
            </div>
            <div class="position-relative w-100 h-100">
              <img src="/images/smoke.png" alt="smoke" class="smoke position-absolute">
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
@import 'resources/sass/_variables.scss';

.jumbo{
  height: 30rem;
  background-color: rgb(133, 193, 255);

  .jumbo-text{
    top: 50%;
    float: left;
    padding-right: 100px;
    font-style: oblique;

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

    .bike{
      transform: rotate(358.7deg);
      animation-delay: 1.5s;
      animation-duration: 2s;
      animation-name: delivery-man;
      animation-timing-function: ease-in-out;
      animation-fill-mode: forwards;
    }

    .smoke{
      height: 20px;
      animation-delay: 1.5s;
      animation-duration: 2s;
      animation-name: smoke;
      animation-timing-function: ease-in-out;
      animation-fill-mode: forwards;

    }
  }

  input{
    width: 26vw;
    background-color: #41708e;
    outline: none;
    border-radius: 20px;
    font-size: 17px;
    text-transform: capitalize;
    transition: 0.2s;
    height: 40px;

    &:hover{
      transition: 0.5s;
      width: 40vw;
      transform: scale(1.1);
      outline: none;
    }

    &::placeholder{
      color: rgba(255, 255, 255, 0.815);
      font-size: 16px;
    }
  }
}

.wave{
  height: 50px;
  background-image: url('/images/wave3.jpg');
  background-size: cover;
  background-position: bottom;
}


//        ---------------  animazione scooter media query  ---------------
@media screen and (min-width: 0px) and (max-width: 575px) {
  .scooter{
    .bike{
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
    .bike{
      height: 320px;
      bottom: -39px;
      right: -27px;
    }

    .smoke{
       
    }

    @keyframes delivery-man {
      0% {right: -27px; bottom: -39px};
      100% {right: 120px; bottom: -42px};
      from {right: -27px; bottom: -39px};
      to {right: 120px; bottom: -42px};
    }

    @keyframes smoke {
      0% {right: 0; bottom: -40px};
      100% {right: 80px; bottom: -42px};
      from {right: 0; bottom: -40px};
      to {right: 80px; bottom: -42px};
    }
  }
}

@media screen and (min-width: 768px) and (max-width: 1200px) {
  .subtitle{
    padding-right: 120px;
  }

  .scooter{
    .bike{
      height: 380px;
      bottom: -37px;
      right: -27px;
    }

    @keyframes delivery-man {
      0% {right: -27px; bottom: -37px};
      100% {right: 180px; bottom: -39px};
      from {right: -27px; bottom: -37px};
      to {right: 180px; bottom: -39px};
    }
  }
}

@media screen and (min-width: 1200px) {
  .scooter{
    .bike{
      height: 380px;
      bottom: -34px;
      right: -27px;
    }

    @keyframes delivery-man {
      0% {right: -27px; bottom: -34px};
      100% {right: 270px; bottom: -36px};
      from {right: -27px; bottom: -34px};
      to {right: 270px; bottom: -36px};
    }
  }
}

@media screen and (min-width: 1400px) {
  .scooter{
    .bike{
      height: 380px;
      bottom: -30px;
      right: -27px;
    }

    @keyframes delivery-man {
      0% {right: -27px; bottom: -30px};
      100% {right: 300px; bottom: -33px};
      from {right: -27px; bottom: -30px};
      to {right: 300px; bottom: -33px};
    }
  }
}
</style>