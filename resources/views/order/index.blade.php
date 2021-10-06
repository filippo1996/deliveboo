@extends('layouts.app')
@section('title', 'Ordini')


@section('content')
  <div class="container">
    <div class="row overflow-hidden vh-100">
      <div class="col-12">
        <div class="table-responsive mt-3 h-50">
          <table class="table table-sm table-hover">
            <thead class="table-dark">
              <tr class="text-start">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Prezzo</th>
                <th scope="col">N. Telefono</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">N. Civico</th>
                <th scope="col">CAP</th>
                <th scope="col">Città</th>
                <th scope="col">Visualizza</th>
              </tr>
            </thead>
                
            @foreach ($orders as $order)
              <tbody data-product="{{ $order->id }}" class="text-start">
                <tr>
                  <th scope="row">{{ $order->id }}</th>
                  <td>{{ $order->name }}</td>
                  <td>{{ $order->lastname }}</td>
                  <td>{{ $order->email }}</td>
                  <td>{{ $order->price }}</td>
                  <td>{{ $order->phone_number }}</td>
                  <td>{{ $order->address }}</td>
                  <td>{{ $order->house_number }}</td>
                  <td>{{ $order->postal_code }}</td>
                  <td>{{ $order->city  }}</td>
                
                  
                  {{-- Show --}}
                  <td class="text-center">
                    <a href="{{ route('orders.show', ['order'=>$order->id]) }}"class="text-muted">
                      <div class="btn btn-outline-success">
                        <i class="fas fa-glasses"></i>
                      </div>
                    </a>
                  </td>
                </tr>
              </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script-footer')
  @show