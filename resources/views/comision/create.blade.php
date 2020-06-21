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

@if(Session::has('Mensaje'))
<div class="alert alert-danger" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<!--Sección que mediante el llenado de un formulario, permite crear una comisión.
	Posteriormente, los datos son enviados mediante el método POST a la url "/guardarComision"-->
<form action="{{url('/guardarComision')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="año" class="control-label">{{'Año'}}</label>
		<input type="number" class="form-control {{$errors->has('año')?'is-invalid':''}}" name="año" id="año" placeholder="Año en que la comisión evalúa" min="2019" max="2022" step="1">
		{!! $errors->first('año','<div class="invalid-feedback">:message</div>') !!}
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
			@foreach($facultades as $facultad)
				<option value="{{$facultad->nombre}}">{{$facultad->nombre}}</option>
			@endforeach
		</select>
		{!! $errors->first('facultad','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="rut_academico" class="control-label">{{'Rut'}}</label>
		<input type="text" class="form-control {{$errors->has('rut_academico')?'is-invalid':''}}" name="rut_academico" id="rut_academico" placeholder="Rut">
		{!! $errors->first('rut_academico','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="decano" class="control-label">{{'Decano'}}</label>
		<input type="text" class="form-control {{$errors->has('decano')?'is-invalid':''}}" name="decano" id="decano" placeholder="Decano">
		{!! $errors->first('decano','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="miembro1" class="control-label">{{'Miembro Uno'}}</label>
		<input type="text" class="form-control {{$errors->has('miembro1')?'is-invalid':''}}" name="miembro1" id="miembro1" placeholder="Miembro 1">
		{!! $errors->first('miembro1','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="miembro2" class="control-label">{{'Miembro Dos'}}</label>
		<input type="text" class="form-control {{$errors->has('miembro2')?'is-invalid':''}}" name="miembro2" id="miembro2" placeholder="Miembro 2">
		{!! $errors->first('miembro2','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="fecha_pie" class="control-label">{{'Fecha Pie'}}</label>
		<input type="date" class="form-control" name="fecha_pie" id="fecha_pie" min="01-01-2019" max="31-12-2022">
		{!! $errors->first('fecha_pie','<div class="invalid-feedback">:message</div>') !!}
	</div>


	<input type="submit" class="btn btn-success" value="Agregar ✚">
	<a class="btn btn-primary" href="{{ url('comisiones') }}">Regresar ←</a>

</form>
</div>
@endsection
</body>