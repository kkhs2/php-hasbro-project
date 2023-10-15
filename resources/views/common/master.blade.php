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
      <!--<div class="container">
        <a href="{{ url('/') }}"><img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F771c2471-c25c-48b5-980b-7a38ff15c18b%2FFooterLogo.png&w=384&q=75" class="header-logo" alt="Hasbro Shop Logo"></a>-->
        <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F81cc1a0d-a84e-4d33-9f69-4107128b7570%2FPGP%2520Default%2520Banner.png&w=3840&q=75" class="img-fluid">
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
      <div class="container py-4">
        <ul class="brands-nav">
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F81c3f0cc-ab51-43ed-baca-a83368c30de8%2Fhasbrogaming-logo.png&w=384&q=75" alt="Hasbro Gaming Logo" class="footer-logo">
          </li>
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F236a1e38-2210-4ba9-9b2e-4a8e545f5ae6%2FFURBY_LOGO.png&w=828&q=75" class="footer-logo" alt="Furby">
          </li>
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2Fd1c2fb19-74be-4d70-a066-4cded385e9ae%2Fmonopoly-logo.png&w=750&q=75" class="footer-logo" alt="Monopoly">
          </li>
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F82da37ec-7c95-47cb-9a09-2656886aa9f8%2Fpjmasks-logo.png&w=640&q=75" class="footer-logo" alt="PJMasks">
          </li>
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F8470606e-9983-48ed-a83e-caf38ce929d9%2FNERF-logo.png&w=640&q=100" class="footer-logo" alt="Nerf">
          </li>
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2Fdcc9b5a6-ebd2-4cec-a84f-1a3c9b426357%2Fpeppapig-logo.png&w=750&q=75" class="footer-logo" alt="Peppa Pig">
          </li>
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F2626dd1d-9068-4a28-923b-68028a4f26cd%2FMLP-Logo.png&w=640&q=100" class="footer-logo" alt="My Little Pony">
          </li>
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2Fed377c9b-abfd-4afe-af53-dbf454af07e3%2Fplaydoh-logo.png&w=640&q=100" class="footer-logo" alt="Play-Doh">
          </li>
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F346d299c-61fa-432b-aab3-43d7f2139b89%2Fstarwars-logo.png&w=384&q=75" class="footer-logo" alt="Star Wars">
          </li>
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F2e7a4ce5-33cf-4de0-99b8-16e97a440122%2Fpowerrangers-logo.png&w=750&q=75" class="footer-logo" alt="Power Rangers">
          </li>
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2Fdadb32d5-1ead-4f95-a356-4fc424a27a0f%2Ftransformers-logo.png&w=640&q=100" class="footer-logo" alt="Transformers">
          </li>
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F9b28b18b-73f3-4c03-8e6c-a5fab8b18968%2Fmarvel-logo.png&w=384&q=75" class="footer-logo" alt="Marvel">
          </li>
          <li class="brands-nav-item">
            <img src="https://products.hasbro.com/_next/image?url=https%3A%2F%2Fassets-us-01.kc-usercontent.com%3A443%2F1edcf8ca-f650-0075-67cf-7b089bed18e8%2F468cf78b-e383-4362-b7e0-81684bfe3f09%2Fmph_logo_new.png&w=640&q=75" class="footer-logo" alt="Potato Head">
          </li>
        </ul>
        <hr />
        <div class="row mt-4">
          <p><i><strong>&copy; {{ date('Y') }} Created by GitHub user kkhs2.</strong></i></p>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>