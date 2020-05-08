@extends('layouts.app')

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

<!--Seccion que mediante el llenado de un formulario, permite crear una usuario.
	Posteriormente, los datos son enviados mediante el método POST a la url "/admin/guardarUsuario"-->
<form action="{{url('/admin/guardarUsuario')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="nombre" class="control-label">{{'Nombre'}}</label>
		<input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" placeholder="nombre">
		{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="apellidos" class="control-label">{{'Apellidos'}}</label>
		<input type="text" class="form-control {{$errors->has('apellidos')?'is-invalid':''}}" name="apellidos" id="apellidos" placeholder="Apellidos">
		{!! $errors->first('apellidos','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="rut" class="control-label">{{'Rut'}}</label>
		<input type="text" class="form-control {{$errors->has('rut')?'is-invalid':''}}" name="rut" id="rut" placeholder="Rut">
		{!! $errors->first('rut','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="permiso" class="control-label">{{'Permiso'}}</label><br>
		<select name="permiso" size="1" style="
			    display: block;
				width: 100%;
    			height: calc(2.19rem + 2px);
				padding: .375rem .75rem;
				font-size: .9rem;
				line-height: 1.6;
				color: #495057;
				background-color: #fff;
				background-clip: padding-box;
				border: 1px solid #ced4da;
				border-radius: .25rem;">
			<option selected value="Secretario">Secretario</option>	
				<option value="Admin">Admin</option>
		</select>
		{!! $errors->first('Permiso','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="email" class="control-label">{{'Email'}}</label>
		<input type="text" class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email" id="email" placeholder="Email">
		{!! $errors->first('email','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="facultad" class="control-label">{{'Facultad'}}</label><br>
		<select name="facultad" size="1" style="
			    display: block;
				width: 100%;
    			height: calc(2.19rem + 2px);
				padding: .375rem .75rem;
				font-size: .9rem;
				line-height: 1.6;
				color: #495057;
				background-color: #fff;
				background-clip: padding-box;
				border: 1px solid #ced4da;
				border-radius: .25rem;">
			<option selected></option>
			@foreach($facultades as $dato)
				<option value="{{$dato->nombre}}">{{$dato->nombre}}</option>
			@endforeach
		</select>
		{!! $errors->first('facultad','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<input type="submit" class="btn btn-success" value="Agregar ✚">
	<a class="btn btn-primary" href="{{ url('admin/usuarios') }}">Regresar ←</a>

</form>
</div>
@endsection