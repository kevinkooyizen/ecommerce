<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'E-Commerce') }}</title>

  <link rel="icon" href="img/core-img/favicon.ico">

  <link rel="shortcut icon" href="img/core-img/favicon.ico">

  <!--begin::Base Styles -->
  <link rel="stylesheet" type="text/css" href="/css/core-style.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <!--end::Base Styles -->
  
  <!-- Scripts -->
  <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>

  @include('layouts.header')
  @include('layouts.body')
  @include('layouts.footer')

  <!--begin::Base Scripts -->
  <!-- jQuery (Necessary for All JavaScript Plugins) -->
  <script src="/js/jquery/jquery-2.2.4.min.js"></script>
  <!-- Popper js -->
  <script src="/js/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="/js/bootstrap.min.js"></script>
  <!-- Plugins js -->
  <script src="/js/plugins.js"></script>
  <!-- Classy Nav js -->
  <script src="/js/classy-nav.min.js"></script>
  <!-- Active js -->
  <script src="/js/active.js"></script>
  <script src="/js/number-check.js"></script>
  <!--end::Base Scripts -->
  @stack('scripts')
</body>
</html>
