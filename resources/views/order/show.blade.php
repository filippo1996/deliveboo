@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <div class="card text-center w-50 mt-5 m-auto">
          <img class="card-img-top" src="..." alt="Card image cap">
          <h1 class="card-header">{{ $order->name }}</h1>
          <h2 class="card-header">{{ $order->lastname }}</h2>
          <div class="card-body p-3">
            <div class="text-start p-2">
              <p class="card-text">{{ $order->email }}</p>
              <p class="card-text">{{ $order->price }}</p>
              <p class="card-text">{{ $order->prhone_number }}</p>
              <p class="card-text">{{ $order->address }}</p>
              <p class="card-text">{{ $order->house_number }}</p>
              <p class="card-text">{{ $order->postal_code }}</p>
              <p class="card-text">{{ $order->city }}</p>
            </div>
          </div>
        </div>
      </div>
    </div> 
    
    <div class="row mt-5">
      <div class="col-12">
        <div class="text-center mt-5">
          <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
            Torna agli Ordini 
          </a>
        </div>
      </div>
    </div>
  </div>    
@endsection