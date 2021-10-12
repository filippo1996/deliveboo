@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12 col">  
      
      <div class="card">
        {{-- Card Header --}}
        <div class="card-header">
          <h1 class="text-center fs-4">Registra il tuo Risotrante</h1>
        </div>

        {{-- Card Body --}}
        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf
              <!-- Nome ristorante -->
                <div class="form-group row m-auto mt-3">   
                  <input 
                    id="name" 
                    type="text" 
                    class="w-100 form-control @error('name') is-invalid @enderror"
                    name="name" 
                    value="{{ old('name') }}" 
                    required autocomplete="name" autofocus
                    placeholder="Nome Ristorante">
                    
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>


              <!-- Tag ristorante -->
                <div class="form-group row my-4">
                  <select 
                    name="tag_id" 
                    id="tag_id" 
                    class="w-50 ms-3 @error('tag_id') is-invalid @enderror" required>
                      <option value="">-- Categoria --</option>
                        @foreach ($tags as $tag)
                          <option @if(old('tag_id') == $tag->id) selected @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>

                    @error('tag_id')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>


              <!-- Email -->
                <div class="form-group row">
                  <div class="col-12">
                    <input 
                    id="email" 
                    type="email" 
                    class="w-100 form-control @error('email') is-invalid @enderror" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="email"
                    placeholder="E-mail">

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>


              <!-- Paese, Città e Codice Postale -->
                <div class="form-group row mt-5 mb-2">

                  <!-- Paese -->
                    <div class="col-md-4 mb-3"> 
                      <input 
                        id="country" 
                        type="text" 
                        class="form-control @error('country') is-invalid @enderror" 
                        name="country" 
                        value="{{ old('country') }}" required
                        placeholder="Nazione">
                                
                        @error('country')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                            
                  <!-- Città -->
                    <div class="col-md-4 mb-3">
                      <input 
                        id="city" 
                        type="text" 
                        class="form-control @error('city') is-invalid @enderror" 
                        name="city" 
                        value="{{ old('city') }}" required
                        placeholder="Città">
                                
                        @error('city')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                  <!-- Codice Postale -->
                    <div class="col-md-4 mb-3">
                      <input 
                        id="postal_code" 
                        type="text" 
                        minlength="5" 
                        maxlength="5" 
                        class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" 
                        value="{{ old('postal_code') }}" 
                        required
                        placeholder="CAP">
        
                        @error('postal_code')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                </div>


              <!-- Indirizzo e Numero Civico -->
                <div class="form-group row mb-2">

                  {{-- Indirizzo --}}
                    <div class="col-md-6 mb-3">
                      <input 
                        id="address" 
                        type="text" 
                        class="form-control @error('address') is-invalid @enderror" 
                        name="address" 
                        value="{{ old('address') }}" 
                        required
                        placeholder="Indirizzo">

                        @error('address')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    
                  {{-- N. Civico --}}
                    <div class="col-md-6 mb-3">
                      <input 
                        id="house_number" 
                        type="text" 
                        class="form-control 
                        @error('house_number') is-invalid @enderror" 
                        name="house_number" 
                        value="{{ old('house_number') }}" 
                        required
                        placeholder="Civico">

                        @error('house_number')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                </div>
                    

              <!-- Telefono e Partita IVA -->
                <div class="form-group row my-5">

                  {{-- Telefono --}}
                    <div class="col-md-6 mb-3">
                      <input 
                        id="phone_number" 
                        maxlength="10" 
                        type="text" 
                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" 
                        value="{{ old('phone_number') }}" required
                        placeholder="Telefono">

                        @error('phone_number')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    
                  {{-- P.IVA --}}
                    <div class="col-md-6 mb-3">
                      <input 
                        id="vat_number" 
                        maxlength="10" 
                        type="text" 
                        class="form-control 
                        @error('vat_number') is-invalid @enderror" 
                        name="vat_number" 
                        value="{{ old('vat_number') }}" required
                        placeholder="P.IVA">

                        @error('vat_number')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                </div>

        
                <!-- Password -->
                  <div class="form-group row mb-5">
                    <div class="col-md-6 mb-3">
                      <input 
                        id="password" 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" name="password" 
                        required autocomplete="new-password"
                        placeholder="Password">

                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div> 

                    <div class="col-md-6 mb-3">
                      <input 
                        id="password-confirm" ù
                        type="password" 
                        class="form-control" 
                        name="password_confirmation" 
                        required autocomplete="new-password"
                        placeholder="Conferma Password">
                    </div>
                  </div>

   
                  <!-- Bottone -->
                    <div class="form-group row text-center mt-5 mb-3">
                      <div class="col-12">
                        <button 
                          type="submit" 
                          class="btn btn-outline-success">
                            {{ __('Registrati') }}
                        </button>
                      </div>
                    </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
