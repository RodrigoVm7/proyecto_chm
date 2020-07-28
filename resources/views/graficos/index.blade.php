@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<body class="fondo{{$color}}">

@section('content')

<div class="container"> 

<!-- Secciones que permite mostrar mensajes en pantalla-->
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
<a href="{{ url('admin/graficos') }}" class="btn btn-success" >↻ Refrescar</a>
<a href="{{ url('index') }}" class="btn btn-success" >⏎ Regresar</a>
<br><br>

<!-- Formulario que permite adaptar el gráfico presentado filtrando por periodo y/o facultad y/o departamento-->
<form action="{{url('/admin/graficar/')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

	<table class="table table-light table-hover" id="prueba">
		<thread class="thread-light">
			<tr>
				<th>Periodos</th>
				<th>Facultad</th>
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
						<select name="facultad" size="1"  onchange="cambio(this.value)" style="
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
							@if ($seleccionado->facultad=="")
								<option selected value="" disabled selected>Seleccionar Facultad</option>
								<option value="">Todas las Facultades</option>
							@elseif ($seleccionado->facultad=="Todas las Facultades")
								<option selected value="">{{$seleccionado->facultad}}</option>
							@else
								<option selected value="{{$seleccionado->facultad}}">{{$seleccionado->facultad}}</option>
								<option value="">Todas las Facultades</option>
							@endif
							@foreach($facultades as $facultad)	
								@if($facultad->nombre != $seleccionado->facultad)
									<option value="{{$facultad->nombre}}">{{$facultad->nombre}}</option>
								@endif
							@endforeach
							
						</select>
						{!! $errors->first('facultad','<div class="invalid-feedback">:message</div>') !!}
					</div>
				</td> 

				<td>
					<div class="form-group">
						<select name="departamento" id="filtro_departamento" size="1" style="
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
							<!-- ------------------------------------------------------------------- -->
							
							
							@if ($seleccionado->departamento=="")
								<option selected value="" disabled selected>Seleccionar Departamento</option>
								<option value="">Todos los Departamentos</option>
							@elseif ($seleccionado->departamento=="Todos los Departamentos")
								<option selected value="">{{$seleccionado->departamento}}</option>
							@else
								<option selected value="{{$seleccionado->departamento}}">{{$seleccionado->departamento}}</option>
								<option value="">Todos los Departamentos</option>
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

<!-- Gráfico circular que muestra el total de tiempo destinado a cada actividad de parte de todos los academicos-->
<html>
  <head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="{!! asset('js/graficos.js') !!}"></script>
	<script type="text/javascript">
	
      google.charts.load('current', {'packages':['corechart']});
	  google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Tiempo de Todos los Academicos'],
          ['1. Actividades de Docencia',     {{$datosGrafico->totalActividad1}}],
          ['2. Actividades de Investigación',      {{$datosGrafico->totalActividad2}}],
          ['3. Extensión y Vinculación',  {{$datosGrafico->totalActividad3}}],
          ['4. Administración Académica', {{$datosGrafico->totalActividad4}}],
          ['5. Otras Actividades Realizadas',    {{$datosGrafico->totalActividad5}}]
        ]);
        var options = {
          title: 'Distribución de tiempo de todos los académicos de la universidad hacia una actividad determinada durante todos los años'
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


<!-- Tabla que presenta los academicos de la universidad, junto con un boton que permite ver informacion de un
	 academico en particular-->
<h2>Académicos</h2><br>
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
</body>

