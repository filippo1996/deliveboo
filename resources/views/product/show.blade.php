@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row ">
      <div class="col-12 col-md-6">
        <div class="card text-center mt-5">
          <h1 class="card-header">{{ $product->name }}</h1>
          <div class="card-body">
            <h2 class="card-title">{{ $product->slug }}</h2>
            <p class="card-text">{{ $product->description }}</p>
          </div>
        </div>
      </div>
    
      <div class="col-12 col-md-6">
        <div class="text-center mt-5">
          <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
            Torna ai prodotti
          </a>
        </div>
      </div>
    </div>  
  </div>    
@endsection