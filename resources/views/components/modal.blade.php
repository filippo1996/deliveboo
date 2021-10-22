{{-- <div class="alert alert-success mb-0 mt-2" role="alert">
    Adesso fai parte del fantastico mondo di Deliveboo. Grazie! Questa è la tua Dashboard.
</div> --}}

<div class="modal d-block m-5 p-5" tabindex="-1" role="dialog" id="welcome">
  <div class="modal-dialog" role="document">
    <div class="modal-content text_color background_color_y box_shadows">
      <div class="modal-header m-auto text-center">
        <h5 class="modal-title fs-5 fw-bold">Benvenuto in Deliveboo</h5>
      </div>

      <div class="modal-body text-center">
        <p class="fs-6 mt-5">Questa è la tua Dashboard</p>
      </div>
        
      {{-- <div class="modal-footer">
     
      </div> --}}
    </div>
  </div>
</div>

<script>
  setTimeout(function() {
    document.getElementById("welcome").classList.remove("d-block");
  }, 3000);
</script>
