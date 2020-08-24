@extends('layouts.app') @section('content')
<section id="wrapper" class="login-register login-sidebar">
  <div class="login-box card">
    <div class="card-body">
    @if(Session::has('encuesta'))
      <div class="alert alert-success">
        {!! Session::get('encuesta') !!}
      </div>
    @endif
    <br>
    <div>
      <img src="{{ asset ('img/waffcake-logo-small.png')}}" alt="WaffCake">
    </div>
    @error('email')
    <br>
      <div class="alert alert-danger">
        <strong>Correo o clave invalidas, intentelo nuevamente</strong>
      </div>
    @enderror
      <h3>Bienvenido al programa de Beneficios Waffcake</h3>
      <form
        method="POST"
        class="form-horizontal form-material"
        id="loginform"
        action="{{ route('login') }}"
      >
        @csrf
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input
              placeholder="Correo Electrónico"
              id="email"
              type="email"
              class="form-control @error('email') is-invalid @enderror"
              name="email"
              value="{{ old('email') }}"
              required
              autocomplete="email"
              autofocus
            />
          </div>

        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input
              type="password"
              required=""
              placeholder="Contraseña"
              id="password"
              class="form-control @error('password') is-invalid @enderror"
              name="password"
              autocomplete="current-password"
            />
          </div>
          @error('password')
          <span class="alert text-danger" role="alert">
            <strong>Error en la contraseña, intentelo nuevamente</strong>
          </span>
          @enderror
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button
              class="btn btn-info btn-lg btn-block text-uppercase btn-rounded"
              type="submit"
            >
              Entrar
            </button>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            <div class="social">
              <a
                href="javascript:void(0)"
                class="btn btn-facebook"
                data-toggle="tooltip"
                title="Login with Facebook"
              >
                <i aria-hidden="true" class="fa fa-facebook"></i>
              </a>
              <a
                href="javascript:void(0)"
                class="btn btn-googleplus"
                data-toggle="tooltip"
                title="Login with Google"
              >
                <i aria-hidden="true" class="fa fa-google-plus"></i>
              </a>
            </div>
          </div>
        </div> -->
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            Aun no tienes cuenta?
            <a href="{{ route('register') }}" class="text-primary m-l-5"
              ><b>Registrate</b></a
            >
          </div>
          <div class="col-sm-12 text-center">
            <a href="{{ route('password.request') }}" class="text-primary m-l-5"
              ><b>¿Perdió su contraseña?</b></a
            >
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

 @endsection
