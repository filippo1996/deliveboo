<template>
  <section :class="{'load': loading}">
    <div class="container mt-5 overflow-hidden">
    <div class="row pt-5">
      <div class="col">
        <form id="payment-form" :class="{ 'd-none' : paymentProcessing }">
          <div id="dropin-container"></div>
          <input :class="{ 'd-none' : loadingPayament }" class="btn bottone mt-3 mb-5" type="submit" value="Paga"/>
          <!-- <input type="hidden" id="nonce" name="payment_method_nonce"/> -->
        </form>
        <div class="d-none x" :class="{ 'load' : paymentProcessing }">
          <div class="fw-bold buffering fs-5">Pagamento in corso...</div>
          <img src="/images/meta.gif" alt="food">
        </div>
      </div>
    </div>
  </div>
  </section>
</template>

<script>
import { Cart } from '../utils/factory.js';

export default {
  name: 'Payment',
  data(){
    return {
      loadingPayament: true,
      loading: true,
      paymentProcessing: false
    }
  },
  mounted(){
    const form = document.getElementById('payment-form');

    braintree.dropin.create({
      authorization: 'sandbox_ykxp8j4d_7sqb2c99q7hnvmzj',
      container: '#dropin-container',
      locale: 'it_IT'
    }).then((dropinInstance) => {
      this.loadingPayament = false;
      form.addEventListener('submit', (event) => {
        event.preventDefault();

        dropinInstance.requestPaymentMethod().then( async (payload) => {
          // Ready for payment
          this.paymentProcessing = true;
          const cart = new Cart();
          const address = JSON.parse(localStorage.getItem('address'));
          try{
            let response = await axios.post('/api/payment', { 
              payment_method_nonce: payload.nonce,
              address,
              cart: cart.getCart(),
              totalPrice: cart.getTotalPrice()
            });
            if(response.data.success) {
              // payment successfully
              cart.clearCart(); 
              this.$router.push({ name: 'success', params: { repositories: 'authorized' } });
            } else {
              // payment declined
              this.paymentProcessing = false;
              let code = response.data.errors?.code;
              let message = response.data.errors?.message;
              customMessage('alert','Errore pagamento!', 'Codice ' + code + ' : ' + message);
            }
          } catch(error){
            console.log(error);
          }
          //document.getElementById('nonce').value = payload.nonce;
          //form.submit();
        }).catch((error) => { throw error; });
      });
    }).catch((error) => {
      console.log(error);
      // handle errors
    });
  }

}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

section{
  background-color: #6FA3D6;
  color: white;

  .bottone{
    background-color: $blue;
    
    &:hover{
      background-color: #5087aa;
    }
  }
}

// loading
.x{
  position: relative;
  top: -10px;
}

.load{
  width: 100%;
  height: 90vh;
  
  display: flex !important;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #6fa3d6;
  z-index: 500;
  background-size: 250px;

  img{
    width: 250px;
  }
}

</style>