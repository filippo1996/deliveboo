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
      
      <button type="submit" class="btn btn-outline-success">Crea Prodotto</button>
    </form>
  </div>
@endsection