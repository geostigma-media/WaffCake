<div class="welcome">
  <div class="row align-items-center">
    <div class="col-md-3 img"></div>
    <div class="col-md-9">
      <h2>Bienvenid@ {{ Auth()->user()->name }}, Comienza ahora y ¡A disfrutar del sabor wafflero! 😊 </h2>
      <p>Este es tu perfil del <b>Programa de Beneficios WaffcaCke</b>, aquí podrás tener toda la información de tus compras y los descuentos obtenidos. </p>
      <p><b>El programa tiene 2 beneficios. Tarjeta Cliente fiel y Pasa la Voz Waffcake</b></p>
    </div>
  </div>
</div>
<div class="card-group banners mt-4">
  <div class="card mr-3">
    <div class="row no-gutters">
      <div class="col-md-4 d-none d-sm-block"> <img src="{{ asset('img/code.jpg') }}" class="card-img" alt="Código waffcake"> </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-qrcode"></i> Tú codigo:@isset($codeClient)
            @foreach($codeClient as $code ) <span class="counter">{{$code->codReference}}</span> @endforeach
            @endisset</h5>
          <p class="card-text">Es tu identificación en el programa úsalo para hacer efectivo el descuento.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="card mr-3">
    <div class="row no-gutters">
      <div class="col-md-4 d-none d-sm-block"> <img src="{{ asset('img/tarjeta.jpg') }}" class="card-img" alt="tarjeta"> </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-id-card"></i> Tarjeta cliente fiel:@isset($conteoPurachasesEspecial) <span class="counter">{{ $conteoPurachasesEspecial }}</span> @endisset</h5>
          <p class="card-text">Acumula descuentos por tus compras. Obtienes el 5% a la
            quinta compra, el 10% a la décima compra y el 50% a la doceava compra. Actívala con tu primer pedido.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="row no-gutters">
      <div class="col-md-4 d-none d-sm-block"> <img src="{{ asset('img/voz.jpg') }}" class="card-img" alt="pasa la voz"> </div>
      <div class="col-md-8">
        <div class="card-body">
        <h5 class="card-title"><i class="fas fa-bullhorn"></i> Pasa la voz WaffCake: @isset($codReferenceClient)<span> {{$codReferenceClient}}</span>@endisset</h5>
          <p class="card-text">Podrás ganar el 5% de descuento cada vez que refieras a un amigo y &eacute;l haga efectiva una compra, adem&aacute;s la persona que refieres obtendr&aacute; un descuento del 2%.</p>
          <div>
            @if(Session::has('message'))
              <div class="alert alert-success"> {!! Session::get('message') !!} </div>
            @endif

            @isset($codeClient)
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Agregar Referido </button>
            @endisset </div>
          <div class="ml-auto"> @isset($codReferenceClient)
            <h2 class="counter text-primary"></h2>
            @if($codReferenceClient > 0)
            <h5>Usted es acreedor de un {{$codReferenceClient * 5}}% de su compra </h5>
            <p>solicitar su compra desde el area de descuento por referido</p>
            @endif
            @endisset </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-7">
    <div class="card">
      <div class="card-body">
        <hr>
        <h5 class="card-title"><i class="fas fa-cart-arrow-down"></i> Historial de compras tarjeta cliente fiel</h5>
        <p>Conoce el historial de tus compras</p>
        <table class="example table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Código Usario / Código de Compra</th>
              <th>Fecha de Compra</th>
            </tr>
          </thead>
          <tbody>

          @isset($purachasesEspecial)
          @foreach($purachasesEspecial as $purachase)
          <tr>
            <td>{{ $purachase->codReference }}</td>
            <td>{{ Carbon\Carbon::parse($purachase->created_at)->format('d-m-Y') }}</td>
          </tr>
          @endforeach
          @endisset
            </tbody>

        </table>
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="card">
      <div class="card-body"> @if(Session::has('encuestaOk'))
        <div class="alert alert-success"> {!! Session::get('encuestaOk') !!}
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        @endif
        <hr>
        <h5 class="card-title">Tu opinión cuenta</h5>
     
        <table  class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Pregunta</th>
              <th>Respuesta</th>
            </tr>
          </thead>
          <tbody>

          @isset($surveysActive)
          @foreach($surveysActive as $surveys)
          @if($surveys->ResponseEncuesta)
          <tr>
            <td>{{ $surveys->title }}</td>
            <td><form action="{{route('responseSurveys')}}" method="post"  id="responseSurveys" preventDefault();>
                @csrf
                @if($surveys->type == 1)
                <label for="SI">SI</label>
                <input id="SI" name="response" required type="radio" value="SI">
                <label for="NO">NO</label>
                <input id="NO" name="response" required type="radio" value="NO">
                @else
                <input id="response" required name="response" type="number" value="" class="form-control">
                @endif
                <input  name="userId" type="hidden" value="{{Auth()->user()->id}}">
                <input  name="surveysId" type="hidden" value="{{$surveys->id}}">
                <button  class="btn btn-secundary" type="submit"> Enviar </button>
              </form></td>
          </tr>
          @endif
          @endforeach
          @endisset
            </tbody>

        </table>
      </div>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert"> <h3><strong> <i class="fa fa-exclamation"></i> Importante</strong></h3>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      <ul style="list-style: none;">
        <li><b>1</b>. En cualquiera de los dos beneficios podrás acumular tus descuentos, pero no
          sumaran los descuentos de los dos beneficios al mismo tiempo</li>
        <li><b>2. WAFFCAKE</b> solo se podrán hacer efectivo si los pedidos se realizan a través
          de la línea directa de <b>WAFFCAKE 3128907331.</b></li>
        <li><b>3</b>. Los descuentos <b>TARJETA CLIENTE FIEL y PASA LA VOZ WAFFCAKE</b> no
          podrán efectuarse al mismo tiempo y bajo una sola compra, esto quiere decir <b>no son acumulables los descuentos de estos dos beneficios. Deben
          solicitarse por separado.</b></li>
        <li><b> 4</b>. Los descuentos efectuados para la <b> TARJETA CLIENTE FIEL y PASA LA VOZ
          WAFFCAKE, aplican solo para la compra de un producto por cliente no
          por compras totales.</b></li>
      </ul>
      <!-- <ul style="list-style: none;">
          <li>Conoce más del programa aquí (Términos y condiciones)</li>
          <li> Preguntas frecuentes</li>
        </ul>-->
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Referido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
      <form class="user"  action="/sendemail" method="POST">
        {{csrf_field()}}
        <div class="form-group">
          <label for="emialReferide">Correo electronico Referido</label>
          <input type="email" class="form-control" name="emialReferide" id="emialReferide" placeholder="Correo electronico Referido">
          @isset($codeClient)
          @foreach($codeClient as $code )
          <input type="hidden" name="codReference" value="{{ $code->codReference }}">
          @endforeach
          @endisset </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Compartir con un amigo</button>
      </form>
    </div>
  </div>
</div>
</div>
