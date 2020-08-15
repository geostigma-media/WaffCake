@extends('layouts.base.base')
@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-12 align-self-center">
      <h4 class="text-themecolor">Bienveido {{ Auth()->user()->name }} al perfil administrador del programa de beneficios Waffcake, la wafflería del
        Sabor </h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
      <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Inicio</a>
          </li>
          <li class="breadcrumb-item"> <a href="/encuestas">encuestas ></a>  </li>
          <li class="breadcrumb-item active">Editar ></li>
        </ol>

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
        <form id="formActivacion"  action="{{route('surveyUpdate', $surveys->id)}}" method="post">
          {{ method_field('put') }}
          {{csrf_field()}}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">
              Titulo/Pregunta de encuesta
            </label>
            <input type="text" name="title" class="form-control"
              value="{{ $surveys->title}}" placeholder="Titulo/Pregunta de encuesta">
            <input type="hidden" name="state" value="1">
            <label for="recipient-name" class="col-form-label">
              Tipo de encuesta
            </label>
          </div>
          <div class="form-group">
            @if($surveys->type == 1)
            <select name="type" id="" class="form-control" require>
              <option value="{{ $surveys->type == 1 ? 'SI/NO' : 'Calificación por número' }}">
                {{ $surveys->type == 1 ? 'SI/NO' : 'Calificación por número' }}
              </option>
              <option value="2">Calificación por número</option>
            </select>
            @else
              <select name="type" id="" class="form-control" require>
                <option value="{{ $surveys->type == 1 ? 'SI/NO' : 'Calificación por número' }}">
                  {{ $surveys->type == 1 ? 'SI/NO' : 'Calificación por número' }}
                </option>
                <option value="1">SI/NO</option>
              </select>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection