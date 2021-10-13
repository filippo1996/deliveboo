@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <div class="card text-center w-50 mt-5 m-auto">
          <img class="card-img-top" src="{{ $product->img_path }}" alt="{{ $product->name }}">
          <h1 class="card-header">{{ $product->name }}</h1>
          <div class="card-body p-3">
            {{-- <h2 class="card-title">{{ $product->slug }}</h2> --}}
            <div class="text-start p-2">
              
              <p class="card-text">
                Descrizione:
                <br>
                {{ $product->description }}
              </p>
              <p class="card-text">
                Ingredienti:
                <br>
                {{ $product->ingredient }}
              </p>

            </div>
          </div>
          <h1 class="card-header">{{ $product->price }}€</h1>
        </div>
      </div>
    </div> 
    
    <div class="row mt-5">
      <div class="col-12 mb-5">
        <div class="text-center mt-5">
          <a href="{{ route('products.edit', ['product'=>$product->id]) }}" class="btn btn-outline-info">
            Modifica prodotto
          </a>
          <a href="{{ route('products.index') }}" class="btn btn-outline-success">
            Torna ai prodotti
          </a>
        </div>
      </div>
      <!-- <div class="col-6">
        <div class="text-center mt-5">
          <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
            Torna ai prodotti
          </a>
        </div>
      </div> -->
    </div>
  </div>    
@endsection