@extends('layouts.app')

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(!empty($Mensaje))
  <div class="alert alert-danger"> {{ $Mensaje }}</div>
@endif

@if(Session::has('Mensaje'))
<div class="alert alert-danger" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif


<h2>Gráficos</h2><br>
<!-- Conjunto de botones que permiten refrescar la pagina y regresar en la navegación-->
<a href="{{ url('secretario/graficos') }}" class="btn btn-success" >↻ Refrescar</a>
<a href="{{ url('index') }}" class="btn btn-success" >⏎ Regresar</a>
<br><br>

<!-- Formulario que permite adaptar el gráfico presentado filtrando por periodo y/o departamento-->
<form action="{{url('/secretario/graficar/')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

	<table class="table table-light table-hover">
		<thread class="thread-light">
			<tr>
				<th>Periodos</th>
				<th>Departamento</th>
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
							@if($seleccionado->periodo=="")
								<option selected value="" disabled selected>Seleccionar</option>
							@else
								<option selected value="{{$seleccionado->periodo}}">{{$seleccionado->periodo}}</option>
							@endif
							@foreach($periodos as $periodo)
								@if($periodo->año!=$seleccionado->periodo)
									<option value="{{$periodo->año}}">{{$periodo->año}}</option>
								@endif
							@endforeach
						</select>
						{!! $errors->first('periodo','<div class="invalid-feedback">:message</div>') !!}
					</div>
				</td>

				<td>
					<div class="form-group">
						<select name="departamento" size="1" style="
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
							@if($seleccionado->departamento=="")
								<option selected value="" disabled selected>Seleccionar Departamento</option>
							@else
								<option selected value="{{$seleccionado->departamento}}">{{$seleccionado->departamento}}</option>
							@endif
							@foreach($departamentos as $departamento)
								@if($departamento->nombre != $seleccionado->departamento)
									<option value="{{$departamento->nombre}}">{{$departamento->nombre}}</option>
								@endif
							@endforeach
						</select>
						{!! $errors->first('departamento','<div class="invalid-feedback">:message</div>') !!}
					</div>
				</td>
				<td><input type="submit" class="btn btn-primary" name="accion" value="Graficar"></td>
			</tr>
		</tbody>
	</table>
</form>

<!-- Gráfico circular que muestra el total de tiempo destinado a cada actividad de parte de todos los academicos de la facultad del usuario-->
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Tiempo de Todos los Academicos de la Facultad'],
          ['1. Actividades de Docencia',     {{$datosGrafico->totalActividad1}}],
          ['2. Actividades de Investigación',      {{$datosGrafico->totalActividad2}}],
          ['3. Extensión y Vinculación',  {{$datosGrafico->totalActividad3}}],
          ['4. Administración Académica', {{$datosGrafico->totalActividad4}}],
          ['5. Otras Actividades Realizadas',    {{$datosGrafico->totalActividad5}}]
        ]);

        var options = {
          title: 'Distribución de tiempo de la Facultad hacia una actividad determinada durante todos los años'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
      
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>


<!-- Gráfico de barras que muestra las calificaciones finales de los academicos de la facultad del usuario. Se muestra solo cuando alla un
	 periodo seleccionado para filtrar-->
@if($seleccionado->periodo!="" && $evaluaciones!="[]")
	<html>
		<head>	
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
	    		google.charts.load("current", {packages:['corechart']});
	    		google.charts.setOnLoadCallback(drawChart);
	    		function drawChart() {
	      			var data = google.visualization.arrayToDataTable([
	        			["Academico", "Calificacion", { role: "style" } ],
	        			@foreach($evaluaciones as $evaluacion)
	        				["{{$evaluacion->nombre_academico}} {{$evaluacion->apellido_academico}}", {{$evaluacion->nota_final}}, "skyblue"],
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
				        title: "Notas Finales Históricas de los academicos de la Facultad",
				        width: 600,
				        height: 400,
				        bar: {groupWidth: "95%"},
				        legend: { position: "none" },
				    };
	      			var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
	      			chart.draw(view, options);
	  			}
			</script>
		</head>
		<body>
			<div id="columnchart_values" style="width: 900px; height: 500px;"></div>
		</body>
	</html>
@else
	<br><br><center><h5>No hay Datos Para Presentar</h5></center><br><br>
@endif

<!-- Tabla que presenta los academicos de la facultad del usuario, junto con un boton para ver mas informacion del academico
	 seleccionado.-->
<h4>Académicos</h4>
<table class="table table-light table-hover">
	<thread class="thread-light">
		<tr>
			<th>Rut</th>
			<th>Nombre(s)</th>
			<th>Apellido(s)</th>
			<th>Departamento</th>
			<th>Título Profesional</th>
			<th>Estado</th>
			<th>Ver Informacion</th>
		</tr>
	</thread>
	<tbody>
		@foreach($academicos as $academico)
		<tr>
			<td>{{ $academico->rut}}</td>
			<td>{{ $academico->nombre}}</td>
			<td>{{ $academico->apellido}}</td>
			<td>{{ $academico->departamento}}</td>
			<td>{{ $academico->titulo}}</td>
			<td>{{ $academico->estado}}</td>
			<td>
			<a class="btn btn-success" href="{{ url('/graficoAcademico/'.$academico->rut.'') }}">Info
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="text-center">
	{{$academicos->links()}}
</div>

</div>
@endsection