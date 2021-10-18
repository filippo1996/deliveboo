<template>
  <section class="mt-5">
    <div class="background_color">
      <div class="container pt-5">
         <!-- Riga 1 -->
        <div class="row mt-5 p-5">
          <div class="col-6 d-flex">
            <p class="d-flex align-items-center">Mi ritengo una persona abbastanza curiosa e con tanta voglia di imparare. Sono sempre pronto a mettermi in gioco per apprendere e imparare tutto ciò che riguarda il mondo della tecnologia e non solo.
            Questa mia caratteristica, negli anni, mi ha permesso di perfezionare sempre di più il mio modo di lavorare.</p>
          </div>
          <div class="col-6 text-center">
            <img src="images/us/fil.jpg" alt="fil" class="circle">
          </div>
        </div>


        <!-- Riga 2 -->
        <div class="row mt-5 p-5">
          <div class="col-6 text-center">
            <img src="images/us/fraJ.jpg" alt="fraJ" class="circle">
          </div>
          <div class="col-6 d-flex">
            <p class="d-flex align-items-center">Da sempre appassionato di tecnologia e programmazione, mi riservo anche del tempo per passeggiate in montagna sempre in cerca di nuove esperienze.</p>
          </div>
        </div>


        <!-- Riga 3 -->
        <div class="row mt-5 p-5">
          <div class="col-6 d-flex">
            <p class="d-flex align-items-center">Sono un ragazzo di 23 anni . Appassionato da sempre del mondo informatico e quello dell'economia, alla continua ricerca di stimoli per la crescita personale. Sono energico e solare ho un’ottima attitudine al lavoro in team. Ho un forte spirito di gruppo e di adattamento grazie all’esperienza acquisita in ambienti multiculturali e lavorativi, sempre disposto a mettermi in gioco e lanciarmi in nuove sfide.</p>
          </div>
          <div class="col-6 text-center">
            <img src="images/us/fra.jpg" alt="fra" class="circle">
          </div>
        </div>


        <!-- Riga 4 -->
        <div class="row mt-5 p-5">
          <div class="col-6 text-center">
            <img src="images/us/nico.jpg" alt="nico" class="circle">
          </div>
          <div class="col-6 d-flex">
            <p class="d-flex align-items-center">Sono un ragazzo appassionato di tecnologia, attento ai dettagli e sempre pronto ad imparare.
            Voglio approfondire la mia conoscenza nei linguaggi di programmazione e mettermi in gioco nel mondo dello sviluppo web.</p>
          </div>
        </div>


        <!-- Riga 5 -->
        <div class="row mt-5 p-5">
          <div class="col-6 d-flex">
            <p class="d-flex align-items-center">Curioso e tech addicted. Se non scrivo codice, allora leggo. Adoro passeggiare immerso nella natura.</p>
          </div>
          <div class="col-6 text-center">
            <img src="images/us/melo.png" alt="melo" class="circle">
          </div>
        </div>
      </div>
    </div>
  </section>
</template>


<script>
export default {
  name: 'AboutUs'
 
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

.container {
  max-width: 60%;
}

.background_color {
  background-color: rgb(255, 214, 112);
}

img {
  width: 142px;
}

.circle {
  border-radius: 50%;
}


</style>