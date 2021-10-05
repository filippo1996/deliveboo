@extends('layouts.app')
@section('title', 'Prodotti')

@section('content')
  <div class="container">
    @if (session('updated'))
      <div class="alert alert-success">{{ session('updated') }}</div>        
    @endif
    
    <div class="row overflow-hidden vh-100">
      <div class="col-12">
        <div class="table-responsive mt-3 h-50">
          <table class="table table-sm table-hover">
            <thead class="table-dark">
              <tr class="text-start">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Desrizione</th>
                <th scope="col">Foto</th>
                <th scope="col" class="text-center">Visualizza</th>
                <th scope="col" class="text-center">Modifica</th>
                <th scope="col" class="text-center">Cancella</th>
              </tr>
            </thead>
                
            @foreach ($products as $product)
              @if($product->visibility == 'Non disponibile')
              <tbody style="opacity: 0.3" data-product="{{ $product->id }}" class="text-start">
              @else
              <tbody data-product="{{ $product->id }}" class="text-start">
              @endif
                <tr>
                  <th scope="row">{{ $product->id }}</th>
                  
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->description }}</td>
                  <td><img src="{{ $product->img_path }}" alt="{{ $product->name }}" width="60px"></td>
                  
                  {{-- Show --}}
                  <td class="text-center">
                    <a href="{{ route('products.show', ['product'=>$product->slug]) }}" class="text-muted">
                      <div class="btn btn-outline-success">
                        <i class="fas fa-glasses"></i>
                      </div>
                    </a>
                  </td>

                  {{-- Edit --}}
                  <td class="text-center">
                    <a href="{{ route('products.edit', ['product'=>$product->id]) }}" class="text-muted">
                      <div class="btn btn-outline-info">
                        <i class="fas fa-pen"></i>
                      </div>
                    </a>
                  </td>

                  {{-- Destroy --}}
                  <td class="text-center">
                    <button data-product-delete="{{ $product->id }}" class="btn btn-outline-danger">
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
  let btnDelete = document.querySelectorAll('.btn-outline-danger');
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
              alert(response.data.message);
            }
          })
          .catch(err => console.log(err));
      }
    });
  });
</script>
@endsection
