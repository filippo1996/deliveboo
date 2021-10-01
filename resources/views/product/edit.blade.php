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
  </div>
@endsection