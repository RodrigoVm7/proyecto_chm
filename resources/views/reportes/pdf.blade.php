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
    	header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            color: #9c9c9c;
            text-align: left;
            line-height: 30px;
        }
        div.noticia {
  			background-color: white;
  			color: #6c6c6c;
  			padding: 15px;
		}

		div.noticia img.izquierda {
  			float: left;
  			margin-right: 15px;
		}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<header>
	<div class="noticia">
	<img class="izquierda" src="images/ucm_3.png" width="5%" height="100%"><aside>VICERRECTORIA ACADÉMICA<br>COMISIÓN PROMOCIÓN ACADÉMICA</aside>
	</div>
</header>
<br><br><br><br><br><br>
<body>
<h3><center>RESUMEN CALIFICACIONES AÑO {{$periodo}}</center></h3>
<div class="w3-container">
	<table class="w3-table-all w3-hoverable" WIDTH="30%">
		<thead>
			<tr>
				<th rowspan="2"><center>Facultad</center></th>
				<th rowspan="2"><center>Categoría</center></th>
				<th rowspan="2"><center>Nombre</center></th>
				<th rowspan="2"><center>Calificación Anterior</center></th>
				<th colspan="2"><center>Actividades de Docencia</center></th>
				<th colspan="2"><center>Actividades de Investigación</center></th>
				<th colspan="2"><center>Extensión y Vinculación</center></th>
				<th colspan="2"><center>Administración Académica</center></th>
				<th colspan="2"><center>Otras</center></th>
				<th colspan="2"><center>Calificación</center></th>
			</tr>
			<tr hidden=""></tr>
			<tr>
				<th><center>Tiempo asig.</center></th>
				<th><center>nota</center></th>
				<th><center>Tiempo asig.</center></th>
				<th><center>nota</center></th>
				<th><center>Tiempo asig.</center></th>
				<th><center>nota</center></th>
				<th><center>Tiempo asig.</center></th>
				<th><center>nota</center></th>
				<th><center>Tiempo asig.</center></th>
				<th><center>nota</center></th>
				<th><center>nota</center></th>
				<th><center>concepto</center></th>
			</tr>
		</thead>
		<tbody>
			@foreach($datos as $dato)
			<tr hidden=""></tr>
			<tr>
				<td><center>{{$dato->facultad}}</center></td>
				<td><center>{{$dato->categoria}}</center></td>
				<td><center>{{$dato->nombre_academico}} {{$dato->apellido_academico}}</center></td>
				<td><center>{{$dato->nAnterior}}</center></td>
				<td><center>{{$dato->tiempoActividad1}}</center></td>
				<td><center>{{$dato->e1}}{{$dato->mb1}}{{$dato->b1}}{{$dato->r1}}{{$dato->d1}}</center></td>
				<td><center>{{$dato->tiempoActividad2}}</center></td>
				<td><center>{{$dato->e2}}{{$dato->mb2}}{{$dato->b2}}{{$dato->r2}}{{$dato->d2}}</center></td>
				<td><center>{{$dato->tiempoActividad3}}</center></td>
				<td><center>{{$dato->e3}}{{$dato->mb3}}{{$dato->b3}}{{$dato->r3}}{{$dato->d3}}</center></td>
				<td><center>{{$dato->tiempoActividad4}}</center></td>
				<td><center>{{$dato->e4}}{{$dato->mb4}}{{$dato->b4}}{{$dato->r4}}{{$dato->d4}}</center></td>
				<td><center>{{$dato->tiempoActividad5}}</center></td>
				<td><center>{{$dato->e5}}{{$dato->mb5}}{{$dato->b5}}{{$dato->r5}}{{$dato->d5}}</center></td>
				<td><center>{{$dato->nota_final}}</center></td>
				@if($dato->nota_final>4.4)
					<td><center>Excelente</center></td>
				@elseif($dato->nota_final>3.9)
					<td><center>Muy bueno</center></td>
				@elseif($dato->nota_final>3.4)
					<td><center>Bueno</center></td>
				@elseif($dato->nota_final>2.6)
					<td><center>Regular</center></td>
				@elseif($dato->nota_final<2.7)
					<td><center>Deficiente</center></td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</body>
</html>