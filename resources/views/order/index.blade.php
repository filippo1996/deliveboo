@extends('layouts.app')
@section('title', 'Ordini')

@section('content')
  <h1>I Tuoi Ordini</h1>
  <ul>
    @foreach ($orders as $order)
    <li>
      {{ $order->id }}
      {{ $order->name }}
    </li>
    @endforeach
  </ul>
@endsection