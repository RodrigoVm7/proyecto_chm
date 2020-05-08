@extends('layouts.app')

@section('content')

<div class="container">

<!--Seccion que mediante el llenado de un formulario, permite editar una académico.
	Posteriormente, los datos son enviados mediante el método POST a la url "/académico/{rut}/update"-->
<form action="{{ url('/academico/'.$academico->rut.'/update')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

<h2>Editar Académico</h2>

	<div class="form-group">
		<label for="rut" class="control-label">{{'Rut'}}</label>
		<input type="text" class="form-control" name="rut" id="rut" value="{{ $academico->rut}}" readonly="readonly">
	</div>

	<div class="form-group">
		<label for="nombre" class="control-label">{{'Nombre'}}</label>
		<input type="text" class="form-control" name="nombre" id="nombre" value="{{ $academico->nombre}}">
	</div>

	<div class="form-group">
		<label for="apellido" class="control-label">{{'Apellido'}}</label>
		<input type="text" class="form-control" name="apellido" id="apellido" value="{{ $academico->apellido}}">
	</div>

	<div class="form-group">
		<label for="titulo" class="control-label">{{'Titulo Profesional'}}</label>
		<input type="text" class="form-control" name="titulo" id="titulo" value="{{ $academico->titulo}}">
	</div>

	<div class="form-group">
		<label for="grado_academico" class="control-label">{{'Grado Academico'}}</label>
		<input type="text" class="form-control" name="grado_academico" id="grado_academico" value="{{ $academico->grado_academico}}">
	</div>

	<div class="form-group">
		<label for="departamento" class="control-label">{{'Departamento'}}</label><br>
		<select name="departamento" id="departamento" size="1" style="
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
			<option selected value="{{$academico->departamento}}">{{$academico->departamento}}</option>
			@foreach($departamentos as $departamento)
				@if($departamento->nombre != $academico->departamento)
					<option value="{{$departamento->nombre}}">{{$departamento->nombre}}</option>
				@endif
			@endforeach
		</select>
		{!! $errors->first('departamento','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<input type="text" class="form-control {{$errors->has('facultad')?'is-invalid':''}}" name="facultad" id="facultad" value="{{ $facultad}}" hidden=></li>

	<div class="form-group">
		<label for="categoria" class="control-label">{{'Categoria'}}</label><br>
		<select name="categoria" id="categoria" size="1" style="
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
			<option selected value="{{$academico->categoria}}">{{$academico->categoria}}</option>
			@if($academico->categoria != "Instructor")
				<option value="Instructor">Instructor</option>
			@endif
			@if($academico->categoria != "Auxiliar")
				<option value="Auxiliar">Auxiliar</option>
			@endif
			@if($academico->categoria != "Adjunto")
				<option value="Adjunto">Adjunto</option>
			@endif
			@if($academico->categoria != "Titular")
				<option value="Titular">Titular</option>
			@endif
		</select>
		{!! $errors->first('categoria','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="horas_contrato" class="control-label">{{'Horas'}}</label>
		<input type="text" class="form-control" name="horas_contrato" id="horas_contrato" value="{{ $academico->horas_contrato}}">
	</div>

	<div class="form-group">
		<label for="tipo_planta" class="control-label">{{'Tipo Planta'}}</label>
		<input type="text" class="form-control" name="tipo_planta" id="tipo_planta" value="{{ $academico->tipo_planta}}">
	</div>

	<div class="form-group">
		<label for="estado" class="control-label">{{'Estado'}}</label><br>
		<select name="estado" id="estado" size="1" style="
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
			<option selected value="{{$academico->estado}}">{{$academico->estado}}</option>
			@if($academico->estado=="ACTIVO")
				<option value="INACTIVO">INACTIVO</option>
			@elseif($academico->estado=="INACTIVO")
				<option value="ACTIVO">ACTIVO</option>
			@endif
		</select>
		{!! $errors->first('Estado','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<input type="submit" class="btn btn-success" value="Modificar ✍">

	<a class="btn btn-primary" href="{{ url('academicos') }}">Regresar ←</a>

</form>
</div>

@endsection