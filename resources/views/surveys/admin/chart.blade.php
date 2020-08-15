@extends('layouts.base.base')
@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-12 align-self-center">
      <h4 class="text-themecolor">Bienvenido a WaffCake</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
      <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
            <li class="breadcrumb-item"><a href="/encuestas">Encuestas</a></li>
            <li class="breadcrumb-item active">Graficas de encuestas</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Encuestas Publicas</h4>
              <div class="conteiner">
                <div class="row">
                  <div class="col-md-6">
                      <div id="piechart" style="width: 600px; height: 500px;"></div>
                    </div>
                    <div class="col-md-6">
                      <div id="piechartSerivices" style="width: 600px; height: 500px;"></div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div id="chartPresentacionProduct" style="width: 600px; height: 500px;"></div>
                  </div>
                  <div class="col-md-6">
                    <div id="chartLugar" style="width: 600px; height: 500px;"></div>
                  </div>
                </div>
              </div>

          </div>
      </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(chartService);
      google.charts.setOnLoadCallback(chartPresentacionProduct);
      google.charts.setOnLoadCallback(chartLugar);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['MUY MALO',{{$response1}}],
          ['MALO',{{$response2}}],
          ['REGULAR',{{$response3}}],
          ['BUENO',{{$response4}}],
          ['MUY BUENO',{{$response5}}],
        ]);

        var options = {
          title: 'Calificaciónes del Producto'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

      function chartService() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['MUY MALO',{{$questionQuestion2_1}}],
          ['MALO',{{$questionQuestion2_2}}],
          ['REGULAR',{{$questionQuestion2_3}}],
          ['BUENO',{{$questionQuestion2_4}}],
          ['MUY BUENO',{{$questionQuestion2_5}}],
        ]);

        var options = {
          title: 'Calificaciónes del Servicio'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechartSerivices'));

        chart.draw(data, options);
      }

      function chartPresentacionProduct() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['MUY MALO',{{$questionQuestion3_1}}],
          ['MALO',{{$questionQuestion3_2}}],
          ['REGULAR',{{$questionQuestion3_3}}],
          ['BUENO',{{$questionQuestion3_4}}],
          ['MUY BUENO',{{$questionQuestion3_5}}],
        ]);

        var options = {
          title: 'Calificación del presentación del producto'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chartPresentacionProduct'));

        chart.draw(data, options);
      }

      function chartLugar() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['MUY MALO',{{$questionQuestion4_1}}],
          ['MALO',{{$questionQuestion4_2}}],
          ['REGULAR',{{$questionQuestion4_3}}],
          ['BUENO',{{$questionQuestion4_4}}],
          ['MUY BUENO',{{$questionQuestion4_5}}],
        ]);

        var options = {
          title: 'Calificación de estado del lugar'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chartLugar'));

        chart.draw(data, options);
      }

   </script>
@endsection