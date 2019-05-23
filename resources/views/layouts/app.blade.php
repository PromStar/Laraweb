<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="//code.jquery.com/jquery-3.3.1.js"></script>
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.0/js/lightbox.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="{{ asset('js/jquery.form.min.js') }}"></script>
  @routes
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/flag-icon-css/flag-icon.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.0/css/lightbox.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
  <div class="d-flex" id="wrapper">
     @include('layouts.sidebar')
     <div id="page-content-wrapper">
        @include('layouts.navbar')
        @yield('content')
    </div>
  </div>
  @include('layouts.footer')
</body>
</html>
