@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />

<body class="fondo{{$color}}">

@section('content')

<div class="container">

<h2>Reportes</h2><br>

<!-- Conjunto de botones que permiten regresar a la pagina anterior de navegacion, habilitar y desactivar subida de archivos-->
<a href="{{ url('reportes') }}" class="btn btn-success" >⏎ Regresar</a>
@if($subida==0)
	<a href="{{ url('habilitarSubirBuscado/'.$datos->año) }}" class="btn btn-danger">Subir Archivo</a>
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
		<!-- Mediante un ciclo For, se mostrará dentro de la tabla el periodo buscado, junto con botones para generar pdf, excel y ver/subir firmas-->
		<tr align="center">
			<td>{{ $datos->año}}</td>
			<td>
				<a class="btn btn-light" href="{{ url('/generarPDF/'.$datos->año) }}">📄
			</td>
			<td>
				<a class="btn btn-success" href="{{ url('/generarExc/'.$datos->año) }}">exc
			</td>
			<td>
				<a class="btn btn-warning" href="{{ url('/verFirma/'.$datos->año) }}">⬇
			</td>
			@if($subida==1)
				<td>
					<a class="btn btn-danger" href="{{ url('/subirFirma/'.$datos->año) }}">⬆
				</td>
			@endif
		</tr>
	</tbody>
</table>

</div>
@endsection
</body>