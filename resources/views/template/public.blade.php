<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name', 'Document') }}</title>

    @stack('metas')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href={{asset('css/pizza.css') }} rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
   
    @stack('styles')

    <style>
      .bg-pizza {
        background-color: #ee3b3b !important;
      }

      .form-group {
        margin-top: .5rem; 
      }
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow" id="nav">
      <div class="container">
        <a class="navbar-brand" href="/">Shale Pizza</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::is('gallery') ? 'active' : '' }}"" href="{{ route('gallery') }}">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::is('download') ? 'active' : '' }}"" href="{{ route('download') }}">Download menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::is('contact') ? 'active' : '' }}"" href="{{ route('contact') }}">Contact us</a>
            </li>
          </ul>
          
          <form class="d-flex"></form>
            <a class="btn btn-danger" href="{{ route('register') }}" role="button">Register</a>
          </form>
        </div>
      </div>
  </nav>

  @yield('content')

<footer class="bg-dark text-center text-white">

  <div class="container p-4">

    <section class="mb-4">
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>

    <section class="mb-4">
      <p>
        Compatible with Internet Explorer 10.0 above, Google Chrome Version 24.0 and above Prices shown are inclusive of 0% GST. Servings featured are for illustration purposes only. Combo and price may vary according to location. Shoule any discrepancy occur in published price, the pricing at the store point of purchase is deemed final. Promotion is valid while stocks last. Shale Pizza reserves the right to change and / or remove items from menu without prior notice. Delivery operating hours vary depending on store location. Savings are calculated based ala-carte price. Minimum order of RM20 applies for delivery. Limited delivery areas apply.
      </p>
    </section>
    
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    
    <a class="text-white" href="#">© 2022 Copyright: Shale Pizza</a>
  </div>

</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  @stack('scripts')
</body>
</html>
