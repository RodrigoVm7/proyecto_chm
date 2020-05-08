@extends('layouts.app')

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<br><br>

<!-- Seccion que permite que hará que todo lo que se muestre a continuacion, sea dentro de una tabla-->
<table class="table table-light table-hover">

	<!-- Cabecera de la tabla, donde se especifica los datos que tendrá cada columna-->
	<thread class="thread-light">
		<tr>
			<th>Nombre</th>
			<th>Facultad</th>
			<th>Estado</th>
			<th>Editar</th>
		</tr>
	</thread>

	<tbody>
		<!-- Mediante un ciclo For, se mostrará dentro de la tabla el contenido de cada departamento, junto con un boton que
			 permitirá editar el departamento seleccionado-->
		@foreach($datos as $departamento)
		<tr>
			<td>{{ $departamento->nombre}}</td>
			<td>{{ $departamento->facultad}}</td>
			<td>{{ $departamento->estado}}</td>
			<td>
			<a class="btn btn-warning" href="{{ url('/admin/departamento/'.$departamento->cod_departamento.'/edit') }}">✎
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<a href="{{ url('admin/departamentos') }}" class="btn btn-success" >Regresar</a>

</div>
@endsection