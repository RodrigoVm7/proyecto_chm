@extends('layouts.app')

@section('content')

<div class="container">

<!--Seccion que mediante el llenado de un formulario, permite editar una facultad.
	Posteriormente, los datos son enviados mediante el método POST a la url "/admin/facultad/{cod_facultad}/update"-->
<form action="{{ url('/admin/facultad/'.$facultad->cod_facultad.'/update')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

<h2>Editar Facultad</h2>

	<div class="form-group">
		<label for="nombre" class="control-label">{{'Nombre'}}</label>
		<input type="text" class="form-control" name="nombre" id="nombre" value="{{ $facultad->nombre}}">
	</div>

	<div class="form-group">
		<label for="decano" class="control-label">{{'Decano'}}</label>
		<input type="text" class="form-control" name="decano" id="decano" value="{{ $facultad->decano}}">
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
			<option selected value="{{$facultad->estado}}">{{$facultad->estado}}</option>
			@if($facultad->estado=="ACTIVO")
				<option value="INACTIVO">INACTIVO</option>
			@elseif($facultad->estado=="INACTIVO")
				<option value="ACTIVO">ACTIVO</option>
			@endif
		</select>
		{!! $errors->first('Estado','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<input type="submit" class="btn btn-success" value="Modificar ✍">

	<a class="btn btn-primary" href="{{ url('admin/facultades') }}">Regresar ←</a>

</form>
</div>

@endsection