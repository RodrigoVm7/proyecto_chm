@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />

<body class="fondo{{$color}}">

@section('content')

<script type="text/javascript" src="{!! asset('js/evaluar.js') !!}"></script>

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(!empty($Mensaje))
  <div class="alert alert-success"> {{ $Mensaje }}</div>
@endif

<!--Seccion que muestra por pantalla los resultados (ponderaciones y nota final)de una evaluacion ya creada.-->

<a class="btn btn-primary" style="border:none;color:white;padding: 15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size: 16px;margin: 4px 2px;width: 100%;cursor: pointer;" onclick="Mostrar_ocultar('ident_academic');">Identificación Académico</a>
<br>
<section id="ident_academic" style="display: none">
<div class="panel panel-primary">
		<div class="panel-body">
			<ul class="list-group">
				<li class="list-group-item">Rut: <input type="text" class="form-control {{$errors->has('rutAcademico')?'is-invalid':''}}" name="rutAcademico" id="rutAcademico" value="{{ $data->rut_academico}}" readonly></li>

				<li class="list-group-item">Nombre: <input type="text" class="form-control {{$errors->has('nombreAcademico')?'is-invalid':''}}" name="nombreAcademico" id="nombreAcademico" value="{{ $data->nombre_academico}}" readonly></li>

				<li class="list-group-item">Apellido: <input type="text" class="form-control {{$errors->has('apellidoAcademico')?'is-invalid':''}}" name="apellidoAcademico" id="apellidoAcademico" value="{{ $data->apellido_academico}}" readonly></li>

				<li class="list-group-item">Departamento: <input type="text" class="form-control {{$errors->has('dptoAcademico')?'is-invalid':''}}" name="dptoAcademico" id="dptoAcademico" value="{{ $data->departamento_academico}}" readonly></li>

				<li class="list-group-item">Título Profesional: <input type="text" class="form-control {{$errors->has('titulo')?'is-invalid':''}}" name="titulo" id="titulo" value="{{ $data->tp_academico}}" readonly></li>
			</ul>
		</div>
</div>
</section>


