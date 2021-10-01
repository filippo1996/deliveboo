@extends('layouts.app')

@section('content')
<div class="container">
  @foreach ($products as $product)
    {{ $product->name }}
  @endforeach
</div>
@endsection
