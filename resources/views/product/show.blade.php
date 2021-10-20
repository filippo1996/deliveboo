@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-12 col-lg-8 m-auto">
        <div class="card card_width text-center m-auto background_color_y text_color box_shadows">
          <img class="card-img-top img-fluid w-50 m-auto p-2" src="{{ $product->img_path }}" alt="{{ $product->name }}">
          <h1 class="card-header fs-5 fw-bold background_color_y">{{ $product->name }}</h1>
          <div class="card-body p-3 background_color_y">
            {{-- <h2 class="card-title">{{ $product->slug }}</h2> --}}
            <div class="text-start p-2">
              
              <p class="card-text fs-6">
                <span class="fw-bold">Descrizione:</span>  
                <br>
                {{ $product->description }}
              </p>
              <p class="card-text fs-6">
                <span class="fw-bold">Ingredienti:</span>
                <br>
                {{ $product->ingredient }}
              </p>

            </div>
          </div>
          <h2 class="card-footer fs-5 fw-bold background_color_y">{{ $product->price }}€</h2>
          <a href="{{ route('products.edit', ['product'=>$product->id]) }}" class="m-1 mt-0">
            <div class="btn bottone border-0">
              <i class="fas fa-pen text_color"></i>
            </div>
          </a>
        </div>
      </div>
    </div> 
    
    {{-- Bottone ridondante --}}
    {{-- <div class="row my-5">
      <div class="col-12">
        <div class="text-center">
          <a href="{{ route('products.index') }}" class="btn bottone">
            Torna ai prodotti
          </a>
        </div>
      </div> --}}
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