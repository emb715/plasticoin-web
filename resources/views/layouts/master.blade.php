<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Plasticoin</title>
  <link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon">

  @vite('resources/css/app.css')

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-LR87D3N2FM"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-LR87D3N2FM');
    gtag('config', 'UA-161976562-1');
  </script>

</head>

<body class="text-gray-800">

  <x-layout.header />

  @yield('content')

  <x-layout.footer />

  @stack('scripts')

</body>

</html>