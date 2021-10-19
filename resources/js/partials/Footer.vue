<template>
  <div class="bg-dark">
    <div class="container position-relative py-5">
      <div class="row justify-content-md-around pb-2">

        <div class="col-12 text-light">
          <div class="row">
            <div class="col-12 col-md-4 mt-5">
              <h4 class="mb-4">Lavora con noi</h4>
              <ul class="fs-6">
                <li><a href="#">Il nostro blog</a></li>
                <li><a href="#">Lavora con noi</a></li>
                <li><a href="#">Diventa nostro partner</a></li>
                <li><a href="#">Investitori</a></li>
              </ul>
            </div>

            <div class="col-12 col-md-4 mt-5">
              <h4 class="mb-4">Aiuto</h4>
              <ul class="fs-6">
                <li><a href="#contact">Contattaci</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Tipi di cucina</a></li>
                <li><a href="#">Mappa del sito</a></li>
              </ul>
            </div>
            
            <div class="col-12 col-md-4 my-5">
              <h4 class="mb-4">Social</h4>
                <div class="box d-flex">
                  <a href="#" data-text="Facebook">
                    <i class="fab fa-facebook facebook"></i>
                  </a>
                  <a href="#" data-text="Instagram">
                    <i class="fab fa-instagram instagram"></i>
                  </a>
                  <a href="#" data-text="Twitter">
                    <i class="fab fa-twitter twitter"></i>
                  </a>
                  <a href="#" data-text="Youtube">
                    <i class="fab fa-youtube youtube"></i>
                  </a>
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
  name: "Footer",
}

</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

ul {
  padding: 0;

  li {
    list-style: none;

    a {
      text-decoration: none;
      color: rgb(240, 178, 8);
    }
  }
}

.box a{
  width: 40px;
  height: 40px;
  float: left;
  display: flex;
  justify-content: center;
  align-items: center;
  text-decoration: none;
  border-radius: 50%;
  margin: 0.3em;
  position: relative;
  color: $yellow;
  background: rgb(66, 65, 65);
  transition: all 0.4s;
}

.box a:hover{
  transform: scale(0.9);
}

.box a::before{
  // content: attr(data-text);
  position: absolute;
  top: 7px;
  left: 50px;
  border-radius: 50px;
  width: 150px;
  height: 60%;
  display: flex;
  justify-content: center;
  align-content: center;
  font-family: 700;
  color: rgb(240, 178, 8);
  background: rgb(255, 255, 255);
  display: none;
}

.box a:hover::before{
  display: flex;
}

.box a::after{
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 50px;
  width: 40px;
  height: 40px;
  background: rgb(255, 255, 255);
  transform: scale(0);
  transition: all 0.4s;
}

.box a:hover::after{
  transform: scale(0.8);
}

.box a i{
  z-index: 20;
  transition: all 0.4s;
}

.box a:hover i{
  transform: scale(1.4);
}

.box a:hover .facebook{
  color: royalblue;
}

.box a:hover .instagram{
  color: #e7495b;
}

.box a:hover .twitter{
  color: rgb(103, 138, 241);
}

.box a:hover .youtube{
  color: rgb(252, 18, 18);
}

</style>