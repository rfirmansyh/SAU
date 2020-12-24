@extends('_layouts.app-global')

@section('content-extends')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('_layouts.app-navbar')
            @include('_layouts.app-sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                <div class="section-header mb-3">
                    <h1>@yield('header')</h1>
                    <div class="section-header-breadcrumb">
                        @yield('breadcrumb')
                    </div>
                </div>

                @if(Session::has('alert-message'))
                    <div class="alert alert-{{ Session::get('alert-type') }}">
                        {{ Session::get('alert-message') }}
                    </div>
                @endif

                <div class="section-body">
                    <div class="mb-4">
                    @yield('content-header')
                    </div>
                    @yield('content')
                </div>
                </section>
            </div>

            @include('_layouts.app-footer')
        </div>
    </div>
@endsection