@extends('layouts.base.base')
@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-10 align-self-center">
      <h4 class="text-themecolor">Bienveido {{ Auth()->user()->name }} al perfil administrador del programa de
        beneficios Waffcake, la wafflería del
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
          <h4 class="card-title">Listado de Clientes Fieles</h4>
          @if(Session::has('message'))
          <div class="alert alert-success">
            {!! Session::get('message') !!}
          </div>
          @endif
          <div class="table-responsive">
            <table class="example table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Nombre Completo</th>
                  <th>Num identificación</th>
                  <th>Código de Cliente</th>
                  <th>Celular</th>
                  <th>Correo Cliente</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nombre Completo</th>
                  <th>Num identificación</th>
                  <th>Código de Cliente</th>
                  <th>Celular</th>
                  <th>Correo Cliente</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($clients as $client)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$client->name }} {{$client->lastname }}</td>
                  <td>{{$client->numIndentificate }}</td>
                  <td>{{$client->codReference }}</td>
                  <td>{{$client->mobile }}</td>
                  <td>{{$client->email }}</td>
                  <td>
                    <a class="btn btn-primary" href="{{route('getClient',$client->userId)}}">Editar</a>
                  </td>
                  <td>
                    <form class="user" action="{{route('deleteUser', $client->userId)}}" method="post">
                      {{ method_field('delete') }}
                      {{csrf_field()}}
                      <button class="btn btn-btn-outline-light"
                        onclick="return confirm('¿Esta seguro de eliminar este registro?')"
                        type="submit">ELIMINAR</button>
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
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Lista de Clientes Nuevos</h4>
          @if(Session::has('message'))
          <div class="alert alert-success">
            {!! Session::get('message') !!}
          </div>
          @endif
          <div class="table-responsive">
            <table class="example table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Nombre Completo</th>
                  <th>Num identificación</th>
                  <th>Celular</th>
                  <th>Correo Electrónico</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nombre Completo</th>
                  <th>Num identificación</th>
                  <th>Celular</th>
                  <th>Correo Electrónico</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($regularclients as $client)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$client->name }} {{$client->lastname }}</td>
                  <td>{{$client->numIndentificate }}</td>
                  <td>{{$client->mobile }}</td>
                  <td>{{$client->email }}</td>
                  <td>
                    <a href="{{route('getClient',$client->id)}}">Editar</a>
                  </td>
                  <td>
                    <form class="user" action="{{route('deleteUser', $client->id)}}" method="post">
                      {{ method_field('delete') }}
                      {{csrf_field()}}
                      <button class="btn btn-btn-outline-light"
                        onclick="return confirm('¿Esta seguro de eliminar este registro?')"
                        type="submit">ELIMINAR</button>
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
</div>
@endsection