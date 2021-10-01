<template>
  <div class="jumbo">
    <div class="container py-4">
      <div class="row text-center">
        <div class="col-10 col-md-9 col-xl-6 m-auto">
          <h2 class="mb-4">
            Trova quello che vuoi
          </h2>
          <input type="text" class="w-100">
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
  height: 20rem;
  background-color: orangered;

  input{
    height: 30px;
    border: none;
    border-radius: 50px;
  }
}
</style>