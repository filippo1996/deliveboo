<template>
  <div>
    <div class="main">

      <!-- Nome Ristorante -->
      <div class="row cover">
        <h2>Nome Ristorante</h2>
      </div>

      <!-- Descrizione -->
      <div class="row p-5">
        <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius et illo perspiciatis, nihil unde obcaecati. Quod rem debitis ullam iste ratione sint doloribus repellat, temporibus exercitationem ab, ducimus totam esse.</p>
      </div>

      <!-- Info -->
      <div class="row mb-5 p-5">
        <span class="info">Indirizzo: </span>
        <span class="info">Numero Civico: </span>
        <span class="info">Codice Postale: </span>
        <span class="info">Numero di telefono: </span>
      </div>

      <h3 class="p-5">Prodotti</h3>

      <!-- Scheda Singolo Prodotto -->
      <div class="row mt-5 product">

        <!-- img -->
        <div class="col-3 align-self-center ">
          <img src="https://www.auntminnieeurope.com/user/images/content_images/nws_rad/2015_01_28_12_24_19_220_hamburger_200.jpg" alt="food">
        </div>

        <!-- Nome e info prodotto -->
        <div class="col-3 align-self-center">
          <div class="row bold">Nome Prodotto</div>
          <div class="row">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est totam asperiores modi officia distinctio architecto, sequi corporis tenetur deserunt blanditiis, dolorem illum quod dolorum, aperiam minus. Voluptatibus sint dolorum itaque.</div>
        </div>

        <!-- Prezzo -->
        <div class="col-3 align-self-center text-center">Prezzo</div>

        <!-- Cart icon -->
        <div class="col-3 align-self-center">
          <i class="fas fa-cart-plus"></i>
        </div>
      </div>

      <!-- Scheda Singolo Prodotto -->
      <div class="row mt-5 product">

        <!-- img -->
        <div class="col-3 align-self-center ">
          <img src="https://www.auntminnieeurope.com/user/images/content_images/nws_rad/2015_01_28_12_24_19_220_hamburger_200.jpg" alt="food">
        </div>

        <div class="col-3">
          <div class="row bold">Nome Prodotto</div>
          <div class="row">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est totam asperiores modi officia distinctio architecto, sequi corporis tenetur deserunt blanditiis, dolorem illum quod dolorum, aperiam minus. Voluptatibus sint dolorum itaque.</div>
        </div>

        <div class="col-3 align-self-center text-center">Prezzo</div>

        <div class="col-3 align-self-center">
          <i class="fas fa-cart-plus"></i>
        </div>
      </div>

      <!-- Scheda Singolo Prodotto -->
      <div class="row mt-5 product">

        <!-- img -->
        <div class="col-3 align-self-center ">
          <img src="https://www.auntminnieeurope.com/user/images/content_images/nws_rad/2015_01_28_12_24_19_220_hamburger_200.jpg" alt="food">
        </div>

        <div class="col-3">
          <div class="row bold">Nome Prodotto</div>
          <div class="row">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est totam asperiores modi officia distinctio architecto, sequi corporis tenetur deserunt blanditiis, dolorem illum quod dolorum, aperiam minus. Voluptatibus sint dolorum itaque.</div>
        </div>

        <div class="col-3 align-self-center text-center">Prezzo</div>

        <div class="col-3 align-self-center">
          <i class="fas fa-cart-plus"></i>
        </div>
      </div>

      <!-- Scheda Singolo Prodotto -->
      <div class="row mt-5 product">

        <!-- img -->
        <div class="col-3 align-self-center m-left">
          <img src="https://www.auntminnieeurope.com/user/images/content_images/nws_rad/2015_01_28_12_24_19_220_hamburger_200.jpg" alt="food">
        </div>

        <div class="col-3">
          <div class="row bold">Nome Prodotto</div>
          <div class="row">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est totam asperiores modi officia distinctio architecto, sequi corporis tenetur deserunt blanditiis, dolorem illum quod dolorum, aperiam minus. Voluptatibus sint dolorum itaque.</div>
        </div>

        <div class="col-3 align-self-center text-center">Prezzo</div>

        <div class="col-3 align-self-center">
          <i class="fas fa-cart-plus"></i>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>

.main{
  background-color: rgb(255, 214, 112);
  .cover{
    background-image: url("https://wallpaperaccess.com/full/462778.jpg");
    padding: 100px 0;
    h2{
      color: white;
    }
  }
}

// .m-left{
//   margin-left: 50px;
// }

.p-5{
  padding: 0 5%;
}

.bold{
  font-weight: bold;
  margin-bottom: 20px;
}

.product{
  margin: 0 5%;
  border: 5px solid black;
  border-radius: 5px;
}

i{
  font-size: 30px;
  cursor: pointer;
}

</style>