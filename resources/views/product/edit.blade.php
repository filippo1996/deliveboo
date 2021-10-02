@extends('layouts.app')

@section('content')
  <div class="container">
    @if ($errors->any())
      <div class="aler alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> 
          @endforeach
        </ul>
      </div>  
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="post">
      @csrf
      @method('PATCH')
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input 
          name="name" 
          type="text" 
          class="form-control"
          id="nome" 
          value="{{ old('name', $product->name) }}">
      </div>

      <div class="mb-3">
        <label for="descrizione" class="form-label">Descrizione</label>
        <textarea 
          name="description" 
          class="form-control" 
          id="descrizione" 
          cols="30" 
          rows="10">{{ old('description', $product->description) }}</textarea>
      </div>

      <button type="submit" class="btn btn-outline-success">Salva modiche</button>
    </form>

    <div class="text-center mt-5">
      <a 
        href="{{ route('products.index') }}" 
        class="btn btn-outline-secondary">
          <svg 
            xmlns="http://www.w3.org/2000/svg" 
            width="16" 
            height="16" 
            fill="currentColor" 
            class="bi bi-arrow-left" 
            viewBox="0 0 16 16">
              <path 
                fill-rule="evenodd" 
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
          </svg>
      </a>
    </div>
  </div>
@endsection