<template>
  <div class="bg-dark">
    <div class="container">
      <div class="row justify-content-md-around">

        <div class="col-8 text-light mt-4">
          <h2>Deliveboo</h2>
          <div class="row mt-3 mb-3">
            <div class="col-12 col-md-4">
              <h4>Lavora con noi</h4>
              <ul>
                <li><a href="#">Link footer</a></li>
                <li><a href="#">Link footer</a></li>
                <li><a href="#">Link footer</a></li>
                <li><a href="#">Link footer</a></li>
                <li><a href="#">Link footer</a></li>
              </ul>
            </div>

            <div class="col-12 col-md-4">
              <h4>About us</h4>
              <ul>
                <li><a href="#">Link footer</a></li>
                <li><a href="#">Link footer</a></li>
                <li><a href="#">Link footer</a></li>
                <li><a href="#">Link footer</a></li>
                <li><a href="#">Link footer</a></li>
              </ul>
            </div>
            
            <div class="col-12 col-md-4">
              <h2>Follow us</h2>
              <div class="main center">

                <div class="box center">

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
  </div>
</template>

<script>
export default {
  name: "Footer",
}
</script>

<style lang="scss" scoped>
.center{
  display: flex;
  justify-content: center;
  align-items: center;
}
.box{
  flex-direction: column;
}


.box a{
  width: 40px;
  height: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-decoration: none;
  border-radius: 50%;
  margin: 0.3em;
  position: relative;
  color: #f0b208 ;
  background: rgb(66, 65, 65);
  transition: all 0.4s;
}
  .box a:hover{
    transform: scale(0.9);
  }
  .box a::before{
    content: attr(data-text);
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
  .box a:hover .facebook{
    color: royalblue;
  }
  .box a:hover .instagram{
    color: rgb(225, 65, 217);
  }
  .box a:hover .twitter{
    color: rgb(103, 138, 241);
  }
  .box a:hover .youtube{
    color: rgb(252, 18, 18);
  }
</style>