<template>
  <div class="not_found">
    <div class="background">

      <h1 class="fs-2 pt-1 mb-1 pt-5">Oops! Non abbiamo trovato questa pagina.</h1>

      <img src="images/not_found.png" alt="">

      <div class="mt-2">
        <h2 class="fs-3">Forse puoi trovare quello che cerchi qui?</h2>
      </div>

      <div class="d-flex justify-content-center mt-2">
        <ul class="d-flex list-unstyled">
          <li class="p-3">
            <a href="localhost:8000" class="text-reset text-decoration-none">Deliveboo</a>
          </li>
          <li class="p-3">
            <a href="" class="text-reset text-decoration-none">Contattaci</a>
          </li>
          <li class="p-3">
            <a href="" class="text-reset  text-decoration-none">Chi Siamo</a>
          </li>
        </ul>
      </div>
  </div>
</div>
</template>


<script>
export default {

}
</script>


<style lang="scss" scoped>

.not_found {
  color: #334e62;

  .background {
  background-color: rgb(255, 214, 112);
  text-align: center;
  object-fit: cover;

    img {
      width: 800px;
    }

  }
}

</style>