<a class="btn btn-primary" style="border:none;color:white;padding: 15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size: 16px;margin: 4px 2px;width: 100%;cursor: pointer;" onclick="Mostrar_ocultar('calification');">Calificación Académica</a>
<br>
<section id="calification" style="display: none">
<table class="table table-light table-hover">
	<thread class="thread-light">
		<tr>
			<th></th>
			<th>% Tiempo Asignado a Tareas Programadas</th>
			<th>E</th>
			<th>MB</th>
			<th>B</th>
			<th>R</th>
			<th>D</th>
			<th>$TxC/100</th>
		</tr>
	</thread>

	<tbody>
		<tr>
			<td>1. Actividades de Docencia</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="tiempoAsignado1" id="tiempoAsignado1" value="{{$data->tiempoActividad1}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="1e" id="1e" value="{{$data->e1}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="1mb" id="1mb" value="{{$data->mb1}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="1b" id="1b" value="{{$data->b1}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="1r" id="1r" value="{{$data->r1}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="1d" id="1d" value="{{$data->d1}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="1tc" id="1tc" value="{{$data->t1c}}" readonly>
				</div>
			</td>
		</tr>

		<tr>
			<td>2. Actividades de Investigación</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="tiempoAsignado2" id="tiempoAsignado2" value="{{$data->tiempoActividad2}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="2e" id="2e" value="{{$data->e2}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="2mb" id="2mb" value="{{$data->mb2}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="2b" id="2b" value="{{$data->b2}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="2r" id="2r" value="{{$data->r2}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="2d" id="2d" value="{{$data->d2}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="2tc" id="2tc" value="{{$data->t2c}}" readonly>
				</div>
			</td>
		</tr>

		<tr>
			<td>3. Extensión y Vinculación</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="tiempoAsignado3" id="tiempoAsignado3" value="{{$data->tiempoActividad3}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="3e" id="3e" value="{{$data->e3}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="3mb" id="3mb" value="{{$data->mb3}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="3b" id="3b" value="{{$data->b3}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="3r" id="3r" value="{{$data->r3}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="3d" id="3d" value="{{$data->d3}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control {{$errors->has('3tc')?'is-invalid':''}}" name="3tc" id="3tc" value="{{$data->t3c}}" readonly>
				</div>
			</td>
		</tr>

		<tr>
			<td>4. Administración Académica</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="tiempoAsignado4" id="tiempoAsignado4" value="{{$data->tiempoActividad4}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="4e" id="4e" value="{{$data->e4}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="4mb" id="4mb" value="{{$data->mb4}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="4b" id="4b" value="{{$data->b4}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="4r" id="4r" value="{{$data->r4}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="4d" id="4d" value="{{$data->d4}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="4tc" id="4tc" value="{{$data->t4c}}" readonly>
				</div>
			</td>
		</tr>

		<tr>
			<td>5. Otras Actividades Realizadas</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="tiempoAsignado5" id="tiempoAsignado5" value="{{$data->tiempoActividad5}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="5e" id="5e" value="{{$data->e5}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="5mb" id="5mb" value="{{$data->mb5}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="5b" id="5b" value="{{$data->b5}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="5r" id="5r" value="{{$data->r5}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="5d" id="5d" value="{{$data->d5}}" readonly>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label class="control-label"></label>
					<input type="text" class="form-control" name="5tc" id="5tc" value="{{$data->t5c}}" readonly>
				</div>
			</td>
		</tr>
	</tbody>
</table>

<div class="panel panel-primary">
		<div class="panel-body">
		<ul class="list-group">
		<li class="list-group-item">
			@if($data->nota_final>4.4)
			<h5><center>Nota: {{ $data->nota_final }}. - Excelente</center></h5>

			@elseif($data->nota_final>3.9)
			<h5><center>Nota: {{ $data->nota_final }}. - Muy Bueno</center></h5>

			@elseif($data->nota_final>3.4)
			<h5><center>Nota: {{ $data->nota_final }}. - Bueno</center></h5>

			@elseif($data->nota_final>2.6)
			<h5><center>Nota: {{ $data->nota_final }}. - Regular</center></h5>

			@elseif($data->nota_final<2.7)
			<h5><center>Nota: {{ $data->nota_final }}. - Deficiente</center></h5>
			@endif

			<br>ESCALA: Excelente = 4.5 a 5  Muy Bueno = 4.0 a 4.4  Bueno = 3.5 a 3.9
				  Regular = 3.4 a 2.7  Deficiente = menos de 2.7</li>
		</ul>
		</div>
</div>
</section>


<a class="btn btn-primary" style="border:none;color:white;padding:15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;margin: 4px 2px;width:100%;cursor:pointer;" onclick="Mostrar_ocultar('arg_calif');">Argumentos de la Calificación Final</a>
<br>
<section id="arg_calif" style="display: none">
<div class="panel-body">
		<ul class="list-group">
		<li class="list-group-item"><input type="text" class="form-control {{$errors->has('comentarios')?'is-invalid':''}}" name="comentarios" id="comentarios" value="{{ $data->comentarios }}" readonly></li>
		</ul>
</div>
</section>

<br>
<div class="panel-body">
		<ul class="list-group">
		<li class="list-group-item">Miembro Uno: <input type="text" class="form-control {{$errors->has('miembro1')?'is-invalid':''}}" name="miembro1" id="miembro1" value="{{ $data->miembro1}}" readonly></li>

		<li class="list-group-item">Decano: <input type="text" class="form-control {{$errors->has('decano')?'is-invalid':''}}" name="decano" id="decano" value="{{ $data->decano}}" readonly></li>

		<li class="list-group-item">Miembro Dos: <input type="text" class="form-control {{$errors->has('miembro2')?'is-invalid':''}}" name="miembro2" id="miembro2" value="{{ $data->miembro2}}" readonly></li>
</div>

<br>

<a class="btn btn-primary" href="{{ url('evaluacion') }}">Regresar ←</a>

@endsection
</body>