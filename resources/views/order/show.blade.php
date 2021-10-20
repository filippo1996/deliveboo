@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-12 col-lg-8 m-auto">
        <div class="card card_width text-center m-auto background_color_y text_color box_shadows">
          <h1 class="card-header fs-4 fw-bold background_color_y">Ordine N.{{ $order->id }}</h1>
          <h3 class="card-header fs-6 fw-bold background_color_y">Data ordine: {{ $order->created_at }}</h3>
          <div class="card-body p-3 background_color_y">
            <div class="text-start p-2">
            <p class="card-text m-0">Nome: {{ $order->lastname }} {{ $order->name }}</p>
              <p class="card-text m-0">Telefono: {{ $order->phone_number }}</p>
              <p class="card-text m-0">Email: {{ $order->email }}</p>
              <p class="card-text m-0">
                <span>Indirizzo: </span>
                <span>{{ $order->address }},</span>
                <span>{{ $order->house_number }},</span>
                <span>{{ $order->city }},</span>
                <span>{{ $order->postal_code }}</span>
              </p>
              <p class="card-text">Prezzo ordine: {{ $order->price }} &euro;</p>
            </div>
          </div>

          <h3 class="card-footer fs-5 fw-bold background_color_y mb-0 pb-0">Elenco prodotti ordinati</h3>
          <div class="card-body pt-0 background_color_y">
            <div class="text-start mt-3">
              <ol>
                @foreach ($order->products as $item)
                    <li>
                      <img src="{{ $item->img_path }}" alt="{{ $item->name }}" width="30px">
                      {{ $item->name }} |
                      <span><strong>Quantità: {{ $item->pivot->qty }}</strong></span>
                    </li>
                @endforeach
              </ol>
            </div>
          </div>

          <a href="{{ route('orders.index') }}" class="m-1 mt-0">
            <div  class="btn bottone text_color">
              <i class="fas fa-undo-alt"></i>
            </div>

          </a>
        </div>
      </div>
    </div> 
  </div>    
@endsection