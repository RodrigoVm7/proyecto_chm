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

<h2>Facultades</h2><br>

<!-- Formulario que permite buscar una facultad a partir de su codigo-->
<form action="{{url('/admin/buscarFacultad')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control {{$errors->has('cod_facultad')?'is-invalid':''}}" name="cod_facultad" id="cod_facultad" placeholder="Buscar Facultad">
		{!! $errors->first('cod_facultad','<div class="invalid-feedback">:message</div>') !!}
	</div>
</form>

<!-- Conjunto de botones que permiten agregar nueva facultad, refrescar la pagina y regresar en la navegacion-->
<a href="{{ url('admin/añadirFacultad') }}" class="btn btn-success" >✚ Nueva Facultad</a>
<a href="{{ url('admin/facultades') }}" class="btn btn-success" >↻ Refrescar</a>
<a href="{{ url('index') }}" class="btn btn-success" >⏎ Regresar</a>
<br><br>

<!-- Seccion que permite que hará que todo lo que se muestre a continuacion, sea dentro de una tabla-->
<table class="table table-light table-hover">

	<!-- Cabecera de la tabla, donde se especifica los datos que tendrá cada columna-->
	<thread class="thread-light">
		<tr>
			<th>Nombre</th>
			<th>Decano</th>
			<th>Estado</th>
			<th>Editar</th>
		</tr>
	</thread>

	<tbody>
		<!-- Mediante un ciclo For, se mostrará dentro de la tabla el contenido de cada facultad, junto con un boton que permite editar
			 la facultad seleccionada-->
		@foreach($datos as $facultad)
		<tr>
			<td>{{ $facultad->nombre}}</td>
			<td>{{ $facultad->decano}}</td>
			<td>{{ $facultad->estado}}</td>
			<td>
			<a class="btn btn-warning" href="{{ url('/admin/facultad/'.$facultad->cod_facultad.'/edit') }}">✎
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
</body>