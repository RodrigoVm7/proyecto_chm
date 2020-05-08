@extends('layouts.app')

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes de error en pantalla-->
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error}}</li>
		@endforeach
	</ul>
</div>
@endif

<!--Seccion que mediante el llenado de un formulario, permite crear un nuevo académico.
	Posteriormente, los datos son enviados mediante el método POST a la url "/guardarAcademico"-->
<form action="{{url('/guardarAcademico')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="rut" class="control-label">{{'Rut'}}</label>
		<input type="text" class="form-control {{$errors->has('rut')?'is-invalid':''}}" name="rut" id="rut" placeholder="Rut">
		{!! $errors->first('rut','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="nombre" class="control-label">{{'Nombre'}}</label>
		<input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" placeholder="Nombre(s)">
		{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="apellido" class="control-label">{{'Apellido'}}</label>
		<input type="text" class="form-control {{$errors->has('apellido')?'is-invalid':''}}" name="apellido" id="apellido" placeholder="Apellido(s)">
		{!! $errors->first('apellido','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="titulo" class="control-label">{{'Titulo Profesional'}}</label>
		<input type="text" class="form-control {{$errors->has('titulo')?'is-invalid':''}}" name="titulo" id="titulo" placeholder="Título Profesional">
		{!! $errors->first('titulo','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="grado_academico" class="control-label">{{'Grado Académico'}}</label>
		<input type="text" class="form-control {{$errors->has('grado_academico')?'is-invalid':''}}" name="grado_academico" id="grado_academico" placeholder="Grado Académico">
		{!! $errors->first('grado_academico','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="departamento" class="control-label">{{'Departamento'}}</label><br>
		<select name="departamento" size="1" style="
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
			<option value="" disabled selected>Seleccionar Departamento</option>	
				@foreach($departamentos as $dato)
					<option value="{{$dato->nombre}}">{{$dato->nombre}}</option>
				@endforeach
		</select>
		{!! $errors->first('departamento','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<input type="text" class="form-control {{$errors->has('facultad')?'is-invalid':''}}" name="facultad" id="facultad" value="{{ $facultad}}" hidden=></li>

	<div class="form-group">
		<label for="categoria" class="control-label">{{'Categoria'}}</label><br>
		<select name="categoria" size="1" style="
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
			<option value="" disabled selected>----</option>	
				<option value="Instructor">Instructor</option>
				<option value="Auxiliar">Auxiliar</option>
				<option value="Adjunto">Adjunto</option>
				<option value="Titular">Titular</option>
		</select>
		{!! $errors->first('categoria','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="horas_contrato" class="control-label">{{'Horas'}}</label>
		<input type="number" min="0" max="44" step="1" class="form-control {{$errors->has('horas_contrato')?'is-invalid':''}}" name="horas_contrato" id="horas_contrato" placeholder="Máximo 44">
		{!! $errors->first('horas_contrato','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="tipo_planta" class="control-label">{{'Tipo Planta'}}</label>
		<input type="text" class="form-control {{$errors->has('tipo_planta')?'is-invalid':''}}" name="tipo_planta" id="tipo_planta" placeholder="El tipo de Planta">
		{!! $errors->first('tipo_planta','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<input type="submit" class="btn btn-success" value="Agregar ✚">
	<a class="btn btn-primary" href="{{ url('academicos') }}">Regresar ←</a>

</form>
</div>
@endsection