<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
		table, td, th {
  			border: 1px solid black;
		}
		th {
  			height: 50px;
		}
    	#vertical-bar {
        	border-left: 1px solid #ccc;
        	width:1px;
        	height:500px;
    	}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-container">

	<table class="w3-table-all w3-hoverable" WIDTH="30%">
		<thead>
			<tr>
				<th><br>Fecha</th>
				<th><br>Facultad</th>
				<th><br>Nombre</th>
				<th><center>Actividades de Docencia</center><hr><center>Tiempo Asig. - Nota</center></th>
				<th><center>Actividades de Investigación</center><hr><center>Tiempo Asig. - Nota</center></th>
				<th><center>Extensión y Vinculación</center><hr><center>Tiempo Asig. - Nota</center></th>
				<th><center>Administración Académica</center><hr><center>Tiempo Asig. - Nota</center></th>
				<th><center>Otras</center><hr><center>Tiempo Asig. - Nota</center></th>
				<th><center>Calificación</center><hr><center>Nota - Concepto</center></th>
			</tr>
		</thead>
		<tbody>
			@foreach($datos as $dato)
				<tr>
					<td>{{ $dato->año}}</td>
					<td>{{ $dato->facultad}}</td>
					<td>{{ $dato->nombre_academico}} {{$dato->apellido_academico}}</td>
					<td><center>{{ $dato->tiempoActividad1}} - {{$dato->e1}}{{$dato->mb1}}{{$dato->b1}}{{$dato->r1}}{{$dato->d1}}</center></td>
					<td><center>{{ $dato->tiempoActividad2}} - {{$dato->e2}}{{$dato->mb2}}{{$dato->b2}}{{$dato->r2}}{{$dato->d2}}</center></td>
					<td><center>{{ $dato->tiempoActividad3}} - {{$dato->e3}}{{$dato->mb3}}{{$dato->b3}}{{$dato->r3}}{{$dato->d3}}</center></td>
					<td><center>{{ $dato->tiempoActividad4}} - {{$dato->e4}}{{$dato->mb4}}{{$dato->b4}}{{$dato->r4}}{{$dato->d4}}</center></td>
					<td><center>{{ $dato->tiempoActividad5}} - {{$dato->e5}}{{$dato->mb5}}{{$dato->b5}}{{$dato->r5}}{{$dato->d5}}</center></td>
					<td>
						@if($dato->nota_final>4.4)
							<center>{{ $dato->nota_final}} - Excelente</center>
						@elseif($dato->nota_final>3.9)
							<center>{{ $dato->nota_final}} - Muy Bueno</center>
						@elseif($dato->nota_final>3.4)
							<center>{{ $dato->nota_final}} - Bueno</center>
						@elseif($dato->nota_final>2.6)
							<center>{{ $dato->nota_final}} - Regular</center>
						@elseif($dato->nota_final<2.7)
							<center>{{ $dato->nota_final}} - Deficiente</center>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
</body>
</html>