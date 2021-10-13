@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-5">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            {{ __('Login effetuato con successo!') }}
          </div>

        </div>
      </div> 
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-5">
          <div class="card-header">{{ __('Elenco prodotti') }}</div>
          <div class="card-body"><a href="{{ route('products.index') }}">{{ __('Visualizza qui i tuoi prodotti') }}</a></div>
        </div>

        <div class="card mb-5">
          <div class="card-header">{{ __('Riepilogo ordini') }}</div>
          <div class="card-body"><a href="{{ route('orders.index') }}">{{ __('Visualizza qui il riepilogo degli ordini ricevuti') }}</a></div>
        </div>
      </div>
    </div>
  </div>
@endsection
