<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ config('app.name', 'Deliveboo') }}</title>

  <!-- favicon -->
  <link rel="icon" href="{{ asset('images/logo_icon.png') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Braintree -->
  <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <script>
    window.addEventListener('load', function(){
      const buffer = document.querySelector('#buffer');
      buffer.classList.remove('d-none');
    });
  </script>

</head>
<body>
  <div id="app"></div>
</body>
</html>