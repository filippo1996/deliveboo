<template>
<section>

  <div class="container">
    <div class="row">
      <div class="col-9">

        <div class="row row-ristorante my-3 py-5">
          <h1>Nome Ristorante</h1>
          <span>Contatta: numero di telefono</span>
        </div>

          <div class="row mt-1 justify-content-center align-items-center">
            <input class="text-center" type="search" placeholder="Cerca qui">
          </div>

          <div class="row py-5">
            <div class="col-6">
              <div class="card mb-4 py-1 px-1" style="max-width: 540px;">
                <div class="row">
                  <div class=" col-6 col-md-4">
                    <img src="https://www.cucina-naturale.it/wp-content/uploads/2018/07/ciambellacolorata.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title text-uppercase">i più venduti</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
                <div class="row mx-3 mb-2 align-items-center">
                  <div class="col-md-6"><span>5€</span></div>
                  <div class="col-md-6 d-flex justify-content-end"><i class="fas fa-plus big-icon"></i></div>
                </div>
              </div>
            </div>

            <div class="col-6">
              <div class="card mb-3 py-1 px-1" style="max-width: 540px;">
                <div class="row">
                  <div class="col-6 col-md-4">
                    <img src="https://www.cucina-naturale.it/wp-content/uploads/2018/07/ciambellacolorata.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title text-uppercase">i più venduti</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
                <div class="row mx-3 mb-2 align-items-center">
                  <div class="col-md-6"><span>5€</span></div>
                  <div class="col-md-6 d-flex justify-content-end"><i class="fas fa-plus big-icon"></i></div>
                </div>
              </div>
            </div>

            <div class="col-6">
              <div class="card mb-3 py-1 px-1" style="max-width: 540px;">
                <div class="row">
                  <div class="col-6 col-md-4">
                    <img src="https://www.cucina-naturale.it/wp-content/uploads/2018/07/ciambellacolorata.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title text-uppercase">i più venduti</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
                <div class="row mx-3 mb-2 align-items-center">
                  <div class="col-md-6"><span>5€</span></div>
                  <div class="col-md-6 d-flex justify-content-end"><i class="fas fa-plus big-icon"></i></div>
                </div>
              </div>
            </div>

            <div class="col-6">
              <div class="card mb-3 py-1 px-1" style="max-width: 540px;">
                <div class="row">
                  <div class="col-6 col-md-4">
                    <img src="https://www.cucina-naturale.it/wp-content/uploads/2018/07/ciambellacolorata.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title text-uppercase">i più venduti</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
                <div class="row mx-3 mb-2 align-items-center">
                  <div class="col-md-6"><span>5€</span></div>
                  <div class="col-md-6 d-flex justify-content-end"><i class="fas fa-plus big-icon"></i></div>
                </div>
              </div>
            </div>  
        
          </div>


      </div>
      <div class="col-3">
        <div class="row mt-3 justify-content-center">
          <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h2 class="card-title text-center">Carrello</h2>
          <h6 class="card-subtitle mb-2 text-muted text-center">Spendi € 8,00 per evitare il supplemento</h6>
          <div class="row my-3 lista pb-2">
            <div class="row">
              <div class="col-2 fw-bold n-carrello">1x</div>
              <div class="col-7 text-center">Nome del bellissimo prodotto</div>
              <div class="col-3 price">5,20€</div>
            </div>
            <div class="row">
              <div class="col-md-6 d-flex justify-content-start"><i class="fas fa-minus"></i></div>
              <div class="col-md-6 d-flex justify-content-end"><i class="fas fa-plus"></i></div>
            </div>
          </div>
          <div class="row my-3 lista pb-2">
            <div class="row">
              <div class="col-2 fw-bold n-carrello">1x</div>
              <div class="col-7 text-center">Nome del bellissimo prodotto</div>
              <div class="col-3 price">5,20€</div>
            </div>
            <div class="row">
              <div class="col-md-6 d-flex justify-content-start"><i class="fas fa-minus"></i></div>
              <div class="col-md-6 d-flex justify-content-end"><i class="fas fa-plus"></i></div>
            </div>
          </div>
          <div class="d-flex justify-content-center"><a href="#" class="order-button btn btn-success rounded-pill">Ordina</a></div>
        </div>
      </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-9 d-flex justify-content-center mb-5">
        <router-link class="home" :to="{ name: 'home' }">{{ '&#8962; Torna alla home' }}</router-link>
      </div>
    </div>
  </div>

</section>
  
</template>

<script>
export default {
  
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';


section{
background: #ffd670;
}

input{
  border-radius: 20px;
  padding: 5px;
  border: none;
  background-color: white;
  width: 35rem;
  &:focus{
    outline: $light-blue solid 3px;
  }
}

.s-bar{
  width: 98%;
}

.big-icon{
  font-size: 20px;
  color: #41708E;
  background-color: $light-blue;
  padding: 5px 7px;
  border-radius: 50%;
}

.lista{
  max-height: 500px;
  overflow-y: scroll;
}

.n-carrello, .price{
  font-size: 12px;
}

.lista{
  border-bottom: 1px solid lightgray;
}

.row-ristorante{
  background-image: url("https://wallpaperaccess.com/full/462778.jpg");
  color: white;
}

.order-button{
  background-color: $light-blue;
  color: white;
}

.home{
  background-color: $light-blue;
  padding: 10px;
  border-radius: 20px;
  text-decoration: none;
}

</style>