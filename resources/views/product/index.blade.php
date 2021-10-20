@extends('layouts.app')
@section('title', 'Prodotti')

@section('content')
  <div class="container">
    @if (session('updated'))
      <div class="alert alert-success">{{ session('updated') }}</div>        
    @endif
    
    <div class="row overflow-hidden">
      <div class="col-12">
        <div class="text-center fs-4 fw-bold text_color mt-5">Elenco prodotti</div>
        
        <div class="table-responsive mt-1">
          <table class="table table-sm table-hover">
            <thead class="text_color background_color_y">
              <tr class="text-start">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Desrizione</th>
                <th scope="col">Foto</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Visibilità</th>
                <th scope="col" class="text-center">Visualizza</th>
                <th scope="col" class="text-center">Modifica</th>
                <th scope="col" class="text-center">Cancella</th>
              </tr>
            </thead>
                
            @foreach ($products as $product)
              <tbody data-product="{{ $product->id }}" class="text-start background_color_y">
                <tr>
                  <th scope="row">{{ $product->id }}</th>
                  <td>{{ Str::limit($product->name, 15) }}</td>
                  <td>{{ Str::limit($product->description, 25) }}</td>
                  <td>
                    <div>
                      <img src="{{ $product->img_path }}" alt="{{ $product->name }}"width="30px" class="container_img">
                    </div>
                  </td>
                  <th scope="row">{{ number_format($product->price, 2) }} &euro;</th>
                  <th scope="row">
                    <label class="switch">
                      <input data-product="{{ $product->id }}" type="checkbox" {{ $product->visibility ? 'checked' : '' }}>
                      <span class="slider round"></span>
                    </label>
                  </th>
                  
                  {{-- Show --}}
                  <td class="text-center">
                    <a href="{{ route('products.show', ['product'=>$product->slug]) }}" class="text-muted">
                      <div class="btn bottone border-0">
                        <i class="fas fa-glasses"></i>
                      </div>
                    </a>
                  </td>

                  {{-- Edit --}}
                  <td class="text-center">
                    <a href="{{ route('products.edit', ['product'=>$product->id]) }}" class="text-muted">
                      <div class="btn bottone border-0">
                        <i class="fas fa-pen"></i>
                      </div>
                    </a>
                  </td>

                  {{-- Destroy --}}
                  <td class="text-center">
                    <button data-product-delete="{{ $product->id }}" data-delete="" class="btn bottone border-0">
                      <i class="fas fa-trash"></i>
                    </button> 
                  </td>
                </tr>
              </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script-footer')
@parent
<script>
  let btnDelete = document.querySelectorAll('button[data-delete]');
  btnDelete.forEach(ele => {
    ele.addEventListener('click', function(event){
      event.preventDefault();
      let element = event.target;
      if(event.target.tagName === 'I') element = event.target.parentNode;
      const productId = element.dataset.productDelete;
      // confirm delete product
      const accept = confirm('Sicuro di voler eliminare definitivamente questo prodotto dal tuo catalogo?');

      if(accept){
        axios.delete('products/' + productId)
        .then(response => {
          if(response.data.status){
            const tr = document.querySelector(`tbody[data-product="${productId}"]`);
            tr.remove();
            //alert(response.data.message);
          }
        })
        .catch(err => console.log(err));
      }
    });
  });


  (function activeVisibility(){
    const checkbox = document.querySelectorAll('.switch input[type="checkbox"]');
    checkbox.forEach(ele => {
      ele.addEventListener('change', function(event){
        let idProduct = event.target.dataset.product;
        let check = event.target.checked;
        (async function api(){
          try {
            let response = await axios.patch('/restaurant/products/visibility/' + idProduct, { status: check });
          } catch(err){
            console.log(err);
          }
        }());
      });
    });
  }());
</script>
@endsection
