@extends('layouts.app')

@section('content')
<div class="container">
  <a href="https://clientes.waffcake.com"><img src="https://www.waffcake.com/img/logo_wk_02.png" alt="wafecake"></a>
  <div class="row justify-content-center">

    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3>Tu opinión cuenta</h3>
          <p>
            Eres nuestra razón de ser, regálanos tus opiniones para continuar mejorando para ti.
          </p>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('surveyPublic') }}">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                Del 1 al 5 en cúanto calificarias el producto
              </label>
              <div class="col-md-6 mt-3">
                <label class="radio-inline">
                  <input type="radio" value="MUY MALO" require name="question1"> 1
                </label>
                <label class="radio-inline">
                  <input type="radio" value="MALO" require name="question1"> 2
                </label>
                <label class="radio-inline">
                  <input type="radio" value="REGULAR" require name="question1"> 3
                </label>
                <label class="radio-inline">
                  <input type="radio" value="BUENO" require name="question1"> 4
                </label>
                <label class="radio-inline">
                  <input type="radio" value="MUY BUENO" require name="question1"> 5
                </label>
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                Del 1 al 5 en cúanto calificarias el servicio
              </label>
              <div class="col-md-6 mt-3">
                <label class="radio-inline">
                  <input type="radio" value="MUY MALO" require name="question2"> 1
                </label>
                <label class="radio-inline">
                  <input type="radio" value="MALO" require name="question2"> 2
                </label>
                <label class="radio-inline">
                  <input type="radio" value="REGULAR" require name="question2"> 3
                </label>
                <label class="radio-inline">
                  <input type="radio" value="BUENO" require name="question2"> 4
                </label>
                <label class="radio-inline">
                  <input type="radio" value="MUY BUENO" require name="question2"> 5
                </label>
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                Del 1 al 5 en cúanto calificarias la presentación del producto
              </label>
              <div class="col-md-6 mt-3">
                <label class="radio-inline">
                  <input type="radio" value="MUY MALO" require name="question3"> 1
                </label>
                <label class="radio-inline">
                  <input type="radio" value="MALO" name="question3"> 2
                </label>
                <label class="radio-inline">
                  <input type="radio" value="REGULAR" require name="question3"> 3
                </label>
                <label class="radio-inline">
                  <input type="radio" value="BUENO" require name="question3"> 4
                </label>
                <label class="radio-inline">
                  <input type="radio" value="MUY BUENO" require name="question3"> 5
                </label>
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                Del 1 al 5 en cúanto calificarias el estado del lugar
              </label>
              <div class="col-md-6 mt-3">
                <label class="radio-inline">
                  <input type="radio" value="MUY MALO" require name="question4"> 1
                </label>
                <label class="radio-inline">
                  <input type="radio" value="MALO" require name="question4"> 2
                </label>
                <label class="radio-inline">
                  <input type="radio" value="REGULAR" require name="question4"> 3
                </label>
                <label class="radio-inline">
                  <input type="radio" value="BUENO" require name="question4"> 4
                </label>
                <label class="radio-inline">
                  <input type="radio" value="MUY BUENO" require name="question4"> 5
                </label>
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                ¿Qué adicionarias?
              </label>
              <div class="col-md-6 mt-3">
                <textarea name="additions" id="" class="form-control" require style="resize: none;"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                Correo Electronico
              </label>
              <div class="col-md-6 mt-3">
                <input type="text" class="form-control" name="email" require placeholder="Correo Electrónico">
              </div>
            </div>
            <div class="col-lg-12 ">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" required value="ACEPTO" name="verificate"
                  id="customCheck1">
                <label class="custom-control-label" for="customCheck1">
                  Autorizo de manera libre, voluntaria, previa explicita, informada e inequivoca
                  a Waffcake para que realice la recoleccion, almacenamiento, uso en general el
                  tratamiento de los datos personales que he entrago.
                </label>
              </div>
            </div>
            <hr>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Responder
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection