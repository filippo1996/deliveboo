<template>
  <section id="contact">
    <div class="container">

      <div class="row d-flex justify-content-center py-5">
        <div class="col-md-6 col-md-offset-3" id="form_container">
          
              <div class="row text-center mb-1">
                <div class="col-12 d-inline-block">
                  <span class="fs-4 ps-3">Contattaci</span>
                  <img src="/images/mail.png" alt="mail" class="ps-3">
                </div>
              </div>

             <div class="row text-center mb-4">
                <div class="col-12">
                  <p class="m-0 fs-6">Invia il tuo messaggio. 
                    Ti risponderemo al più presto!</p>
                </div>
             </div>
     

            <form @submit.prevent="sendMessage" id="reused_form">
              <div class="row mb-4">
                <div class="col-sm-12 form-group">
                    <textarea 
                      v-model="message" 
                      class="form-control" 
                      type="textarea" 
                      name="message" 
                      id="message" 
                      maxlength="6000" 
                      rows="7" 
                      placeholder="Scrivi qui il tuo messaggio..." required>
                    </textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 form-group">
                    <input
                      v-model="name" 
                      type="text" 
                      class="form-control" 
                      id="name" 
                      placeholder="Nome"
                      name="name" required>
                  </div>

                    <div class="col-sm-6 form-group">
                      <input
                        v-model="email" 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        placeholder="E-mail"
                        required>
                    </div>
                </div>

                <div class="row my-4">
                  <div class="col-sm-12 form-group">
                    <button 
                      type="submit" 
                      class="btn bottone">Invia
                    </button>
                  </div>
                </div>
            </form>

            <div v-show="response" id="success_message">
              <span class="fs-5">{{ response }}</span>
            </div>
        </div>
      </div>
    </div>
  </section>
</template>


<script>
export default {
  name: "ContactUs",
  data(){
    return {
      message: '',
      name: '',
      email: '',
      response: undefined
    }
  },
  methods:{
    async sendMessage(){
      try {
        const response = await axios.post('/api/contact', {message: this.message, name: this.name, email: this.email});
        if(response.data === 1) {
          this.message = '';
          this.name = '';
          this.email = '';
          this.response = 'Messaggio inviato con successo.';
        } else {
          this.response = response.data;
        }
        setTimeout(() => this.response = undefined, 5000);
      } catch(error) {
        console.log(error);
      }
    }
  }

}
</script>


<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

section {
  background-color: rgb(255, 214, 112);
  color: $blue;
}
img {
  width: 80px;
}
</style>