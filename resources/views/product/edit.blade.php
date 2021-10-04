@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
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

          <div class="mb-3">
            <label for="visibility" class="form-label">Disponibilità del prodotto</label>
            <select id="visibility" name="visibility" class="form-select">
              <option {{ $product->visibility || (int) old('visibility') ? 'selected' : ''}} value="1">Disponibile</option>
              <option {{ $product->visibility || (int) old('visibility') ? '' : 'selected' }} value="0">Non disponibile</option>
            </select>
          </div>

          <button type="submit" class="btn btn-success">Salva modiche</button>
        </form>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-12">
        <div class="text-center mt-5">
          <a href="{{ route('products.index') }}">
            <button type="button" class="btn btn-outline-danger">Annulla</button>
          </a>
          {{-- Il bottone Annulla rimane in secondo piano, rispetto all'operazione "Salva modifiche" suggerita e in evidenza --}}
        </div>
      </div>
    </div>
  </div>
@endsection