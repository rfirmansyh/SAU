@extends('_layouts._app-global')

@section('content-extends')
<section class="section">
    <div class="container mt-3">
        <div class="login-brand mb-2"><img src="{{ asset('img/logo/logo-unej.png') }}" alt="logo" width="100" class="shadow-light rounded-circle"></div>
        <h4 class="text-center my-3">Sistem Audit Universitas Jember</h4>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">

            @yield('content')

            <div class="simple-footer">
                Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}
            </div>
            </div>
        </div>
    </div>
</section>    
@endsection