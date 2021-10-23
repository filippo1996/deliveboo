{{-- <div class="alert alert-success mb-0 mt-2" role="alert">
    Adesso fai parte del fantastico mondo di Deliveboo. Grazie! Questa è la tua Dashboard.
</div> --}}

<div class="modal d-block m-5 p-5" tabindex="-1" role="dialog" id="welcome">
  <div class="modal-dialog" role="document">
    <div class="modal-content text_color background_color_y box_shadows">
     
      <div class="modal-body text-center">
        {{$slot}}
      </div>
        
    </div>
  </div>
</div>

<script>
  setTimeout(function() {
    document.getElementById("welcome").classList.remove("d-block");
  }, 3000);
</script>
