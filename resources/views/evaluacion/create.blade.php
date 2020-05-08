@extends('layouts.app')

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(!empty($Mensaje))
  <div class="alert alert-danger"> {{ $Mensaje }}</div>
@endif

<!--Seccion que mediante el llenado de un formulario, permite crear una evaluacion.
	Posteriormente, los datos son enviados mediante el método POST a la url "/guardarEvaluacion"-->
<form action="{{url('/guardarEvaluacion')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}

	<div class="panel panel-primary">
  		<div class="panel-heading"><b>Identificación Académico</b></div>
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

	<br><br>
	<b>Calificación Académica</b>
		<table class="table table-light table-hover">

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
					<td>1. Actividades de Docencia</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="0" max="100" class="form-control {{$errors->has('tiempoAsignado1')?'is-invalid':''}}" name="tiempoAsignado1" id="tiempoAsignado1">
							{!! $errors->first('tiempoAsignado1','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.5" step="0.1" max="5.0" class="form-control {{$errors->has('1e')?'is-invalid':''}}" name="1e" id="1e">
							{!! $errors->first('actividadDocencia','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.0" step="0.1" max="4.4" class="form-control {{$errors->has('1mb')?'is-invalid':''}}" name="1mb" id="1mb">
							{!! $errors->first('actividadDocencia','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="3.5" step="0.1" max="3.9" class="form-control {{$errors->has('1b')?'is-invalid':''}}" name="1b" id="1b">
							{!! $errors->first('actividadDocencia','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="2.7" step="0.1" max="3.4" class="form-control {{$errors->has('1r')?'is-invalid':''}}" name="1r" id="1r">
							{!! $errors->first('actividadDocencia','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="1.0" step="0.1" max="2.6" class="form-control {{$errors->has('1d')?'is-invalid':''}}" name="1d" id="1d">
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
							<input type="number" min="0" max="100" class="form-control {{$errors->has('tiempoAsignado2')?'is-invalid':''}}" name="tiempoAsignado2" id="tiempoAsignado2">
							{!! $errors->first('tiempoAsignado2','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.5" step="0.1" max="5.0" class="form-control {{$errors->has('2e')?'is-invalid':''}}" name="2e" id="2e">
							{!! $errors->first('actividadesInvestigacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.0" step="0.1" max="4.4" class="form-control {{$errors->has('2mb')?'is-invalid':''}}" name="2mb" id="2mb">
							{!! $errors->first('actividadesInvestigacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="3.5" step="0.1" max="3.9" class="form-control {{$errors->has('2b')?'is-invalid':''}}" name="2b" id="2b">
							{!! $errors->first('actividadesInvestigacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="2.7" step="0.1" max="3.4" class="form-control {{$errors->has('2r')?'is-invalid':''}}" name="2r" id="2r">
							{!! $errors->first('actividadesInvestigacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="1.0" step="0.1" max="2.6" class="form-control {{$errors->has('2d')?'is-invalid':''}}" name="2d" id="2d">
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
							<input type="number" min="0" max="100" class="form-control {{$errors->has('tiempoAsignado3')?'is-invalid':''}}" name="tiempoAsignado3" id="tiempoAsignado3">
							{!! $errors->first('tiempoAsignado3','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.5" step="0.1" max="5.0" class="form-control {{$errors->has('3e')?'is-invalid':''}}" name="3e" id="3e">
							{!! $errors->first('extensionyVinculacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.0" step="0.1" max="4.4" class="form-control {{$errors->has('3mb')?'is-invalid':''}}" name="3mb" id="3mb">
							{!! $errors->first('extensionyvinculacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="3.5" step="0.1" max="3.9" class="form-control {{$errors->has('3b')?'is-invalid':''}}" name="3b" id="3b">
							{!! $errors->first('extensionyvinculacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="2.7" step="0.1" max="3.4" class="form-control {{$errors->has('3r')?'is-invalid':''}}" name="3r" id="3r">
							{!! $errors->first('extensionyvinculacion','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="1.0" step="0.1" max="2.6" class="form-control {{$errors->has('3d')?'is-invalid':''}}" name="3d" id="3d">
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
							<input type="number" min="0" max="100" class="form-control {{$errors->has('tiempoAsignado4')?'is-invalid':''}}" name="tiempoAsignado4" id="tiempoAsignado4">
							{!! $errors->first('tiempoAsignado4','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.5" step="0.1" max="5.0" class="form-control {{$errors->has('4e')?'is-invalid':''}}" name="4e" id="4e">
							{!! $errors->first('administracionAcademica','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.0" step="0.1" max="4.4" class="form-control {{$errors->has('4mb')?'is-invalid':''}}" name="4mb" id="4mb">
							{!! $errors->first('administracionAcademica','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="3.5" step="0.1" max="3.9" class="form-control {{$errors->has('4b')?'is-invalid':''}}" name="4b" id="4b">
							{!! $errors->first('administracionAcademica','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="2.7" step="0.1" max="3.4" class="form-control {{$errors->has('4r')?'is-invalid':''}}" name="4r" id="4r">
							{!! $errors->first('administracionAcademica','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="1.0" step="0.1" max="2.6" class="form-control {{$errors->has('4d')?'is-invalid':''}}" name="4d" id="4d">
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
							<input type="number" min="0" max="100" class="form-control {{$errors->has('tiempoAsignado5')?'is-invalid':''}}" name="tiempoAsignado5" id="tiempoAsignado5">
							{!! $errors->first('tiempoAsignado5','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.5" step="0.1" max="5.0" class="form-control {{$errors->has('5e')?'is-invalid':''}}" name="5e" id="5e">
							{!! $errors->first('otrasActividades','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="4.0" step="0.1" max="4.4" class="form-control {{$errors->has('5mb')?'is-invalid':''}}" name="5mb" id="5mb">
							{!! $errors->first('otrasActividades','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="3.5" step="0.1" max="3.9" class="form-control {{$errors->has('5b')?'is-invalid':''}}" name="5b" id="5b">
							{!! $errors->first('otrasActividades','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="2.7" step="0.1" max="3.4" class="form-control {{$errors->has('5r')?'is-invalid':''}}" name="5r" id="5r">
							{!! $errors->first('otrasActividades','<div class="invalid-feedback">:message</div>') !!}
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label"></label>
							<input type="number" min="1.0" step="0.1" max="2.6" class="form-control {{$errors->has('5d')?'is-invalid':''}}" name="5d" id="5d">
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

	<br><br>	
	<b>Argumentos de la Calificación Final</b>
	<div class="panel-body">
  		<ul class="list-group">
    		<li class="list-group-item"><input type="text" class="form-control {{$errors->has('comentarios')?'is-invalid':''}}" name="comentarios" id="comentarios" placeholder="Opcional" ></li>
  		</ul>
  	</div>

  	<br><br>

	<div class="panel-body">
  		<ul class="list-group">
    		<li class="list-group-item">Miembro Uno: <input type="text" class="form-control {{$errors->has('miembro1')?'is-invalid':''}}" name="miembro1" id="miembro1" value="{{ $datosComision->miembro1}}" readonly></li>

    		<li class="list-group-item">Decano: <input type="text" class="form-control {{$errors->has('decano')?'is-invalid':''}}" name="decano" id="decano" value="{{ $datosComision->decano}}" readonly></li>

    		<li class="list-group-item">Miembro Dos: <input type="text" class="form-control {{$errors->has('miembro2')?'is-invalid':''}}" name="miembro2" id="miembro2" value="{{ $datosComision->miembro2}}" readonly></li>

    		<input type="text" class="form-control {{$errors->has('año')?'is-invalid':''}}" name="año" id="año" value="{{ $datosComision->año}}" hidden=></li>
    		<input type="text" class="form-control {{$errors->has('id_comision')?'is-invalid':''}}" name="id_comision" id="id_comision" value="{{ $datosComision->id_comision}}" hidden=></li>
  		</ul>
  	</div>

	<br>
	<input type="submit" class="btn btn-success" value="Enviar Evaluación"><br><br>
	<a class="btn btn-primary" href="{{ url('evaluacion') }}">Regresar ←</a>

</form>
</div>
@endsection