@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-header"><h1 class="text-center">Registrazione</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nome ristorante -->
                        <div class="form-group row mb-3"> 

                            <label for="name" class="col-md-4 col-form-label text-md-right ms-1">{{ __('Nome Ristorante') }}</label>

                            <input id="name" type="text" class="ms-3 w-75 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <!-- Tag ristorante -->
                        <div class="form-group row"> 

                            <label for="tag_id" class="col-md-4 col-form-label text-md-right ms-1">{{ __('Categoria Ristorante') }}</label>

                            <select name="tag_id" id="tag_id" class="w-25 @error('tag_id') is-invalid @enderror" required>
                                <option value="">-- Seleziona una Categoria --</option>
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
                        <div class="form-group row mb-3">

                            <label for="email" class="col-md-4 col-form-label text-md-right ms-1">{{ __('Indirizzo E-Mail') }}</label>

                            <input id="email" type="email" class="ms-3 w-75 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <h3 class="text-center">Informazioni di fatturazione</h3>

                        <!-- Paese, Città e Codice Postale -->
                        <div class="form-group row">

                            <!-- Paese -->
                            <div class="col-md-4"> 

                                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Paese') }}</label>

                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required>
                                
                            </div>

                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <!-- Città -->
                            <div class="col-md-4">

                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Città') }}</label>

                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <!-- Codice Postale -->
                            <div class="col-md-4">

                                <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Codice Postale') }}</label>

                                <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" required>
                                
                                @error('postal_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>

                        <!-- Indirizzo e Numero Civico -->
                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>

                                <div class="col-md-6">
                                    <label for="house_number" class="col-md-4 col-form-label text-md-right">{{ __('Numero Civico') }}</label>

                                    <input id="house_number" type="text" class="form-control @error('house_number') is-invalid @enderror" name="house_number" value="{{ old('house_number') }}" required>

                                    @error('house_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <!-- Telefono e Partita IVA -->
                        <div class="form-group row mb-4 ms-1">

                            <div class="col-md-6">

                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Numero di Telefono') }}</label>

                                <input id="phone_number" maxlength="10" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-md-6">

                                <label for="vat_number" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>

                                <input id="vat_number" maxlength="10" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" required>

                                @error('vat_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <h3 class="ms-3 text-center">Password</h3>

                        <!-- Password -->
                        <div class="form-group row mb-2">

                            <label for="password" class="ms-3 col-md-4 col-form-label text-md-right">{{ __('Inserisci Password') }}</label>

                            <div class="col-md-6">

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div> 

                        </div>

                        <!-- Conferma Password -->
                        <div class="form-group row mb-5">

                            <label for="password-confirm" class="ms-3 col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                            <div class="col-md-6">

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            </div>

                        </div>
                        
                        <!-- Bottone -->
                        <div class="form-group row mb-2 ms-5 justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info ms-3">
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
