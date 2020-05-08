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
			<th>Apellidos</th>
			<th>Permiso</th>
			<th>Facultad</th>
			<th>Email</th>
			<th>Estado</th>
			<th>Editar</th>
		</tr>
	</thread>
	<tbody>
		<!-- Mediante un ciclo For, se mostrará dentro de la tabla el contenido de cada usuario, junto con un boton que permite editar
			 su informacion-->
		@foreach($datos as $user)
		<tr>
			<td>{{ $user->nombre}}</td>
			<td>{{ $user->apellidos}}</td>
			<td>{{ $user->permiso}}</td>
			<td>{{ $user->facultad}}</td>
			<td>{{ $user->email}}</td>
			<td>{{ $user->estado}}</td>
			<td>
			<a class="btn btn-warning" href="{{ url('/admin/usuario/'.$user->email.'/edit') }}">✎
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<a href="{{ url('admin/usuarios') }}" class="btn btn-success" >Regresar</a>

</div>
@endsection