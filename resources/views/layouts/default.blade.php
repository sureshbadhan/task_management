<!doctype html>

<html>

<head>

   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>

</head>

<body>

<header class="main-header">
  @include('includes.header')
 </header>

<div id="main" class="my-4">
  <div class="container">
  	@yield('content')
  </div>
</div>

<footer class="footer">
  @include('includes.footer')
</footer>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script> -->  


</body>

</html>