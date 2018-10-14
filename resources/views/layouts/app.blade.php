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

  <link rel="icon" href="/favicon.ico">

  <link rel="shortcut icon" href="/favicon.ico">

  <!--begin::Base Styles -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Ubuntu:300,400,500,700">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/classy-nav.min.css">
  <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="/css/animate.css">
  <link rel="stylesheet" type="text/css" href="/css/magnific-popup.css">
  <link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="/css/nice-select.css">
  <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/css/core-style.css">
  <link rel="stylesheet" type="text/css" href="/css/datepicker3.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css?version={{ config('app.version') }}">
  <!--end::Base Styles -->
  
  <!-- Scripts -->
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}

</head>
<body>

  @include('layouts.header')
  @include('layouts.body')
  @include('layouts.footer')
  @include('layouts.scripts')

</body>
</html>
