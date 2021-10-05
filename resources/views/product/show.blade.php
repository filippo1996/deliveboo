@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <div class="card text-center w-50 mt-5 m-auto">
          @if ($product->img_path)
          <img class="card-img-top" src="{{ asset('storage/' . $product->image_path) }}" alt="Card image cap">  
          @endif

          <h1 class="card-header">{{ $product->name }}</h1>
          <div class="card-body p-3">
            {{-- <h2 class="card-title">{{ $product->slug }}</h2> --}}
            <div class="text-start p-2">
              <p class="card-text">{{ $product->description }}</p>
              <p class="card-text">{{ $product->ingredient }}</p>
              <p class="card-text text-center mt-2">{{ $product->price }}</p>
            </div>
           
          </div>
        </div>
      </div>
    </div> 
    
    <div class="row mt-5">
      <div class="col-12">
        <div class="text-center mt-5">
          <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
            Torna ai prodotti
          </a>
        </div>
      </div>
    </div>
  </div>    
@endsection