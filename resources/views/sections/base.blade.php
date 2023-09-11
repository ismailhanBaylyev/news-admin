<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>News - @yield('title')</title>
  <!-- Include Styles -->
  @include('sections/styles')
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />
</head>

<body>
    @yield('layoutContent')
    <!-- Include Scripts -->
    @include('sections/scripts')
</body>
</html>