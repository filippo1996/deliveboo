<template>
  <main>
    <div class="container py-5">

      <div class="row">
        <ul class="list-unstyled d-flex flex-wrap">
          <li>
            <a class="text-decoration-none text-dark fs-3 me-3 p-1" href="">Panineria</a> 
          </li>
          <li>
            <a class="text-decoration-none text-dark fs-3 me-3 p-1" href="">Pizzeria</a>
          </li>
          <li>
            <a class="text-decoration-none text-dark fs-3 me-3 p-1" href="">Fast Food</a> 
          </li>
          <li>
            <a class="text-decoration-none text-dark fs-3 me-3 p-1" href="">Gelateria</a> 
          </li>
        </ul>
      </div>

      <div class="row justify-content-md-around">

        <div class="col-12 col-sm-6  col-lg-3 d-flex my-3">
          <div class="card bg-dark text-white">
            <img src="https://www.obiettivoinsalute.it/media/k2/items/cache/4fcf9d660236ddb62c8456017158615a_XL.jpg" class="card-img" alt="...">
            <div class="card-img-overlay text-center text-light shadow">
              <div class="description ">
                <h3 class="card-title">Titolo</h3>
                <span class="tag">Tagggggg</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6  col-lg-3 d-flex my-3">
          <div class="card bg-dark text-white">
            <img src="https://www.obiettivoinsalute.it/media/k2/items/cache/4fcf9d660236ddb62c8456017158615a_XL.jpg" class="card-img" alt="...">
            <div class="card-img-overlay text-center text-light shadow">
              <div class="description ">
                <h3 class="card-title">Titolo</h3>
                <span class="tag">Tagggggg</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6  col-lg-3 d-flex my-3">
          <div class="card bg-dark text-white">
            <img src="https://www.obiettivoinsalute.it/media/k2/items/cache/4fcf9d660236ddb62c8456017158615a_XL.jpg" class="card-img" alt="...">
            <div class="card-img-overlay text-center text-light shadow">
              <div class="description ">
                <h3 class="card-title">Titolo</h3>
                <span class="tag">Tagggggg</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6  col-lg-3 d-flex my-3">
          <div class="card bg-dark text-white">
            <img src="https://www.obiettivoinsalute.it/media/k2/items/cache/4fcf9d660236ddb62c8456017158615a_XL.jpg" class="card-img" alt="...">
            <div class="card-img-overlay text-center text-light shadow">
              <div class="description ">
                <h3 class="card-title">Titolo</h3>
                <span class="tag">Tagggggg</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6  col-lg-3 d-flex my-3">
          <div class="card bg-dark text-white">
            <img src="https://www.obiettivoinsalute.it/media/k2/items/cache/4fcf9d660236ddb62c8456017158615a_XL.jpg" class="card-img" alt="...">
            <div class="card-img-overlay text-center text-light shadow">
              <div class="description ">
                <h3 class="card-title">Titolo</h3>
                <span class="tag">Tagggggg</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6  col-lg-3 d-flex my-3">
          <div class="card bg-dark text-white">
            <img src="https://www.obiettivoinsalute.it/media/k2/items/cache/4fcf9d660236ddb62c8456017158615a_XL.jpg" class="card-img" alt="...">
            <div class="card-img-overlay text-center text-light shadow">
              <div class="description ">
                <h3 class="card-title">Titolo</h3>
                <span class="tag">Tagggggg</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6  col-lg-3 d-flex my-3">
          <div class="card bg-dark text-white">
            <img src="https://www.obiettivoinsalute.it/media/k2/items/cache/4fcf9d660236ddb62c8456017158615a_XL.jpg" class="card-img" alt="...">
            <div class="card-img-overlay text-center text-light shadow">
              <div class="description ">
                <h3 class="card-title">Titolo</h3>
                <span class="tag">Tagggggg</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6  col-lg-3 d-flex my-3">
          <div class="card bg-dark text-white">
            <img src="https://www.obiettivoinsalute.it/media/k2/items/cache/4fcf9d660236ddb62c8456017158615a_XL.jpg" class="card-img" alt="...">
            <div class="card-img-overlay text-center text-light shadow">
              <div class="description ">
                <h3 class="card-title">Titolo</h3>
                <span class="tag">Tagggggg</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: "Main",
}
</script>

<style lang="scss" scoped>
main{
  background-color: rgb(255, 123, 0);

    .shadow{
      background-color: rgba(100, 100, 100, 0.4);
      
      .description{
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
      }
    }

    .tag{
      background-color: rgba(0, 0, 0, 0.5);
      padding: 5px 10px;
      border-radius: 20px;
    }
}
</style>