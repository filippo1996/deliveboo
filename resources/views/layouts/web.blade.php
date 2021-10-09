<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ config('app.name', 'Deliveboo') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- google maps -->
  <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvVNeZeFGMSHvpISRfYdY68X5EMs2V7Yg&libraries=places&callback=initMap">
  </script>

</head>
<body>
  <div id="app"></div>
</body>
</html>