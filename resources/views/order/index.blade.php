@extends('layouts.app')
@section('title', 'Ordini')

@section('content')
  <h1>I Tuoi Ordini</h1>
  <ul class="list-group">
    @foreach ($orders as $order)
      <li class="list-group-item">{{ $order->id }} {{ $order->name }}</li>
    @endforeach
  </ul>
@endsection