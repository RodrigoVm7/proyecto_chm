@extends('layouts.app')

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<h2>Usuarios</h2><br>

<!-- Formulario que permite buscar un usuario en particular a partir de su rut-->
<form action="{{url('/admin/buscarUsuario')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control {{$errors->has('rut')?'is-invalid':''}}" name="rut" id="rut" placeholder="Buscar">
		{!! $errors->first('rut','<div class="invalid-feedback">:message</div>') !!}
	</div>
</form>

<!-- Conjunto de botones que permiten añadir un nuevo ussuario, refrescar la pagina, regresar a la anterior pagina de navegacion  habilitar
	 el reenvio de contraseñas-->
<a href="{{ url('admin/añadirUsuario') }}" class="btn btn-success" >✚ Nuevo Usuario</a>
<a href="{{ url('admin/usuarios') }}" class="btn btn-success" >↻ Refrescar</a>
<a href="{{ url('index') }}" class="btn btn-success" >⏎ Regresar</a>
<a href="{{ url('admin/reenviarContraseña') }}" class="btn btn-secondary" >↻ Reenvio de Contraseña</a>
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
		<!-- Mediante un ciclo For, se mostrará dentro de la tabla el contenido de cada usuario, junto con un boton que permite
			 editar su información-->
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

<div class="text-center">
	{{$datos->links()}}
</div>

</div>
@endsection