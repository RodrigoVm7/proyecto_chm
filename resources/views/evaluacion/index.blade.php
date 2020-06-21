@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />

<body class="fondo{{$color}}">

@section('content')

<script type="text/javascript" src="{!! asset('js/evaluar.js') !!}"></script>

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-danger" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<h2>Evaluaciones</h2><br>

<!-- Conjunto de botones que permiten refrescar la página y regresar atrás-->
<a href="{{ url('evaluacion') }}" class="btn btn-success" >↻ Refrescar</a>
<a href="{{ url('index') }}" class="btn btn-success" >⏎ Regresar</a>
<br><br>

<a class="btn btn-primary" style="border:none;color:white;padding: 15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size: 16px;margin: 4px 2px;width: 100%;cursor: pointer;" onclick="Mostrar_ocultar('panel_evaluar');">Académicos no evaluados</a>

<section id="panel_evaluar" style="display: none;">

<!-- Formulario que permite seleccionar una comision, junto con un docente a evaluar-->
<form action="{{url('/evaluar')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

<!-- Tabla donde se presentan las comisiones disponibles-->
<table class="table table-light table-hover">
	<thread class="thread-light">
		<tr>
			<th>Comisiones Disponibles </th>
		</tr>
	</thread>

	<tbody>
		<tr>
			<td>Trabajar con:
				<div class="form-group">
					@if(!empty($Mensaje))
  						<div class="alert alert-danger"> {{ $Mensaje }}</div>
					@endif
   					<label class="radio-inline">
   						@php
        					$c=count($comisiones)
        				@endphp
   						@foreach($comisiones as $comision)
   							@if($c==1)
        						<input  type="radio"  name="comision" id="{{$comision->id_comision}}" value="{{$comision->id_comision}}" required checked> 
        					@else
        						<input  type="radio"  name="comision" id="{{$comision->id_comision}}" value="{{$comision->id_comision}}" required>
        					@endif 
        						<b>Año</b>: {{$comision->año}}  -  <b>Rut</b>: {{$comision->rut_academico}}  -  <b>Decano</b>: {{$comision->decano}}  -  <b>Miembro1</b>: {{$comision->miembro1}}  -  <b>Miembro2</b>: {{$comision->miembro2}}<br>
        				@endforeach
        			</label>
 				</div>
 			</td>
 		</tr>
	</tbody>
</table>

<br>

<!-- Tabla donde se presentan las academicos disponibles, junto con un boton que permite evaluar al academico seleccionado-->
<table class="table table-light table-hover">
	<thread class="thread-light">
		<tr>
			<th>Académicos Disponibles </th>
		</tr>
	</thread>

	<thread class="thread-light">
		<tr>
			<th>Rut</th>
			<th>Nombre(s)</th>
			<th>Apellido(s)</th>
			<th>Facultad</th>
			<th>Departamento</th>
			<th>Título Profesional</th>
			<th>Estado</th>
			<th>Evaluar</th>
		</tr>
	</thread>

	<tbody>
		@foreach($academicos as $academico)
		<tr>
			<td>{{ $academico->rut}}</td>
			<td>{{ $academico->nombre}}</td>
			<td>{{ $academico->apellido}}</td>
			<td>{{ $facultadUsuario}}</td>
			<td>{{ $academico->departamento}}</td>
			<td>{{ $academico->titulo}}</td>
			<td>{{ $academico->estado}}</td>
			<td>
				<button type="submit" class="btn btn-primary" name="rutAcademico" value="{{$academico->rut}} ">✎</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</form>
	<div class="text-center">
		{{$academicos->links()}}
	</div>
</section>
<br><br>

<a class="btn btn-primary" style="border:none;color:white;padding: 15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size: 16px;margin: 4px 2px;width: 100%;cursor:pointer;" onclick="Mostrar_ocultar('panel_yaEvaluados');">Académicos ya evaluados</a>

<section id="panel_yaEvaluados" style="display: none;">
	<table class="table table-light table-hover">
	<thread class="thread-light">
		<tr>
			<th>Académicos</th>
		</tr>
	</thread>

	<thread class="thread-light">
		<tr>
			<th>Rut</th>
			<th>Nombre(s)</th>
			<th>Apellido(s)</th>
			<th>Facultad</th>
			<th>Departamento</th>
			<th>Título Profesional</th>
			<th>Estado</th>
			<th>Editar Evaluación</th>
			<th>Ver Evaluación</th>
		</tr>
	</thread>

	<tbody>
		@foreach($yaEvaluados as $evaluado)
		<tr>
			<td>{{ $evaluado->rut}}</td>
			<td>{{ $evaluado->nombre}}</td>
			<td>{{ $evaluado->apellido}}</td>
			<td>{{ $facultadUsuario}}</td>
			<td>{{ $evaluado->departamento}}</td>
			<td>{{ $evaluado->titulo}}</td>
			<td>{{ $evaluado->estado}}</td>
			<td>
				<a class="btn btn-primary" href="{{ url('evaluacion/actualizar/'.$evaluado->rut) }}" >✎</a>
			</td>
			<td>
				<a class="btn btn-primary" href="{{ url('evaluacion/ver/'.$evaluado->rut) }}" >📄</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="text-center">
		{{$yaEvaluados->links()}}
</div>
</section>
</div>
@endsection
</body>