<template>
  <div class="container mt-5">
    <div class="row pt-5">
      <div class="col">
        <form id="payment-form mb-3">
          <div id="dropin-container"></div>
          <input class="btn btn-primary" type="submit" value="Paga"/>
          <!-- <input type="hidden" id="nonce" name="payment_method_nonce"/> -->
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { Cart } from '../utils/factory.js';

export default {
  name: 'Payment',
  data(){
    return {
      //
    }
  },
  mounted(){
    const form = document.getElementById('payment-form');

    braintree.dropin.create({
      authorization: 'sandbox_ykxp8j4d_7sqb2c99q7hnvmzj',
      container: '#dropin-container',
      locale: 'it_IT'
    }).then((dropinInstance) => {
      form.addEventListener('submit', (event) => {
        event.preventDefault();

        dropinInstance.requestPaymentMethod().then( async (payload) => {
          // Ready for payment
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
              this.$router.push({ name: 'success', params: { repositories: 'authorized' } });
            } else {
              let code = response.data.errors?.code;
              let message = response.data.errors?.message;
              alert('errore nel pagamento codice ' + code + ' : ' + message);
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

<style>

</style>