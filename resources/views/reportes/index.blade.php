@extends('layouts.app')

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-danger" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

@if(Session::has('MensajeExito'))
<div class="alert alert-success" role="alert">
{{ Session::get('MensajeExito')}}
</div>
@endif

<h2>Reportes</h2><br>

<!-- Formulario que permite buscar un periodo en particular-->
<form action="{{url('/buscarReporte')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control {{$errors->has('periodo')?'is-invalid':''}}" name="periodo" id="periodo" placeholder="Buscar Periodo">
		{!! $errors->first('periodo','<div class="invalid-feedback">:message</div>') !!}
	</div>
</form>

<!-- Conjunto de botones que permiten refrescar la pagina, regresar a la pagina anterior de navegacion y subir/desabilitar la subida de
	 archivos-->
<a href="{{ url('reportes') }}" class="btn btn-success" >↻ Refrescar</a>
<a href="{{ url('index') }}" class="btn btn-success" >⏎ Regresar</a>
@if($subida==0)
	<a href="{{ url('habilitarSubidaArchivos') }}" class="btn btn-danger">Subir Archivo</a>
@endif
@if($subida==1)
	<a href="{{ url('reportes') }}" class="btn btn-danger">Finalizar subida de Archivo</a>
@endif
<br><br>

<!-- Seccion que permite que hará que todo lo que se muestre a continuacion, sea dentro de una tabla-->
<table class="table table-light table-hover">

	<!-- Cabecera de la tabla, donde se especifica los datos que tendrá cada columna-->
	<thread class="thread-light">
		<tr>
			<th>Año</th>
			<th>PDF</th>
			<th>Excel</th>
			<th>Ver Firmas</th>
			@if($subida==1)
				<th>Subir</th>
			@endif
		</tr>
	</thread>
	<tbody>
		<!-- Mediante un ciclo For, se mostrará dentro de la tabla cada periodo junto con botones que permiten generar pdf, excel y ver
			 firmas, junto con el boton que permite subir archivos (cuando se habilite la opción)-->
		@foreach($periodos as $periodo)
		<tr>
			<td>{{ $periodo->año}}</td>
			<td>
				<a class="btn btn-light" href="{{ url('/generarPDF/'.$periodo->año) }}">📄
			</td>
			<td>
				<a class="btn btn-success" href="{{ url('/generarExc/'.$periodo->año) }}">exc
			</td>
			<td>
				<a class="btn btn-warning" href="{{ url('/verFirma/'.$periodo->año) }}">⬇
			</td>
			@if($subida==1)
				<td>
					<a class="btn btn-danger" href="{{ url('/subirFirma/'.$periodo->año) }}">⬆
				</td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>

<div class="text-center">
	{{$periodos->links()}}
</div>

</div>
@endsection