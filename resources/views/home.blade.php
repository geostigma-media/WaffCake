@extends('layouts.base.base')
@section('content')
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-12 align-self-center">
        @if(Auth()->user()->roleId == 1)
          <h4 class="text-themecolor">Bienveido
          {{ Auth()->user()->name }} al perfil administrador del programa de beneficios Waffcake, la wafflería del Sabor</h4>
        @else
         <!-- <h4 class="text-themecolor">Bienvenido {{ Auth()->user()->name }} a Waffcake, Comienza ahora
            y ¡A disfrutar del sabor wafflero!</h4>-->
        @endif
      </div>
      <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
            </li>
          </ol>
        </div>
      </div>
    </div>
    @if(Auth()->user()->roleId == 1)
      @include('layouts.admin.content')
    @else
      @include('layouts.client.content')
    @endif
  </div>
@endsection