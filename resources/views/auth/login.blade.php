@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row justify-content-center p-5">
    <div class="col-md-8">
      <div class="card text_color background_color_y mb-5 box_shadows p-0">
        <div class="card-header">{{ __('Login') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <div class="form-group row my-2">
                {{-- E-mail --}}
                {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                <div class="col-12 mt-2 col-lg-6">
                  <input 
                    id="email" 
                    type="email" 
                    class="form-control 
                    @error('email') is-invalid @enderror" 
                    name="email" 
                    placeholder="E-mail" 
                    value="{{ old('email') }}" required autocomplete="email" autofocus>  
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                {{-- Password --}}
                 {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
                <div class="col-12 mt-2 col-lg-6">
                  <input 
                    id="password" 
                    type="password" 
                    class="form-control 
                    @error('password') is-invalid @enderror" 
                    name="password" 
                    placeholder="Password" 
                    required autocomplete="current-password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                {{-- End Row  --}}
              </div>

              
              {{-- Remember me --}}
              <div class="form-group row my-3">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input 
                      class="form-check-input" 
                      type="checkbox" 
                      name="remember" 
                      id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                          {{ __('Ricordami') }}
                        </label>
                  </div>
                </div>
              </div>


              {{-- Button --}}
              <div class="form-group row mb-0 text-center">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="bottone border-0">{{ __('Login') }}</button>
                    @if (Route::has('password.request'))
                      <a class="btn btn-link fs-6" href="{{ route('password.request') }}">
                        {{ __('Password dimenticata?') }}
                      </a>
                    @endif
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
