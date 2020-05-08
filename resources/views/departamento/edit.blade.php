@extends('layouts.app')

@section('content')

<div class="container">

<!--Seccion que mediante el llenado de un formulario, permite editar un departamento.
	Posteriormente, los datos son enviados mediante el método POST a la url "/admin/departament/{cod_departamento}/update"-->
<form action="{{ url('/admin/departamento/'.$departamento->cod_departamento.'/update')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

<h2>Editar Departamento</h2>

	<div class="form-group">
		<label for="nombre" class="control-label">{{'Nombre'}}</label>
		<input type="text" class="form-control" name="nombre" id="nombre" value="{{ $departamento->nombre}}">
	</div>

	<div class="form-group">
		<label for="facultad" class="control-label">{{'Facultad'}}</label><br>
		<select name="facultad" id="facultad" size="1" style="
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
			<option selected value="{{$departamento->facultad}}">{{$departamento->facultad}}</option>
			@foreach($facultades as $facultad)
				@if($facultad->nombre != $departamento->facultad)
					<option value="{{$facultad->nombre}}">{{$facultad->nombre}}</option>
				@endif
			@endforeach
		</select>
		{!! $errors->first('facultad','<div class="invalid-feedback">:message</div>') !!}
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
			<option selected value="{{$departamento->estado}}">{{$departamento->estado}}</option>
			@if($departamento->estado=="ACTIVO")
				<option value="INACTIVO">INACTIVO</option>
			@elseif($departamento->estado=="INACTIVO")
				<option value="ACTIVO">ACTIVO</option>
			@endif
		</select>
		{!! $errors->first('estado','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<input type="submit" class="btn btn-success" value="Modificar ✍">

	<a class="btn btn-primary" href="{{ url('admin/departamentos') }}">Regresar ←</a>

</form>
</div>

@endsection