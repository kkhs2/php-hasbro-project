<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasbro Importer/Exporter</title>
    <link rel="icon" type="image/x-icon" href="https://products.hasbro.com/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  </head>
  <body>
    <header>
      <div class="container p-5 py-4">
        <a href="{{ url('/') }}"><img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F73eb2c31-b84f-4e3e-808b-25de93aca9ac%2Fhasbro-shop-logo%2520copy.png&w=3840&q=75" class="logo" alt="Hasbro Shop Logo"></a>
    </header>
    <main>
      <div class="container p-5 py-4">
        @include('common.flashmessage')
      </div>
      <div class="container p-5 py-4">
        @yield('content')
      </div>
    </main>
    <footer>
      <div class="container p-5 mb-4 py-4">
        <div class="row">
          <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F771c2471-c25c-48b5-980b-7a38ff15c18b%2FFooterLogo.png&w=384&q=75" alt="Hasbro Footer" class="footer-logo">
          <img src="https://static-asset-delivery.hasbroapps.com/5e4d5d7c4a166d887925dc9e9212a3c2588a6c5d/ba5b18e8d5dc3677914ccc002940330b.png" class="footer-logo" alt="Monopoly">
          <img src="https://static-asset-delivery.hasbroapps.com/5e4d5d7c4a166d887925dc9e9212a3c2588a6c5d/8c26db65fb504f33ba92f36af15b5df4.png" class="footer-logo" alt="Nerf">
          <img src="https://static-asset-delivery.hasbroapps.com/5e4d5d7c4a166d887925dc9e9212a3c2588a6c5d/f9105edf014a1f347114c6ec53f0e827.png" class="footer-logo" alt="My Little Pony">
          <img src="https://static-asset-delivery.hasbroapps.com/5e4d5d7c4a166d887925dc9e9212a3c2588a6c5d/b945728b5225af974f8aa9b936b45b66.png" class="footer-logo" alt="Play-Doh">
          <img src="https://static-asset-delivery.hasbroapps.com/5e4d5d7c4a166d887925dc9e9212a3c2588a6c5d/ecf0fede53b473cd00865baf3493ff90.png" class="footer-logo" alt="Star Wars">
          <img src="https://static-asset-delivery.hasbroapps.com/5e4d5d7c4a166d887925dc9e9212a3c2588a6c5d/081413af0b83c7ae8fe9740350425853.png" class="footer-logo" alt="Power Rangers">
          <img src="https://static-asset-delivery.hasbroapps.com/5e4d5d7c4a166d887925dc9e9212a3c2588a6c5d/2f86f3b42b75448eb7f31e3a2cc0eba7.png" class="footer-logo" alt="Transformers">
          <img src="https://static-asset-delivery.hasbroapps.com/5e4d5d7c4a166d887925dc9e9212a3c2588a6c5d/c9dc64bd43f9e3fa5e29a0f7f3e9b957.png" class="footer-logo" alt="Marvel">
          <img src="https://static-asset-delivery.hasbroapps.com/5e4d5d7c4a166d887925dc9e9212a3c2588a6c5d/ef648898db6fb196c67cab0fca02b528.png" class="footer-logo" alt="Disney Princess">
        </div>
        <hr />
        <div class="row mt-4">
        <p><i><strong>&copy; {{ date('Y') }} Created by a hopeful candidate.</strong></i></p>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>