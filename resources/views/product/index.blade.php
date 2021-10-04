@extends('layouts.app')

@section('content')
  <div class="container">
    @if (session('updated'))
      <div class="alert alert-success">{{ session('updated') }}</div>        
    @endif
    
    <div class="row">
      <div class="col-12">
        <div class="table-responsive mt-3">
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
              <tbody data-product="{{ $product->id }}" class="text-start">
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
                        <svg 
                          xmlns="http://www.w3.org/2000/svg" 
                          width="16" 
                          height="16" 
                          fill="currentColor" 
                          class="bi bi-pen" 
                          viewBox="0 0 16 16">
                            <path 
                              d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                          </svg>
                      </div>
                    </a>
                  </td>

                  {{-- Destroy --}}
                  <td class="text-center">
                    <button data-product-delete="{{ $product->id }}" class="btn btn-outline-danger">
                      <i class="far fa-trash-alt"></i>
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
