@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />

<body class="fondo{{$color}}">

@section('content')

<div class="container">

<!-- Sección que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif


<br/>
<br/>

<!-- Seccion que permite que hará que todo lo que se muestre a continuacion, sea dentro de una tabla-->
<table class="table table-light table-hover">

	<!-- Cabecera de la tabla, donde se define el nombre que tendrá cada columna-->
	<thread class="thread-light">
		<tr>
			<th>Facultad</th>
			<th>Año</th>
			<th>Rut</th>
			<th>Decano</th>
			<th>Miembro Uno</th>
			<th>Miembro Dos</th>
			<th>Estado</th>
			<th>Editar</th>
		</tr>
	</thread>

	<tbody>
		<!-- Mediante un ciclo For, se mostrará dentro de la tabla el contenido de cada comisión, junto con un botón que permite
			 editar la comisión seleccionada-->
		@foreach($datos as $comision)
		<tr align="center">
			<td>{{ $comision->facultad}}</td>
			<td>{{ $comision->año}}</td>
			<td>{{ $comision->rut_academico}}</td>
			<td>{{ $comision->decano}}</td>
			<td>{{ $comision->miembro1}}</td>
			<td>{{ $comision->miembro2}}</td>
			<td>{{ $comision->estado}}</td>
			<td>
			<a class="btn btn-warning" href="{{ url('comision/'.$comision->id_comision.'/edit') }}">✎
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<a href="{{ url('comisiones') }}" class="btn btn-success" >⏎ Regresar</a>

</div>
@endsection
</body>