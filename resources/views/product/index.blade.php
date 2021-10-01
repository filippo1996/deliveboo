@extends('layouts.app')

@section('content')
<div class="container">
  <table class="table">
    <thead>
      <tr class="text-left">
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Desrizione</th>
        <th scope="col">Ingredienti</th>
        <th scope="col" class="text-center">Visualizza</th>
        <th scope="col" class="text-center">Modifica</th>
        <th scope="col" class="text-center">Cancella</th>
      </tr>
    </thead>
        
    @foreach ($products as $product)
      <tbody class="text-left">
        <tr>
          <th scope="row">{{ $product->id }}</th>
          <td>{{ $product->name }}</td>
          <td>{{ $product->description }}</td>
          <td>{{ $product->ingredient }}</td>
          <td class="text-center"><div class="btn btn-outline-success">Visualizza</div></td>
          <td class="text-center"><div class="btn btn-outline-info">Modifica</div></td>
          <td class="text-center"><div class="btn btn-outline-danger">Cancella</div></td>
        </tr>
      </tbody>
    @endforeach
  </table>
</div>
@endsection
