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
  <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/jquery.form.min.js') }}"></script>
  @routes
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
  <link href="{{ asset('css/root.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
  <div class="d-flex" id="wrapper">
     <div id="page-content-wrapper">
        @yield('content')
    </div>
  </div>
</body>
</html>
