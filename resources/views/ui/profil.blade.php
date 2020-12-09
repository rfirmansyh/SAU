@extends('ui._layouts.app')

@section('title', 'Dashboard')

@section('header', 'Profil')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item">Profil</div>
@endsection
@section('content-header')
  <h2 class="section-title">Profil Saya</h2>
@endsection

{{-- garapnya dari sini --}}
@section('content')
    
@endsection
{{-- sampek sini --}}

@section('style')

@endsection

@section('script')
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endsection