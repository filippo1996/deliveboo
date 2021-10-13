<template>
  <section>
    <div class="container">
      <div class="row py-5">
        <div class="col-6 mt-5 d-flex align-items-center">
         <h3>L'ordine è stato completato con successo, arriverà il prima possibile.</h3>
        </div>
        <div class="col-6 d-flex justify-content-center mt-5">
          <img src="/images/food2.png" alt="food">
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Success'

}
</script>

<style lang="scss" scoped>

  section{
    background-color: #6FA3D6;
  }

  h3{
    color: white;
    text-align: center;
  }

</style>