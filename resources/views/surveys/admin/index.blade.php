@extends('layouts.base.base')
@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-8 align-self-center">
      <h4 class="text-themecolor">Bienveido {{ Auth()->user()->name }} al perfil administrador del programa de beneficios Waffcake, la wafflería del
        Sabor </h4>
    </div>
    <div class="col-md-4 align-self-center text-right">
      <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
            <li class="breadcrumb-item active">Encuestas</li>
            <li class="breadcrumb-item">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Agregar Encuesta
              </button>
            </li>
        </ol>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Lista de Encuestas Publicas</h4>
              <a href="{{route('chartSurvey')}}" class="btn btn-primary" >Ver Resusltado</a>
              <a href="{{route('surveysResultsPublic')}}" class="btn btn-success" >Exportar Resusltado</a>
              <div class="table-responsive">
              <table class="example table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Calificación el producto</th>
                    <th>Calificación el servicio</th>
                    <th>Calificación de la presentación del producto</th>
                    <th>Calificación de estado del lugar</th>
                    <th>Adiciones</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>Calificación el producto</th>
                    <th>Calificación el servicio</th>
                    <th>Calificación de la presentación del producto</th>
                    <th>Calificación de estado del lugar</th>
                    <th>Adiciones</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($surveysPublic as $surveyPublic)
                    <tr role="row" class="odd">
                      <td class="sorting_1">{{ $surveyPublic->question1 }}</td>
                      <td class="sorting_1">{{ $surveyPublic->question2 }}</td>
                      <td class="sorting_1">{{ $surveyPublic->question3 }}</td>
                      <td class="sorting_1">{{ $surveyPublic->question4 }}</td>
                      <td class="sorting_1">{{ $surveyPublic->additions }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
          </div>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Lista de Encuestas</h4>
              @if(Session::has('message'))
                <div class="alert alert-success">
                  {!! Session::get('message') !!}
                </div>
              @endif
              <div class="table-responsive">
              <table class="example table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Titulo de encuesta</th>
                    <th>Tipo de encuesta</th>
                    <th>Estado</th>
                    <th>Ver Resultados</th>
                    <th>Activar/Desactivar</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Titulo de encuesta</th>
                    <th>Tipo de encuesta</th>
                    <th>Estado</th>
                    <th>Ver Resultados</th>
                    <th>Activar/Desactivar</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($surveys as $survey)
                    <tr role="row" class="odd">
                      <td class="sorting_1">{{ $survey->title }}</td>
                      <td>{{ $survey->type == 1 ? 'SI/NO' : 'Calificación por número'}}</td>
                      <td>{{ $survey->state == 1 ? 'ACTIVA' : 'DESACTIVADA'}}</td>
                      <td><a class="btn btn-warning" href="{{route('surveyEdit', $survey->id)}}">Editar</a></td>
                      <td>
                        <form class="user"  action="{{route('surveysResults', $survey->id)}}" method="post">
                          {{csrf_field()}}
                          <input type="hidden" name="id" value="{{$survey->id}}">
                          <button class="btn btn-success"  type="submit">Ver Resultados</button>
                        </form>
                      </td>
                      <td>
                        @if($survey->state == 1)
                          <form class="user"  action="{{route('stateSurvey',$survey->id)}}" method="post">
                            {{ method_field('put') }}
                            {{csrf_field()}}
                            <input type="hidden" name="state" value="2">
                            <button class="btn btn-primary"  type="submit">DESACTIVAR</button>
                          </form>
                        @else
                          <form class="user"  action="{{route('stateSurvey',$survey->id)}}" method="post">
                            {{ method_field('put') }}
                            {{csrf_field()}}
                            <input type="hidden" name="state" value="1">
                            <button class="btn btn-primary"  type="submit">ATIVAR</button>
                          </form>
                        @endif
                      </td>

                      <td>
                        <form class="user"  action="{{route('deleteSurvy', $survey->id)}}" method="post">
                          {{ method_field('delete') }}
                          {{csrf_field()}}
                          <button class="btn btn-btn-outline-light"  onclick="return confirm('¿Esta seguro de eliminar este registro?')"  type="submit">ELIMINAR</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
          </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Encuesta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formActivacion"  action="{{route('surveysCreate')}}" method="post">
        {{ method_field('post') }}
        {{csrf_field()}}
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">
            Titulo/Pregunta de encuesta
          </label>
          <input type="text" name="title" class="form-control" require placeholder="Titulo/Pregunta de encuesta">
          <input type="hidden" name="state" value="1">
          <label for="recipient-name" class="col-form-label">
            Tipo de encuesta
          </label>
          <select name="type" id="" class="form-control" require>
            <option value="">--SELECCIONE UNA OPCION--</option>
            <option value="1">SI/NO</option>
            <option value="2">Calificación por número</option>
          </select>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection