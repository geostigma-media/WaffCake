@extends('layouts.app')

@section('content')
<div class="container"><br>
  <img src="https://www.waffcake.com/img/logo_wk_02.png" alt="wafecake">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h3 class="titleregister">¡Bienvenido al programa de referidos de Waffcake!</h3>
      <p class="textregister">¡Regístrate en 1 solo paso y disfruta de la delicia del waffle con descuentos especiales!
      </p>
      <div class="card">
        <div class="card-header">
          <p><b>Tarjeta cliente fiel</b>, recibirás 5%, 10% y hasta el 50% de descuento al acumular compras, además
            después de inscribirte, podrás ganar hasta el 5% de descuento solo con recomendarnos en <b>"pasa la
              voz waffcake"</b> cada vez que refieras a un amigo y el haga efectiva una compra, tu recibirás el 5% y tu
            referido el 2% de descuento.</p>
          <h4 class="text-center">Comienza ahora y ¡A disfrutar del sabor wafflero! 😊</h4>
        </div>

        <div class="card-body">
          @if(Session::has('message'))
          <div class="alert alert-danger">
            {!! Session::get('message') !!}
          </div>
          @endif
          <form method="POST" action="{{ route('register_referral') }}">
            {{ method_field('post') }}
            @csrf
            <div class="form-group row">
              <label for="userReferide" class="col-md-4 col-form-label text-md-right">Código de usuario</label>
              <div class="col-md-6">
                <input id="userReferide" type="hidden" value="<?php echo $_GET["onlyCode"]; ?>" class="form-control"
                  name="userReferide" required>
                <input value="<?php echo $_GET["onlyCode"]; ?>" class="form-control" name="userReferide" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Nombres</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{ old('name') }}" required autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Apellidos</label>
              <div class="col-md-6">
                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                  name="lastname" value="{{ old('lastname') }}" required>
                @error('lastname')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Num Indentificación</label>
              <div class="col-md-6">
                <input id="numIndentificate" type="number"
                  class="form-control @error('numIndentificate') is-invalid @enderror" name="numIndentificate"
                  value="{{ old('numIndentificate') }}" required>
                @error('numIndentificate')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email', app('request')->input('recipient')) }}" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" requiredpassword">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Num de Contacto</label>
              <div class="col-md-6">
                <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror"
                  name="mobile" value="{{ old('mobile') }}" required>
                @error('mobile')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-12" style="margin-left: 150px;">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" required class="custom-control-input @error('terminos') is-invalid @enderror"
                  name="terminos" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">
                  <a href="https://www.waffcake.com/terminos_condiciones.html" target="_blank">
                    Aceptar Términos y condiciones
                  </a>
                </label>
                @error('terminos') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Registro
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection