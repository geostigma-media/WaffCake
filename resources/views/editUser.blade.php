@extends('layouts.base.base')
@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-10 align-self-center">
      <h4 class="text-themecolor">Bienveido {{ Auth()->user()->name }} al perfil administrador del programa de beneficios Waffcake, la wafflería del
        Sabor </h4>
    </div>
    <div class="col-md-2 align-self-center text-right">
      <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
            <li class="breadcrumb-item active">Clientes</li>
        </ol>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Datos Personales</h4>
              @if(Session::has('message'))
                <div class="alert alert-success">
                  {!! Session::get('message') !!}
                </div>
              @endif
              <form action="{{route('updateUser',$user->id)}}" method="post">
                  {{csrf_field()}}
                  {{ method_field('put') }}
                  <div class="form-group row">
                    <label for="name" class="col-md-12 col-form-label">Nombre</label>
                    <div class="col-md-12">
                      <input required id="name" value="{{$user->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-md-12 col-form-label">Apellido</label>
                    <div class="col-md-12">
                      <input required id="lastname" value="{{$user->lastname}}" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" >
                      @error('lastname')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-md-12 col-form-label">Num Indentificación</label>
                    <div class="col-md-12">
                      <input required id="numIndentificate" value="{{$user->numIndentificate}}" type="text" class="form-control @error('numIndentificate') is-invalid @enderror" name="numIndentificate" value="{{ old('numIndentificate') }}" required autocomplete="numIndentificate" >
                      @error('numIndentificate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-md-12 col-form-label">Correo Electronico</label>
                    <div class="col-md-12">
                        <input required id="email" type="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                      <label for="mobile" class="col-md-12 col-form-label ">Num de Contacto</label>
                      <div class="col-md-12">
                          <input required id="mobile" type="text" value="{{$user->mobile}}"  class="form-control @error('mobile') is-invalid @enderror" name="mobile" required autocomplete="mobile">
                          @error('mobile')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-md-12 col-form-label ">Actualizar Contraseña</label>
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <button type="submit"  class="btn btn-primary">Actualizar Datos</button>
                  </div>
                </form>
          </div>
      </div>
    </div>
</div>
@endsection