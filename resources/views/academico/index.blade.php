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

<h2>Académicos</h2><br>

<!-- Sección que permite buscar un académico en particular en el sistema a partir del Rut-->
<form action="{{url('buscarAcademico')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control {{$errors->has('rut')?'is-invalid':''}}" name="rut" id="rut" placeholder="Buscar Rut">❓
		{!! $errors->first('rut','<div class="invalid-feedback">:message</div>') !!}
	</div>
</form>

<!-- Conjunto de botones que permite realizar las acciones de agregar nuevo académico, refrescar la págica y regresar a la pantalla anterior de navegación-->
<a href="{{ url('añadirAcademico') }}" class="btn btn-success" >✚ Nuevo Académico</a>
<a href="{{ url('academicos') }}" class="btn btn-success" >↻ Refrescar</a>
<a href="{{ url('index') }}" class="btn btn-success" >⏎ Regresar</a>
<br/>
<br/>

<!-- Seccion que permite que hará que todo lo que se muestre a continuacion, sea dentro de una tabla-->
<table class="table table-light table-hover">

	<!-- Cabecera de la tabla, donde se define el nombre que tendrá cada columna-->
	<thread class="thread-light">
		<tr>
			<th>Rut</th>
			<th>Nombre(s)</th>
			<th>Apellido(s)</th>
			<th>Departamento</th>
			<th>Título Profesional</th>
			<th>Estado</th>
			<th>Editar</th>
		</tr>
	</thread>

	<tbody>
		<!-- Mediante un ciclo For, se mostrará dentro de la tabla el contenido de cada académico existente, junto con un botón que permitirá
			 actualizar los datos del académico seleccionado-->
		@foreach($datos as $academico)
		<tr>
			<td>{{ $academico->rut}}</td>
			<td>{{ $academico->nombre}}</td>
			<td>{{ $academico->apellido}}</td>
			<td>{{ $academico->departamento}}</td>
			<td>{{ $academico->titulo}}</td>
			<td>{{ $academico->estado}}</td>
			<td>
			<a class="btn btn-warning" href="{{ url('/academico/'.$academico->rut.'/edit') }}">✎
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