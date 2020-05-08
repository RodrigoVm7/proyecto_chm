@extends('layouts.app')

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-danger" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<h2>Gráficos {{$datosGrafico->nombre}}</h2><br>

@if($permiso!='Secretario')
  <a href="{{ url('admin/graficos') }}" class="btn btn-success" >⏎ Regresar</a>
@else
  <a href="{{ url('secretario/graficos') }}" class="btn btn-success" >⏎ Regresar</a>
@endif
<br><br>

<!-- Formulario que permite adaptar los dos graficos de un académico filtrando por periodo-->
<form action="{{url('/admin/graficoAcademicoPeriodo/')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

	<table class="table table-light table-hover">
		<thread class="thread-light">
			<tr>
				<th>Periodos</th>
			</tr>
		</thread>

		<tbody>
			<tr>
				<td>
					<div class="form-group">
						<select name="periodo" size="1" style="
			    			display: block;
							width: 100%;
			    			height: calc(2.19rem + 2px);
							padding: .375rem .75rem;
							font-size: .9rem;
							line-height: 1.6;
							color: #495057;
							background-color: #fff;
							background-clip: padding-box;
							border: 1px solid #ced4da;
							border-radius: .25rem;">
							@if($seleccionado=="")
								<option selected value="" disabled selected>Seleccionar</option>
							@else
								<option selected value="{{$seleccionado}}">{{$seleccionado}}</option>
							@endif
							@foreach($periodos as $periodo)
								@if($periodo->año!=$seleccionado)
									<option value="{{$periodo->año}}">{{$periodo->año}}</option>
								@endif
							@endforeach
						</select>
						{!! $errors->first('periodo','<div class="invalid-feedback">:message</div>') !!}
					</div>
				</td>
				<td><input type="submit" class="btn btn-primary" name="accion" value="Graficar"></td>
			</tr>
		</tbody>
	</table>
	<input type="text" class="form-control {{$errors->has('rut')?'is-invalid':''}}" name="rut" id="rut" value="{{ $datosGrafico->rut}}" hidden=></li>
</form>



<!-- Grafico circular que muestra los tiempos por activiad del académico en cuestión-->
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Tiempos por Actividad'],
          ['1. Actividades de Docencia',     {{$datosGrafico->totalActividad1}}],
          ['2. Actividades de Investigación',      {{$datosGrafico->totalActividad2}}],
          ['3. Extensión y Vinculación',  {{$datosGrafico->totalActividad3}}],
          ['4. Administración Académica', {{$datosGrafico->totalActividad4}}],
          ['5. Otras Actividades Realizadas',    {{$datosGrafico->totalActividad5}}]
        ]);

        var options = {
          title: 'Distribución de tiempo hacia una actividad determinada durante todos los años'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>

<!-- Grafico de barras que las evaluaciones finales historicas del académico en cuestión-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Periodo", "Calificacion", { role: "style" } ],
        @foreach($calificacionesFinales as $calificacionFinal)
        	["{{$calificacionFinal->año}}", {{$calificacionFinal->nota_final}}, "skyblue"],
        @endforeach
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Evaluaciones Finales Históricas",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  	}
</script>
<br><h5>Concentración Histórica de Notas Finales</h2>
<div id="columnchart_values" style="width: 900px; height: 500px;"></div>

</html>
</div>
@endsection