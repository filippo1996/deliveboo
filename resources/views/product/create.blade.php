@extends('layouts.app')

@section('content')
  <div class="container">
 
    <form action="{{ route('products.store') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="nome" class="form-label">Nome Prodotto</label>
        <input 
          type="text" 
          class="form-control @error('name') is-invalid @enderror" 
          id="nome" 
          name="name" 
          value="{{ old('name') }}">

          @error('name')
            <div class="alert alert-danger">{{ $message }}</div> 
          @enderror
      </div>

      <div class="mb-3">
        <label for="descrizione" class="form-label">Descrizione</label>
        <textarea 
          name="description" 
          class="form-control @error('description') is-invalid @enderror" 
          id="descrizione" 
          cols="30" 
          rows="10">{{ old('description') }}</textarea>

        @error('description')
          <div class="alert alert-danger">{{ $message }}</div> 
        @enderror 
      </div>

      <div class="mb-3">
        <label for="ingredienti" class="form-label">Ingredienti</label>
        <textarea 
          name="ingredient" 
          class="form-control @error('ingredient') is-invalid @enderror" 
          id="ingredienti" 
          cols="30" 
          rows="1">{{ old('ingredient') }}</textarea>

        @error('ingredient')
          <div class="alert alert-danger">{{ $message }}</div> 
        @enderror 
      </div>

      <div class="mb-3">
        <label for="visibility" class="form-label">Disponibilità del prodotto</label>
        <select id="visibility" name="visibility" class="form-select">
          <option {{ $product->visibility || (int) old('visibility') ? 'selected' : ''}} value="1">Disponibile</option>
          <option {{ $product->visibility || (int) old('visibility') ? '' : 'selected' }} value="0">Non disponibile</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="prezzo" class="form-label">Prezzo</label>
        <textarea 
          name="price" 
          class="form-control @error('price') is-invalid @enderror" 
          id="prezzo" 
          cols="30" 
          rows="1">{{ old('price') }}</textarea>

        @error('price')
          <div class="alert alert-danger">{{ $message }}</div> 
        @enderror 
      </div>

      <button type="submit" class="btn btn-outline-success">Crea Prodotto</button>
    </form>
  </div>
@endsection