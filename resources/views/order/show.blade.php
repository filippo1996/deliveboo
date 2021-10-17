@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <div class="card text-center w-50 mt-5 m-auto">

          <h1 class="card-header">Ordine N.{{ $order->id }}</h1>
          <h3 class="card-header">Data ordine: {{ $order->created_at }}</h3>
          <div class="card-body p-3">
            <div class="text-start p-2">
            <p class="card-text">Nome: {{ $order->lastname }} {{ $order->name }}</p>
              <p class="card-text">Telefono: {{ $order->phone_number }}</p>
              <p class="card-text">Email: {{ $order->email }}</p>
              <p class="card-text">
                <span>Indirizzo: </span>
                <span>{{ $order->address }},</span>
                <span>{{ $order->house_number }},</span>
                <span>{{ $order->city }},</span>
                <span>{{ $order->postal_code }}</span>
              </p>
              <p class="card-text">Prezzo ordine: {{ $order->price }} &euro;</p>

            </div>
          </div>

          <h3 class="card-header">Elenco prodotti ordinati</h3>
          <div class="card-body p-3">
            <div class="text-start p-2">
              <ol>
                @foreach ($order->products as $item)
                    <li>
                      <img src="{{ $item->img_path }}" alt="{{ $item->name }}" width="60px">
                      {{ $item->name }} |
                      <span><strong>Quantità: {{ $item->pivot->qty }}</strong></span>
                    </li>
                @endforeach
              </ol>
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