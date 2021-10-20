@extends('layouts.app')

@section('content')
  <div class="container">


    <div class="row pt-3 pt-lg-0">
      <div class="col">
        <h1 class="text-center mt-5 fs-4 fw-bold text_color">Inserisci un prodotto</h1>
      </div>
    </div>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="row mb-5 p-lg-3 background_color_y text_color box_shadows">
        {{-- SX --}}
        <div class="col-lg-6 p-lg-3 px-lg-4">

          {{-- Immagine --}}
          <div class="my-5 w-auto">
            <label for="img" class="form-label">Immagine</label>
            <input type="file" name='image' class="form-control @error('image') is-invalid @enderror">
              @error('image')
              <div class="alert alert-danger">{{ $message }}</div> 
              @enderror
          </div>

          {{-- Disponibilità --}}
          <div class="my-5 w-auto">
            <label for="visibility" class="form-label">Disponibilità</label>
            <select id="visibility" name="visibility" class="form-select" required>
              <option selected value="1">Disponibile</option>
              <option value="0">Non disponibile</option>
            </select>
          </div>

          {{-- Prezzo --}}
          <div class="my-5 w-auto">
            <label for="price" class="form-label">Prezzo</label>
            <input class="form-control @error('price') is-invalid @enderror" type="number" step="0.01" min="0" id="price" name="price" value="{{ old('price') }}" required>
    
            @error('price')
              <div class="alert alert-danger">{{ $message }}</div> 
            @enderror 
          </div>
        {{-- End SX   --}}
        </div>
  
  
  
        {{-- DX --}}
        <div class="col-lg-6 p-lg-3 px-lg-4">

          {{-- Nome --}}
          <div class="my-5">
            <label for="nome" class="form-label">Nome</label>
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

          {{-- Descrizione --}}
          <div class="my-5">
            <label for="descrizione" class="form-label">Descrizione</label>
            <textarea 
              name="description" 
              class="form-control @error('description') is-invalid @enderror" 
              id="descrizione" 
              cols="25" 
              rows="1">{{ old('description') }}</textarea>
    
            @error('description')
              <div class="alert alert-danger">{{ $message }}</div> 
            @enderror 
          </div>

          {{-- Ingredienti --}}
          <div class="mt-5 w-auto">
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
        {{-- End DX   --}}
        </div>

        <div class="row text-center">
          <div class="col">
            {{-- Crea --}}
            <button type="submit" class="text_color btn bottone">
              <i class="fas fa-check-square mt-1 fs-3"></i>
            </button>
          </div>
        </div>
      </div>
      
    </form>
  </div>
@endsection