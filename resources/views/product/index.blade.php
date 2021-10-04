@extends('layouts.app')

@section('content')
  <div class="container">
    @if (session('updated'))
      <div class="alert alert-success">{{ session('updated') }}</div>        
    @endif

    <img src="{{ Auth::user()->cover }}" alt=" {{ Auth::user()->name }}" width="200px">
    
    <div class="row mt-5">
      <div class="col-12">
        <div class="table-responsive mt-5">
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
              <tbody class="text-start">
                <tr>
                  <th scope="row">{{ $product->id }}</th>
                  
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->description }}</td>
                  <td><img src="{{ $product->img_path }}" alt="{{ $product->name }}" width="60px"></td>

                  {{-- Per il momento tutte le icone dei bottoni sono inserire con svg --}}
                  
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
                    <a href="{{ route('products.destroy', ['product'=>$product->id]) }}" class="text-muted">
                      <div class="btn btn-outline-danger">
                        <svg 
                          xmlns="http://www.w3.org/2000/svg" 
                          width="16" 
                          height="16" 
                          fill="currentColor" 
                          class="bi bi-trash" 
                          viewBox="0 0 16 16">
                            <path 
                              d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path 
                              fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                      </div>
                    </a> 
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
