@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />

<body class="fondo{{$color}}">
@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<h2>Periodos</h2><br>

<!-- Conjunto de botones que permiten refrescar la pagina actual y regresar a la pagina anterior de navegacion-->
<a href="{{ url('admin/periodos') }}" class="btn btn-success" >↻ Refrescar</a>
<a href="{{ url('index') }}" class="btn btn-success" >⏎ Regresar</a>
<br><br>

<!-- Formulario que permite seleccionar un periodo en particular, y poder activarlo/desactivarlo-->
<form action="{{url('/admin/añoPeriodo/')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

	<table class="table table-light table-hover">
		<thread class="thread-light">
			<tr>
				<th>Año a Evaluar</th>
			</tr>
		</thread>
		<tbody>
			<tr style="text-align:center;">
				<td>
					<select id="year" name="year" required>
						<option value="0">Año</option>
						<?php  for($i=($año-1);$i<=($año+4);$i++) { echo "<option value='".$i."'>".$i."</option>"; } ?>
					</select>
				</td>
				<td><input type="submit" class="btn btn-primary" name="accion" value="Iniciar Periodo"></td>
				<td><input type="submit" class="btn btn-danger" name="accion" value="Finalizar Periodo"></td>
			</tr>
		</tbody>
	</table>
</form>

<!-- Tabla que muestra periodos que se encuentren actualmente activos-->
@if($activos!='[]')
	<table class="table table-light table-hover">
		<thread class="thread-light">
			<tr>
				<th>Periodos Actualmente Activos</th>
			</tr>
		</thread>
		<tbody>
			@foreach($activos as $activo)
			<tr style="text-align:center;">
				<td>{{ $activo->año}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endif

</div>
@endsection
</body>