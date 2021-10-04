@extends('layouts.app')

@section('content')
  <div class="container">

    {{-- Carico immagine --}}
    <div class="mt-2">
      <form action="upload" method="post" enctype="multipart/form-data" name="upload_img"> 
        Scegli immagine 
        <input name="img" type="file"/>
        <input type="submit" name="carica" value="carica"/>
      </form>
 
    <form action="{{ route('products.store') }}" method="post">
      @csrf
      <div class="mt-5 mb-5">
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
          rows="1">{{ old('ingredient') }}</textarea>

        @error('ingredient')
          <div class="alert alert-danger">{{ $message }}</div> 
        @enderror 
      </div>


      <div class="mb-5 w-50">
        <label for="visibility" class="form-label">Disponibilità del prodotto</label>
        <select id="visibility" name="visibility" class="form-select">
          <option {{ $product->visibility || (int) old('visibility') ? 'selected' : ''}} value="1">Disponibile</option>
          <option {{ $product->visibility || (int) old('visibility') ? '' : 'selected' }} value="0">Non disponibile</option>
        </select>
      </div>


      <div class="mb-5 w-25">
        <label for="prezzo" class="form-label">Prezzo</label>
        <textarea 
          name="price" 
          class="form-control @error('price') is-invalid @enderror" 
          id="prezzo" 
          cols="25" 
          rows="1">{{ old('price') }}</textarea>

        @error('price')
          <div class="alert alert-danger">{{ $message }}</div> 
        @enderror 
      </div>


      <button type="submit" class="btn btn-outline-success">Crea Prodotto</button>
    </form>
  </div>
@endsection