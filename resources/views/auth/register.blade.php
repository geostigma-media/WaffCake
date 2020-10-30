@extends('layouts.app')

@section('content')
<div class="container"> <br>
  <a href="https://clientes.waffcake.com" style="margin-bottom:5px"><img
      src="https://www.waffcake.com/img/logo_wk_02.png" alt="wafecake"></a>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h3 class="titleregister">¡Bienvenido al programa de beneficios de Waffcake !</h3>
      <p class="textregister">¡Regístrate en 1 solo paso y disfruta de la delicia del waffle con descuentos especiales!
      </p>
      <div class="card">
        <div class="card-header">
          <p>En el programa de Beneficios Waffcake tienes disponible:</p>
          <p><b>Tarjeta cliente fiel</b>,recibirás 5%, 10% y hasta el 50% de descuento al acumular compras. Y
            Además después de inscribirte, podrás ganar hasta el 5% de descuento solo con
            recomendarnos en <b>“pasa la voz Waffcake”</b> cada vez que refieras a un amigo y el haga
            efectiva una compra, tu recibirás el 5% y tu referido el 2% de descuento.</p>
          <p>Si te han referido, regístrate, activa tu cuenta y redime el 2% en tu primera compra.</p>
          <h4 class="text-center">Comienza ahora y … ¡A disfrutar del sabor wafflero! 😊</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Apellido</label>
              <div class="col-md-6">
                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                  name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                @error('lastname') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Num Indentificación</label>
              <div class="col-md-6">
                <input id="numIndentificate" type="number"
                  class="form-control @error('numIndentificate') is-invalid @enderror" name="numIndentificate"
                  value="{{ old('numIndentificate') }}" required autocomplete="numIndentificate">
                @error('numIndentificate') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                </span> @enderror </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email">
                @error('email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="new-password">
                @error('password') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror </div>
            </div>
            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                  autocomplete="new-password">
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Teléfono</label>
              <div class="col-md-6">
                <input id="mobile" type="number" maxlength="10"
                  oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  class="form-control @error('mobile') is-invalid @enderror" name="mobile" required
                  autocomplete="mobile" value="{{ old('mobile') }}">
                @error('mobile') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror </div>
            </div>
            <div class="col-12">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="terminos" required
                  class="custom-control-input @error('terminos') is-invalid @enderror" id="customCheck1">
                <label class="custom-control-label" for="customCheck1"> He leído y acepto términos y condiciones – <a
                    href="https://www.waffcake.com/terminos_condiciones.html" target="_blank"> Ver aquí </a> </label>
                @error('terminos') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror
              </div>
            </div>
            <hr>
            <div class="form-group mb-0 d-flex justify-content-center align-items-center">
              <div>
                <button type="submit" class="btn btn-primary btn-lg btn-block px-5"> Inscribirme</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection