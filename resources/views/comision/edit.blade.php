@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />

<body class="fondo{{$color}}">

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes por pantalla -->
@if(Session::has('Mensaje'))
<div class="alert alert-danger" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<!--Sección que mediante el llenado de un formulario, permite editar una comision.
	Posteriormente, los datos son enviados mediante el método POST a la url "/comision/{id_comision}/update"-->
<form action="{{ url('/comision/'.$comision->id_comision.'/update')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

<h2>Editar Comisión</h2>

	<div class="form-group">
		<label for="año" class="control-label">{{'Año'}}</label>
		<input type="text" class="form-control" name="año" id="año" value="{{ $comision->año}}" readonly="readonly">
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
			<option selected value="{{$comision->facultad}}">{{$comision->facultad}}</option>
			@foreach($facultades as $facultad)
				@if($facultad->nombre!=$comision->facultad)
					<option value="{{$facultad->nombre}}">{{$facultad->nombre}}</option>
				@endif
			@endforeach
		</select>
		{!! $errors->first('facultad','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="rut_academico" class="control-label">{{'Rut'}}</label>
		<input type="text" class="form-control" name="rut_academico" id="rut_academico" value="{{ $comision->rut_academico}}">
	</div>

	<div class="form-group">
		<label for="decano" class="control-label">{{'Decano'}}</label>
		<input type="text" class="form-control" name="decano" id="decano" value="{{ $comision->decano}}">
	</div>

	<div class="form-group">
		<label for="miembro1" class="control-label">{{'Miembro Uno'}}</label>
		<input type="text" class="form-control" name="miembro1" id="miembro1" value="{{ $comision->miembro1}}">
	</div>

	<div class="form-group">
		<label for="miembro2" class="control-label">{{'Miembro Dos'}}</label>
		<input type="text" class="form-control" name="miembro2" id="miembro2" value="{{ $comision->miembro2}}">
	</div>

	<div class="form-group">
		<label for="fecha_pie" class="control-label">{{'Fecha Pie'}}</label>
		<input type="date" class="form-control" name="fecha_pie" id="fecha_pie" value="{{ $comision->fecha_pie}}" min="01-01-2019" max="31-12-2022">
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
			<option selected value="{{$comision->estado}}">{{$comision->estado}}</option>
			@if($comision->estado=="ACTIVO")
				<option value="INACTIVO">INACTIVO</option>
			@elseif($comision->estado=="INACTIVO")
				<option value="ACTIVO">ACTIVO</option>
			@endif
		</select>
		{!! $errors->first('estado','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<input type="submit" class="btn btn-success" value="Modificar ✍">

	<a class="btn btn-primary" href="{{ url('comisiones') }}">Regresar ←</a>

</form>
</div>
@endsection
</body>