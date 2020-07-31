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
		<!-- Mediante un ciclo For, se mostrará dentro de la tabla el contenido de la facultad buscada, junto con un boton que permite
			editar la facultad seleccionada-->
		@foreach($datos as $facultad)
		<tr align="center">
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

<a href="{{ url('admin/facultades') }}" class="btn btn-success" >⏎ Regresar</a>

</div>
@endsection
</body>