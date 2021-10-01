@extends('layouts.app')

@section('content')
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Desrizione</th>
        <th scope="col">Ingredienti</th>
      </tr>
    </thead>
        
    @foreach ($products as $product)
      <tbody>
        <tr>
          <th scope="row">{{ $product->id }}</th>
          <td>{{ $product->name }}</td>
          <td>{{ $product->description }}</td>
          <td>{{ $product->ingredient }}</td>
        </tr>
      </tbody>
    @endforeach
  </table>
</div>
@endsection
