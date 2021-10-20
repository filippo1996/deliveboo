<template>
  <div class="background_color">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="not_found">
            <div class="content pt-5">
              <h1 class="fs-2 mb-1 pt-1 pt-5">Oops! Non abbiamo trovato questa pagina.</h1>

              <img src="images/not_found.png" class="img-fluid" alt="Pagina non trovata">

              <div class="mt-2">
                <h2 class="fs-3">Forse puoi trovare quello che cerchi qui?</h2>
              </div>

              <div class="d-flex justify-content-center mt-2 pb-5">
                <ul class="d-flex list-unstyled">
                  <li class="fs-6 p-3">
                    <router-link 
                      class="text-reset text-decoration-none" 
                      :to="{name: 'home'}">{{ 'Deliveboo' }}
                    </router-link>
                  </li>

                  <li class="fs-6 p-3">
                    <a href="" class="text-reset text-decoration-none">Contattaci</a>
                  </li>

                  <li class="fs-6 p-3">
                    <router-link 
                      class="text-reset text-decoration-none" @click="returnToTop" 
                      :to="{name: 'aboutus'}">{{ 'Chi Siamo' }}
                    </router-link>
                  </li>
                </ul>
              </div>
            </div>
          </div>
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
@import 'resources/sass/_variables.scss'; 

.background_color {
  background-color: rgb(255, 214, 112);

  .not_found {
  color: #334e62;
  
    .content {
      text-align: center;

      img {
        width: 620px;
      }
    }
  }
}
</style>