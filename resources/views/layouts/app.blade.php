<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body>
    <div id="app">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container m-1 p-1">

          {{-- Logo ristorante --}}
          <div class="m-2">
            <img 
              src="{{ Auth::user()->cover }}" 
              alt=" {{ Auth::user()->name }}" 
              width="100px">
          </div>

          <div class="text-primary fs-4 text-center p-1">Dashboard di: 
            <span class="fs-5 fw-bold">{{ Auth::user()->name }}</span>
          </div>


          <a 
            class="navbar-brand text-primary" 
            href="{{ url('/') }}"> 
              {{-- {{ config('app.name', 'Laravel') }} --}}
          </a>
            
          <button 
            class="navbar-toggler" 
            type="button" 
            data-toggle="collapse" 
            data-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon "></span>
          </button>

          <div 
            class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto"></ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                  @if (Route::has('login'))
                    <li class="nav-item ">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                  @endif

                  @if (Route::has('register'))
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                  @endif
                  @else
                    <li class="nav-item dropdown">
                      <a 
                        {{-- classe dropdown-toggle rimossa --}}
                        id="navbarDropdown" 
                        class="nav-link text-primary" 
                        href="#" 
                        role="button" 
                        data-toggle="dropdown" 
                        aria-haspopup="true" 
                        aria-expanded="false" v-pre>
                          {{-- {{ Auth::user()->name }} --}}
                      </a>

                      <div 
                        class="dropdown-menu dropdown-menu-right" 
                        aria-labelledby="navbarDropdown">
                          <a 
                            class="dropdown-item" 
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form 
                            id="logout-form" 
                            action="{{ route('logout') }}" 
                            method="POST" 
                            class="d-none">
                              @csrf
                          </form>
                      </div>
                    </li>
                @endguest
              </ul>
            </div>
          </div>
      </nav>

      {{-- Sidebar Sx --}}
      <div class="container-fluid">
        <div class="row">
          @auth
            <nav class="col-md-2 d-none d-md-block sidebar bg-dark p-4 pt-1">  
              <div class="sidebar-sticky p-1">
                <ul class="nav flex-column mt-1">
                    <li class="nav-item mt-4 fs-5">
                      {{-- Rotta in home da verificare --}}
                      <a class="nav-link" href="{{ route('products.index') }}">
                        <i class="fas fa-home fs-4 pe-2"></i>
                        Home
                      </a>     
                    </li>
                              
                    <li class="nav-item mt-1 fs-5">
                      <a class="nav-link" href="{{ route('products.index') }}">
                        <i class="fas fa-cubes fs-4 pe-2"></i>
                        Products
                      </a>
                    </li>
                              
                    <li class="nav-item mt-4 fs-5">
                      <a class="nav-link" href="{{ route('products.create') }}">
                        <i class="fas fa-plus fs-4 pe-2"></i>
                        Create Product
                      </a>
                    </li>
                              
                    <li class="nav-item mt-4 fs-5">
                      <a class="nav-link" href="{{ route('orders.index') }}">
                        <i class="fas fa-file-alt fs-4 pe-2"></i>
                        Orders
                      </a>
                    </li>
                              
                    <li class="nav-item mt-4 fs-5">
                      <a 
                        class="nav-link danger" 
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                          <i class="fas fa-sign-out-alt fs-4 pe-2"></i>
                          {{ __('Logout') }}
                      </a>
                                  
                      <form 
                        id="logout-form" 
                        action="{{ route('logout') }}" 
                        method="POST" 
                        class="d-none mt-3 fs-5">
                          @csrf
                      </form>
                    </li>
                  </ul>
              </div>
            </nav>
          @endauth

          <main class="col-md-9 ml-sm-auto col-lg-10 px-4 py-4">
            @yield('content')
          </main>
        </div>
      </div>
    </div>

  @section('script-footer')
    @show
  </body>
</html>
