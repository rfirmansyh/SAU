@extends('ui._layouts.app-auth')

@section('title', 'Login')
@section('content')

<div class="card card-primary">
  <div class="card-header py-1 mb-2"><h4 class="my-0">Selamat Datang Kembali !</h4></div>
  
  <div class="card-body py-1 pb-4">
    <form method="POST" action="">
      @csrf
      <div class="form-group mb-2">
        <label for="username">Username</label>
        <input aria-describedby="emailHelpBlock" id="username" type="username" class="form-control" name="username" placeholder="Masukan Username" tabindex="1" value="" autofocus>
      </div>

      <div class="form-group">
        <label for="password" class="control-label">Password</label>
        <input aria-describedby="passwordHelpBlock" id="password" type="password" placeholder="Masukan Password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password" tabindex="2">
      </div>

      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" tabindex="3" id="customCheck1">
          <label class="custom-control-label" for="customCheck1">Ingat Saya ?</label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4"> Masuk </button>
    </form>
  </div>
</div>
@endsection
