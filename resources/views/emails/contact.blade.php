<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Messaggio</title>
</head>
<body>
  <h1>Nuovo messaggio ricevuto da {{ $data['name'] }}</h1>
  <h2>La sua email {{ $data['email'] }}</h2>
  <h3>Corpo del messaggio</h3>
  <p>{{ $data['message'] }}</p>
</body>
</html>