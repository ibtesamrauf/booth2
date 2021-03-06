<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- <link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/bootstrap/3.3.2/fonts/glyphicons-halflings-regular.woff2"> -->
    
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap_local.css') }}"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/3-col-portfolio.css') }}" rel="stylesheet">

</head>
<body>
    @include('layouts.navbar')

    <!-- Page Content -->
    <div class="container">
        @yield('content')
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">
        <!-- Copyright &copy;  -->
        Booth 2017</p>
      </div>
      <!-- /.container -->
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- // <script src="{{ asset('js/app.js') }} vendor/jquery/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
