<template>
  <section>
    <div class="container">

      <div class="row d-flex justify-content-center py-5">
        <div class="col-md-6 col-md-offset-3" id="form_container">
            <h2>Contattaci</h2>
            <p>Invia qui il tuo messaggio. Ti risponderemo al più presto!</p>

            <form role="form" method="post" id="reused_form">
              <div class="row mb-4">
                <div class="col-sm-12 form-group">
                  <label for="message" class="mb-2">Messaggio:</label>
                    <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7"></textarea>
                    </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label for="name" class="mb-2">Nome:</label>
                    <input 
                      type="text" 
                      class="form-control" 
                      id="name" 
                      name="name" required>
                  </div>

                    <div class="col-sm-6 form-group">
                      <label for="email" class="mb-2">E-mail:</label>
                        <input 
                          type="email" 
                          class="form-control" 
                          id="email" 
                          name="email" 
                          required>
                    </div>
                </div>

                <div class="row mt-4">
                  <div class="col-sm-12 form-group">
                    <button 
                      type="submit" 
                      class="btn btn-outline-light">Invia
                    </button>
                  </div>
                </div>
            </form>


            <div id="success_message" style="width:100%; height:100%; display:none;">
              <h3>Posted your message successfully!</h3>
            </div>

            <div id="error_message"
              style="width:100%; height:100%; display:none; ">
                <h3>Error</h3>
                Spiacenti, si è verificato un errore durante l'invio del modulo
            </div>
        </div>
      </div>

    </div>
  </section>
</template>


<script>
export default {
  name: "ContactUs",

  components: {
    
  }

}
</script>


<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

section {
  background-color: rgb(255, 214, 112);
  color: white;
}

</style>