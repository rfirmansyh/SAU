<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- CSS DEPEDENCY --}}
    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
    {{-- font awesome --}}
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}
    {{-- stisla vendor --}}
    <link rel="stylesheet" href="{{ asset('vendors/stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/stisla/css/components.css')}}">
    {{-- bs-select vendor --}}
    <link rel="stylesheet" href="{{ asset('vendors/bs-select/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/bs-datetimepicker/bootstrap-datetimepicker.min.css') }}">
    @yield('style')

    <title>SAU | @yield('title')</title>
</head>
<body>
    @yield('content-extends')
    

    @yield('modal')

    {{-- JS DEPEDENCY --}}
    {{-- bootstrap --}}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> --}}
    {{-- stisla --}}
    <script src="{{ asset('vendors/bootstrap/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/moment.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script> --}}
    <script src="{{ asset('vendors/stisla/js/stisla.js') }}"></script>
    <script src="{{ asset('vendors/stisla/js/nicescroll.js') }}"></script>
    <script src="{{ asset('vendors/stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('vendors/stisla/js/custom.js') }}"></script>
    {{-- bs-select --}}
    <script src="{{ asset('vendors/bs-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>
</html>