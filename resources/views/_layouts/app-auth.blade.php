@extends('_layouts.app-global')

@section('content-extends')
<section class="section">
    <div class="container mt-3">
        <div class="login-brand mb-2"><img src="{{ asset('img/logo/logo-unej.png') }}" alt="logo" width="100" class="shadow-light rounded-circle"></div>
        <h4 class="text-center my-3">Sistem Audit Universitas Jember</h4>
        @yield('content')

            <div class="simple-footer">
                Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}
            </div>
    </div>
</section>    
@endsection