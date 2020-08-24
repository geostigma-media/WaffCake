<strong></strong>@extends('layouts.base.base')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="text-themecolor">Bienveido {{ Auth()->user()->name }} al perfil administrador del programa de
                beneficios Waffcake, la wafflería del
                Sabor </h4>
        </div>
        <div class="col-md-12 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">Inicio</a>
                    </li>
                    <li class="breadcrumb-item"> <a href="/ventas">Ventas ></a> </li>
                    <li class="breadcrumb-item active">Agregar Venta ></li>
                </ol>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="buys-create-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Buscar cliente
                                frecuente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Buscar cliente nuevos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Agregar cliente</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="card-body">
                                <div id="alerta"></div>
                                <div id='activacion' style="display: none;" class='alert alert-warning'>
                                    La tarjeta del cliente cambiara de codigo.
                                </div>
                                <form class="user" action="{{ route('buys_store') }}" method="post">
                                    {{ method_field('post') }}
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">
                                            Código de cliente frecuente:
                                        </label>
                                        <select class="codReference" onchange="specialCustomer()"
                                            name="regularClienteId" style="width: 100%;">
                                            <option value="">--SELECCIONE UNA OPCIÓN</option>
                                            @foreach($frecuentClients as $client)
                                            <option value="{{ $client->id }}">
                                                {{ $client->codReference }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="userId" id="userIdTarjet">

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="ventaDoce" class="btn btn-primary">Realizar
                                            Venta</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="card-body">
                                <!-- <div id="alerta"></div> -->
                                <form class="user" action="{{ route('buys_storeRegular') }}" method="post">
                                    {{ method_field('post') }}
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">
                                            Código de cliente por Indentificación
                                        </label>
                                        @isset($clients)
                                        <select required class="codReference" name="userId" style="width: 100%;">
                                            <option value="">--SELECCIONE UNA OPCIÓN</option>
                                            @foreach($clients as $client)
                                            <option value="{{ $client->id }}">
                                                {{ $client->numIndentificate }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @endisset
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Activar Cliente Fiel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="modal-body">
                                <!-- <div id="alerta"></div> -->
                                <form method="POST" action="{{ route('createClient') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label for="name" class="col-md-12 col-form-label ">Nombre</label>
                                        <div class="col-md-12">
                                            <input required id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-12 col-form-label ">Apellido</label>
                                        <div class="col-md-12">
                                            <input required id="lastname" type="text"
                                                class="form-control @error('lastname') is-invalid @enderror"
                                                name="lastname" value="{{ old('lastname') }}" required
                                                autocomplete="lastname">
                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-12 col-form-label ">Num Indentificación</label>
                                        <div class="col-md-12">
                                            <input required id="numIndentificate" type="text"
                                                class="form-control @error('numIndentificate') is-invalid @enderror"
                                                name="numIndentificate" value="{{ old('numIndentificate') }}" required
                                                autocomplete="numIndentificate">
                                            @error('numIndentificate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-12 col-form-label ">Correo Electronico</label>
                                        <div class="col-md-12">
                                            <input required id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-12 col-form-label ">Teléfono</label>
                                        <div class="col-md-12">
                                            <input required maxlength="10"
                                                oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                id="mobile" type="number"
                                                class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                                required autocomplete="mobile">
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-primary">Registrar Cliente</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection