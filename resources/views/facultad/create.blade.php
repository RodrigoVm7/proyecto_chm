@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />

<body class="fondo{{$color}}">

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error}}</li>
		@endforeach
	</ul>
</div>
@endif

<!--Seccion que mediante el llenado de un formulario, permite crear una facultad.
	Posteriormente, los datos son enviados mediante el método POST a la url "/admin/guardarFacultad"-->
<form action="{{url('/admin/guardarFacultad')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="nombre" class="control-label">{{'Nombre'}}</label>
		<input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" placeholder="Nombre de la Facultad">
		{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="decano" class="control-label">{{'Decano'}}</label>
		<input type="text" class="form-control {{$errors->has('decano')?'is-invalid':''}}" name="decano" id="decano" placeholder="Decano">
		{!! $errors->first('decano','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<input type="submit" class="btn btn-success" value="Agregar ✚">
	<a class="btn btn-primary" href="{{ url('admin/facultades') }}">Regresar ←</a>

</form>
</div>
@endsection
</body>