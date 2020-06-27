@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />

<body class="fondo{{$color}}">

@section('content')

<script type="text/javascript" src="{!! asset('js/evaluar.js') !!}"></script>

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(!empty($Mensaje))
  <div class="alert alert-danger"> {{ $Mensaje }}</div>
@endif

<!--Seccion que mediante el llenado de un formulario, permite crear una evaluacion.
	Posteriormente, los datos son enviados mediante el método POST a la url "/guardarEvaluacion"-->
<form action="{{url('/guardarEvaluacion')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}

	<a class="btn btn-primary" style="border:none;color:white;padding: 15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size: 16px;margin: 4px 2px;width: 100%;cursor: pointer;" onclick="Mostrar_ocultar('ident_academic');">Identificación Académico</a>
	<br>
  	<section id="ident_academic" style="display: none">
	<div class="panel panel-primary">
  			<div class="panel-body">
  				<ul class="list-group">
    				<li class="list-group-item">Rut: <input type="text" class="form-control {{$errors->has('rutAcademico')?'is-invalid':''}}" name="rutAcademico" id="rutAcademico" value="{{ $datosAcademico->rut}}" readonly></li>

    				<li class="list-group-item">Nombre: <input type="text" class="form-control {{$errors->has('nombreAcademico')?'is-invalid':''}}" name="nombreAcademico" id="nombreAcademico" value="{{ $datosAcademico->nombre}}" readonly></li>

    				<li class="list-group-item">Apellido: <input type="text" class="form-control {{$errors->has('apellidoAcademico')?'is-invalid':''}}" name="apellidoAcademico" id="apellidoAcademico" value="{{ $datosAcademico->apellido}}" readonly></li>

    				<li class="list-group-item">Departamento: <input type="text" class="form-control {{$errors->has('dptoAcademico')?'is-invalid':''}}" name="dptoAcademico" id="dptoAcademico" value="{{ $datosAcademico->departamento}}" readonly></li>

    				<li class="list-group-item">Título Profesional: <input type="text" class="form-control {{$errors->has('titulo')?'is-invalid':''}}" name="titulo" id="titulo" value="{{ $datosAcademico->titulo}}" readonly></li>
  				</ul>
  		</div>
	</div>
	</section>

	<a class="btn btn-primary" style="border:none;color:white;padding: 15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size: 16px;margin: 4px 2px;width: 100%;cursor: pointer;" onclick="Mostrar_ocultar('calification');">Calificación Académica</a>
	<br>
	<section id="calification" style="display: none">
		<table class="table table-light table-hover" style="text-align: center;">

		<!-- Cabecera de la tabla, donde se especifica los datos que tendrá cada columna-->
			<thread class="thread-light">
				<tr>
					<th></th>
					<th>% Tiempo Asignado a Tareas Programadas</th>
					<th>E</th>
					<th>MB</th>
					<th>B</th>
					<th>R</th>
					<th>D</th>
					<th>$TxC/100</th>
				</tr>
			</thread>

			<tbody>
				<tr>
					<td style="margin-top: 10px;">1. Actividades de Docencia</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="0" max="100" class="form-control {{$errors->has('tiempoAsignado1')?'is-invalid':''}}" name="tiempoAsignado1" id="tiempoAsignado1" onchange="prom1(this.value,0);">
							{!! $errors->first('tiempoAsignado1','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.5" step="0.1" max="5.0" class="form-control {{$errors->has('1e')?'is-invalid':''}}" name="1e" id="1e" onchange="prom1(this.value,1);">
							{!! $errors->first('actividadDocencia','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.0" step="0.1" max="4.4" class="form-control {{$errors->has('1mb')?'is-invalid':''}}" name="1mb" id="1mb" onchange="prom1(this.value,2);">
							{!! $errors->first('actividadDocencia','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="3.5" step="0.1" max="3.9" class="form-control {{$errors->has('1b')?'is-invalid':''}}" name="1b" id="1b" onchange="prom1(this.value,3);">
							{!! $errors->first('actividadDocencia','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="2.7" step="0.1" max="3.4" class="form-control {{$errors->has('1r')?'is-invalid':''}}" name="1r" id="1r" onchange="prom1(this.value,4);">
							{!! $errors->first('actividadDocencia','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="1.0" step="0.1" max="2.6" class="form-control {{$errors->has('1d')?'is-invalid':''}}" name="1d" id="1d" onchange="prom1(this.value,5);">
							{!! $errors->first('actividadDocencia','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="text" class="form-control {{$errors->has('1tc')?'is-invalid':''}}" name="1tc" id="1tc" readonly="">
							{!! $errors->first('actividadDocencia','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
				</tr>

				<tr>
					<td>2. Actividades de Investigación</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="0" max="100" class="form-control {{$errors->has('tiempoAsignado2')?'is-invalid':''}}" name="tiempoAsignado2" id="tiempoAsignado2" onchange="prom2(this.value,0);">
							{!! $errors->first('tiempoAsignado2','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.5" step="0.1" max="5.0" class="form-control {{$errors->has('2e')?'is-invalid':''}}" name="2e" id="2e" onchange="prom2(this.value,1);">
							{!! $errors->first('actividadesInvestigacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.0" step="0.1" max="4.4" class="form-control {{$errors->has('2mb')?'is-invalid':''}}" name="2mb" id="2mb" onchange="prom2(this.value,2);">
							{!! $errors->first('actividadesInvestigacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="3.5" step="0.1" max="3.9" class="form-control {{$errors->has('2b')?'is-invalid':''}}" name="2b" id="2b" onchange="prom2(this.value,3);">
							{!! $errors->first('actividadesInvestigacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="2.7" step="0.1" max="3.4" class="form-control {{$errors->has('2r')?'is-invalid':''}}" name="2r" id="2r" onchange="prom2(this.value,4);">
							{!! $errors->first('actividadesInvestigacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="1.0" step="0.1" max="2.6" class="form-control {{$errors->has('2d')?'is-invalid':''}}" name="2d" id="2d" onchange="prom2(this.value,5);">
							{!! $errors->first('actividadesInvestigacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="text" class="form-control {{$errors->has('2tc')?'is-invalid':''}}" name="2tc" id="2tc" readonly="">
							{!! $errors->first('actividadesInvestigacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
				</tr>

				<tr>
					<td>3. Extensión y Vinculación</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="0" max="100" class="form-control {{$errors->has('tiempoAsignado3')?'is-invalid':''}}" name="tiempoAsignado3" id="tiempoAsignado3" onchange="prom3(this.value,0);">
							{!! $errors->first('tiempoAsignado3','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.5" step="0.1" max="5.0" class="form-control {{$errors->has('3e')?'is-invalid':''}}" name="3e" id="3e" onchange="prom3(this.value,1);">
							{!! $errors->first('extensionyVinculacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.0" step="0.1" max="4.4" class="form-control {{$errors->has('3mb')?'is-invalid':''}}" name="3mb" id="3mb" onchange="prom3(this.value,2);">
							{!! $errors->first('extensionyvinculacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="3.5" step="0.1" max="3.9" class="form-control {{$errors->has('3b')?'is-invalid':''}}" name="3b" id="3b" onchange="prom3(this.value,3);">
							{!! $errors->first('extensionyvinculacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="2.7" step="0.1" max="3.4" class="form-control {{$errors->has('3r')?'is-invalid':''}}" name="3r" id="3r" onchange="prom3(this.value,4);">
							{!! $errors->first('extensionyvinculacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="1.0" step="0.1" max="2.6" class="form-control {{$errors->has('3d')?'is-invalid':''}}" name="3d" id="3d" onchange="prom3(this.value,5);">
							{!! $errors->first('extensionyVinculacino','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="text" class="form-control {{$errors->has('3tc')?'is-invalid':''}}" name="3tc" id="3tc" readonly="">
							{!! $errors->first('extensionyVinculacino','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
				</tr>

				<tr>
					<td>4. Administración Académica</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="0" max="100" class="form-control {{$errors->has('tiempoAsignado4')?'is-invalid':''}}" name="tiempoAsignado4" id="tiempoAsignado4" onchange="prom4(this.value,0);">
							{!! $errors->first('tiempoAsignado4','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.5" step="0.1" max="5.0" class="form-control {{$errors->has('4e')?'is-invalid':''}}" name="4e" id="4e" onchange="prom4(this.value,1);">
							{!! $errors->first('administracionAcademica','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.0" step="0.1" max="4.4" class="form-control {{$errors->has('4mb')?'is-invalid':''}}" name="4mb" id="4mb" onchange="prom4(this.value,2);">
							{!! $errors->first('administracionAcademica','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="3.5" step="0.1" max="3.9" class="form-control {{$errors->has('4b')?'is-invalid':''}}" name="4b" id="4b" onchange="prom4(this.value,3);">
							{!! $errors->first('administracionAcademica','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="2.7" step="0.1" max="3.4" class="form-control {{$errors->has('4r')?'is-invalid':''}}" name="4r" id="4r" onchange="prom4(this.value,4);">
							{!! $errors->first('administracionAcademica','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="1.0" step="0.1" max="2.6" class="form-control {{$errors->has('4d')?'is-invalid':''}}" name="4d" id="4d" onchange="prom4(this.value,5);">
							{!! $errors->first('administracionAcademica','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="text" class="form-control {{$errors->has('4tc')?'is-invalid':''}}" name="4tc" id="4tc" readonly="">
							{!! $errors->first('administracionAcademica','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
				</tr>

				<tr>
					<td>5. Otras Actividades Realizadas</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="0" max="100" class="form-control {{$errors->has('tiempoAsignado5')?'is-invalid':''}}" name="tiempoAsignado5" id="tiempoAsignado5"  onchange="prom5(this.value,0);">
							{!! $errors->first('tiempoAsignado5','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.5" step="0.1" max="5.0" class="form-control {{$errors->has('5e')?'is-invalid':''}}" name="5e" id="5e"  onchange="prom5(this.value,1);">
							{!! $errors->first('otrasActividades','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.0" step="0.1" max="4.4" class="form-control {{$errors->has('5mb')?'is-invalid':''}}" name="5mb" id="5mb" onchange="prom5(this.value,2);">
							{!! $errors->first('otrasActividades','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="3.5" step="0.1" max="3.9" class="form-control {{$errors->has('5b')?'is-invalid':''}}" name="5b" id="5b" onchange="prom5(this.value,3);">
							{!! $errors->first('otrasActividades','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="2.7" step="0.1" max="3.4" class="form-control {{$errors->has('5r')?'is-invalid':''}}" name="5r" id="5r" onchange="prom5(this.value,4);">
							{!! $errors->first('otrasActividades','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="1.0" step="0.1" max="2.6" class="form-control {{$errors->has('5d')?'is-invalid':''}}" name="5d" id="5d" onchange="prom5(this.value,5);">
							{!! $errors->first('otrasActividades','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="text" class="form-control {{$errors->has('5tc')?'is-invalid':''}}" name="5tc" id="5tc" readonly="">
							{!! $errors->first('otrasActividades','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					
				</tr>
				<tr>
	
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><b style="margin-top: 100px;">Promedio</b></td>
					<td><input type="text" class="form-control" name="nota" id="nota" readonly></td>				
					
				</tr>
			</tbody>
		</table>

	<div class="panel panel-primary">
  		<div class="panel-heading">Nota</div>
  		<div class="panel-body">
  		<ul class="list-group">
    		<li class="list-group-item"><h5><center>Nota: . - </center></h5>
    			<br>ESCALA: Excelente = 4.5 a 5  Muy Bueno = 4.0 a 4.4  Bueno = 3.5 a 3.9
    			Regular = 3.4 a 2.7  Deficiente = menos de 2.7
    		</li>
  		</ul>
  		</div>
	</div>
	</section>


	<a class="btn btn-primary" style="border:none;color:white;padding: 15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size: 16px;margin: 4px 2px;width: 100%;cursor: pointer;" onclick="Mostrar_ocultar('arg_calif');">Argumentos de la Calificación Final</a>
	<br>
	<section id="arg_calif" style="display: none">
	<div class="panel-body">
  		<ul class="list-group">
    		<!-- <li class="list-group-item"><input type="text" class="form-control {{$errors->has('comentarios')?'is-invalid':''}}" name="comentarios" id="comentarios" placeholder="Opcional" ></li> -->
			<li class="list-group-item"><textarea id="comentarios" name="comentarios" rows="4" cols="50" class="form-control {{$errors->has('comentarios')?'is-invalid':''}}" placeholder="Opcional" maxlength="200" onkeyup="contadorComentario(this);"></textarea>
				<p id="contadorComentario"><span style="color: grey;">Máximo 200 caracteres</span><span style="float: right; color: grey">0/200</span></p>
			</li>
		</ul>
  	</div>
  	</section>
  	<br>

	<div class="panel-body">
  		<ul class="list-group">
    		<li class="list-group-item">Miembro Uno: <input type="text" class="form-control {{$errors->has('miembro1')?'is-invalid':''}}" name="miembro1" id="miembro1" value="{{ $datosComision->miembro1}}" readonly></li>

    		<li class="list-group-item">Decano: <input type="text" class="form-control {{$errors->has('decano')?'is-invalid':''}}" name="decano" id="decano" value="{{ $datosComision->decano}}" readonly></li>

    		<li class="list-group-item">Miembro Dos: <input type="text" class="form-control {{$errors->has('miembro2')?'is-invalid':''}}" name="miembro2" id="miembro2" value="{{ $datosComision->miembro2}}" readonly></li>

    		<input type="text" class="form-control {{$errors->has('año')?'is-invalid':''}}" name="año" id="año" value="{{ $periodo->año}}" hidden></li>
    		<input type="text" class="form-control {{$errors->has('id_comision')?'is-invalid':''}}" name="id_comision" id="id_comision" value="{{ $datosComision->id_comision}}" hidden></li>
  		</ul>
  	</div>

	<br>
	<input type="submit" class="btn btn-success" value="Enviar Evaluación"><br><br>
	<a class="btn btn-primary" href="{{ url('evaluacion') }}">Regresar ←</a>

</form>
</div>
@endsection
</body>