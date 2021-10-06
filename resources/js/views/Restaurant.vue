<template>
<section>

  <div class="container">
    <div class="row">
      <div class="col-8">

        <div class="row row-ristorante my-3">
          <h1>Nome Ristorante</h1>
          <span>Contatta: numero di telefono</span>
        </div>

          <div class="row mt-1">
            <input type="search" placeholder="Barra di ricerca">
          </div>

          <div class="row py-5">
            <div class="col-6">
              <div class="card mb-3 py-1 px-1" style="max-width: 540px;">
                <div class="row">
                  <div class="col-md-4">
                    <img src="https://www.cucina-naturale.it/wp-content/uploads/2018/07/ciambellacolorata.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title text-uppercase">i più venduti</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6"><span>5€</span></div>
                  <div class="col-md-6 d-flex justify-content-end"><i class="fas fa-plus"></i></div>
                </div>
              </div>
            </div>

            <div class="col-6">
              <div class="card mb-3 py-1 px-1" style="max-width: 540px;">
                <div class="row">
                  <div class="col-md-4">
                    <img src="https://www.cucina-naturale.it/wp-content/uploads/2018/07/ciambellacolorata.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title text-uppercase">i più venduti</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6"><span>5€</span></div>
                  <div class="col-md-6 d-flex justify-content-end"><i class="fas fa-plus"></i></div>
                </div>
              </div>
            </div>
        
          </div>


      </div>
      <div class="col-4">
        <div class="row mt-3 justify-content-center">
          <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h2 class="card-title text-center">Carrello</h2>
          <h6 class="card-subtitle mb-2 text-muted text-center">Spendi € 8,00 per evitare il supplemento</h6>
          <div class="row my-3">

          </div>
          <div class="d-flex justify-content-center"><a href="#" class="btn btn-success rounded-pill">Ordina</a></div>
        </div>
      </div>
        </div>
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
section{
background: #ffd670;
}

.row-ristorante{
  border: 2px solid black;
}
input{
  border-radius: 20px;
  padding: 5px;
  border: none;
  background-color: white;
}

</style>