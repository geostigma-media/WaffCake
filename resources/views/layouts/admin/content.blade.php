<div class="card-group">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3><i class="fas fa-users"></i></h3>
                            <p class="text-muted">Total clientes Inscritos en el programa</p>
                        </div>
                        <div class="ml-auto">
                            <h2 class="counter text-primary">{{ $clients }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <button type="button" class="btn btn-btn-outline-light btn-sm" data-toggle="modal"
                                data-target="#exampleModal">
                                <h3><i class="fas fa-crown"></i></h3>
                            </button>
                            <p class="text-muted">REDIMIR PUNTOS REFERIDOS</p>
                        </div>
                        <div class="ml-auto">
                            <h2 class="counter text-cyan">{{$especialClients}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3><i class="fas fa-shopping-bag"></i></h3>
                            <p class="text-muted">TOTAL VENTAS</p>
                        </div>
                        <div class="ml-auto">
                            <h2 class="counter text-purple">{{ $totalBuys }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="alert-danger">
            @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <div class="card">

            <div class="card-body">
                <ul id="buys-content-tabs" class="nav nav-tabs" style="display: none;" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                            <i class="fas fa-star"></i>
                            Buscar cliente fiel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                            <i class="fas fa-users"></i>
                            Buscar cliente nuevos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                            <i class="fas fa-user"></i>
                            Registrar cliente nuevo</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="card-body">
                            <div id="alerta"></div>
                            @if(Session::has('messageReferide'))
                            <div class="alert alert-warning">
                                {!! Session::get('messageReferide') !!}
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                            </div>
                            @endif
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                {!! Session::get('message') !!}
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                            </div>
                            @endif

                            <div id="activacion">
                                <form id="formActivacion" action="{{route('activateTarjet')}}" method="post">
                                    {{ method_field('post') }}
                                    {{csrf_field()}}
                                    <input type="hidden" name="codReference" value={{rand(1001,5000) }}">
                                    <input type="hidden" name="state" value="1">
                                    <input type="hidden" name="userId" value="">
                                </form>
                            </div>
                            <form class="user" action="{{route('buys_store')}}" method="post">
                                {{ method_field('post') }}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">
                                        Código de tarjeta cliente fiel:
                                    </label>
                                    <select required class="codReferenceCliente" id="codReferenceCliente"
                                        onchange="specialCustomer()" name="regularClienteId" style="width: 100%;">
                                        <option value="">--Buscar código</option>
                                        @foreach($frecuentClients as $client)
                                        <option value="{{ $client->id }}">
                                            {{ $client->codReference }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <span>En este panel activarás un cliente para generarle su código, después de activarlo
                                    deberás registrar la venta y si un cliente nuevo está en el establecimiento podrás
                                    ingresarlo en “registrar cliente nuevo” posterior a registrarlo, registra su venta
                                    y listo.</span>
                                <hr>

                                <div class="form-group">
                                    <button type="submit" id="ventaDoce" class="btn btn-primary">Registrar
                                        Venta</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                        <div class="card-body">
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                {!! Session::get('message') !!}
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                            </div>
                            @endif
                            <form class="user" action="{{route('users.activate')}}" method="post">
                                {{ method_field('post') }}
                                {{csrf_field()}}
                                <input type="hidden" name="from" value="home" />
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">
                                        Código de cliente por Indentificación
                                    </label>
                                    @isset($listClients)
                                    <select required class="codReference" name="userId" style="width: 100%;">
                                        <option value="">--Buscar número de cédula</option>
                                        @foreach($listClients as $client)
                                        <option value="{{ $client->id }}">
                                            {{ $client->numIndentificate }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @endisset
                                </div>
                                <span>En este panel activarás un cliente para generarle su código, después de activarlo
                                    deberás registrar la venta y si un cliente nuevo está en el establecimiento podrás
                                    ingresarlo en “registrar cliente nuevo” posterior a registrarlo, registra su venta
                                    y listo.</span>
                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Activar cliente</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                        <div class="modal-body">
                            <!-- <div id="alerta"></div> -->
                            <form method="POST" action="{{ route('createClient') }}">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="name" class="col-md-12 col-form-label ">Nombre</label>
                                    <div class="col-md-12">
                                        <input required id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-12 col-form-label ">Apellido</label>
                                    <div class="col-md-12">
                                        <input required id="lastname" type="text"
                                            class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                            value="{{ old('lastname') }}" required autocomplete="lastname">
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
                                        <input required id="numIndentificate" type="number"
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
                                    <button type="submit" class="btn btn-primary btn-block">Registrar Cliente</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buscar Código Referido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="totalReferides"></div>
                <form id="searchCode" action="javascript:void(0)" name="searchCode" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="emialReferide">Código Referido</label>
                        <input type="text" class="form-control" require name="codeReferide" id="codeReferide"
                            placeholder="Código Referido">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="btnsearchCode" onclick="countReferences()" class="btn btn-primary">Consultar Codigo</button>
                </form>
                <form id="formPagar" style="display: none;" action="{{route('updateUserReferides')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" class="form-control" id="userReferide" name="userReferide">
                    <button type="submit" class="btn btn-primary">Pagar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
    $(document).ready(function () {
        $("#buys-content-tabs").show();
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#buys-content-tabs a[href="' + activeTab + '"]').tab('show');
        }
    });
</script>
@endsection