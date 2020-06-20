@extends('layouts.app')

@section('content')

<div class="container">

<!--Seccion que mediante el llenado de un formulario, permite editar un usuario.
	Posteriormente, los datos son enviados mediante el método POST a la url "/admin/usuario/{email}/update"-->
<form action="{{ url('/admin/usuario/'.$user->email.'/update')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

<h2>Editar Usuario</h2>

	<div class="form-group">
		<label for="nombre" class="control-label">{{'Nombre'}}</label>
		<input type="text" class="form-control" name="nombre" id="nombre" value="{{ $user->nombre}}">
	</div>

	<div class="form-group">
		<label for="apellidos" class="control-label">{{'Apellidos'}}</label>
		<input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ $user->apellidos}}">
	</div>

	<div class="form-group">
		<label for="permiso" class="control-label">{{'Permiso'}}</label><br>
		<select name="permiso" id="permiso" size="1" style="
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
			<option selected value="{{$user->permiso}}">{{$user->permiso}}</option>
			@if($user->permiso=="Secretario")
				<option value="Admin">Admin</option>
			@elseif($user->permiso=="Admin")
				<option value="Secretario">Secretario</option>
			@endif
		</select>
		{!! $errors->first('permiso','<div class="invalid-feedback">:message</div>') !!}
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
			<option selected value="{{$user->facultad}}">{{$user->facultad}}</option>
			@foreach($facultades as $facultad)
				@if($facultad->nombre != $user->facultad)
					<option value="{{$facultad->nombre}}">{{$facultad->nombre}}</option>
				@endif
			@endforeach
		</select>
		{!! $errors->first('facultad','<div class="invalid-feedback">:message</div>') !!}
	</div>

	@if($rut_sesion_actual!=$user->rut)

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
			<option selected value="{{$user->estado}}">{{$user->estado}}</option>
			@if($user->estado=="ACTIVO")
				<option value="INACTIVO">INACTIVO</option>
			@elseif($user->estado=="INACTIVO")
				<option value="ACTIVO">ACTIVO</option>
			@endif
		</select>
		{!! $errors->first('Estado','<div class="invalid-feedback">:message</div>') !!}
	</div>
	@endif

	<input type="submit" class="btn btn-success" value="Modificar ✍">

	<a class="btn btn-primary" href="{{ url('admin/usuarios') }}">Regresar ←</a>

</form>
</div>

@endsection