@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
      @csrf

      {{-- Carico immagine --}}
      <div>
        <label for="img" class="form-label"></label>
        <input type="file" name='image' class="form-control @error('image') is-invalid @enderror">
          @error('image')
          <div class="alert alert-danger">{{ $message }}</div> 
          @enderror
      </div>

      <div class="mt-5 mb-5">
        <label for="nome" class="form-label">Nome Prodotto</label>
        <input 
          type="text" 
          class="form-control @error('name') is-invalid @enderror" 
          id="nome" 
          name="name" 
          value="{{ old('name') }}"
          required>

          @error('name')
            <div class="alert alert-danger">{{ $message }}</div> 
          @enderror
      </div>

      <div class="mb-5">
        <label for="descrizione" class="form-label">Descrizione</label>
        <textarea 
          name="description" 
          class="form-control @error('description') is-invalid @enderror" 
          id="descrizione" 
          cols="25" 
          rows="5">{{ old('description') }}</textarea>

        @error('description')
          <div class="alert alert-danger">{{ $message }}</div> 
        @enderror 
      </div>


      <div class="mb-5 w-75">
        <label for="ingredienti" class="form-label">Ingredienti</label>
        <textarea 
          name="ingredient" 
          class="form-control @error('ingredient') is-invalid @enderror" 
          id="ingredienti" 
          cols="25" 
          rows="1"
          required>{{ old('ingredient') }}</textarea>

        @error('ingredient')
          <div class="alert alert-danger">{{ $message }}</div> 
        @enderror 
      </div>


      <div class="mb-5 w-50">
        <label for="visibility" class="form-label">Disponibilità del prodotto</label>
        <select id="visibility" name="visibility" class="form-select" required>
          <option selected value="1">Disponibile</option>
          <option value="0">Non disponibile</option>
        </select>
      </div>

      <div class="mb-5 w-25">
        <label for="price" class="form-label">Prezzo</label>
        <input class="form-control @error('price') is-invalid @enderror" type="number" step="0.01" min="0" id="price" name="price" value="{{ old('price') }}" required>

        @error('price')
          <div class="alert alert-danger">{{ $message }}</div> 
        @enderror 
      </div>


      <button type="submit" class="btn btn-outline-success">Crea Prodotto</button>
    </form>
  </div>
@endsection