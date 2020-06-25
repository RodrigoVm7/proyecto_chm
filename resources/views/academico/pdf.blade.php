<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>

	<style>
		table, td, th {
  			border: 1px solid black;
			padding: 0;
			border-collapse: collapse;
		}
		/* th {
  			height: 50px;
		} */
    	#vertical-bar {
        	border-left: 1px solid #ccc;
        	width:1px;
        	height:500px;
    	}
    	.page-break {
   			 page-break-after: always;
		}
		header {
            position: fixed;
            top: -0.8cm;
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
	<img class="izquierda" src="images/ucm_3.png" width="8%" height="80%"><aside>VICERRECTORIA ACADÉMICA<br>COMISIÓN PROMOCIÓN ACADÉMICA</aside>
</div>
</header>
<br><br>
<body>
	<main><h3><center><u><b>PAUTA RESUMEN: Profesor {{$academico->categoria}}</b></u></center></h3></main>
<h4><u>I. IDENTIFICACIÓN:</u></h4>
<div class="w3-container">
	<table class="w3-table-all" WIDTH="30%" style="font-size: 12px">
		<tbody>
			<tr>
				<th style="text-align: center">Académico</th>
				<th style="text-align: center">Departamento</th>		
			</tr>
			<tr>
				<td style="text-align: center">{{$academico->nombre}} {{$academico->apellido}}</td>
				<td style="text-align: center">{{$academico->departamento}}</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th style="text-align: center">Facultad</th>
				<th style="text-align: center">Periodo</th>		
			</tr>
			<tr>
				<td style="text-align: center">{{$academico->facultad}}</td>
				<td style="text-align: center">{{$datos->año}}</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th style="text-align: center">Título Profesional</th>
				<th style="text-align: center">Horas de Contrato</th>		
			</tr>
			<tr>
				<td style="text-align: center">{{$academico->titulo}}</td>
				<td style="text-align: center">{{$academico->horas_contrato}}</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th style="text-align: center">Categoría</th>
				<th style="text-align: center">Grado Académico</th>		
			</tr>
			<tr>
				<td style="text-align: center">{{$academico->categoria}}</td>
				<td style="text-align: center">{{$academico->grado_academico}}</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th style="text-align: center">Calificación Anterior</th>
				<th style="text-align: center">Tipo de Planta</th>		
			</tr>
			<tr>
				<td style="text-align: center">{{$notaAnterior}}</td>
				<td style="text-align: center">{{$academico->tipo_planta}}</td>
			</tr>
		</tbody>
	</table>
</div>
<!-- <div class="page-break"></div> -->

<h4>II. Calificación Académica:</h4>
<div class="w3-container">
	<table>
			<tr>
				<th rowspan="2"></th>
				<th rowspan="2">% TIEMPO ASIGNADO A TAREAS PROGRAMADAS</th>
				<th colspan="5">CALIFICACIÓN</th>
				<th>Pond.</th>
			</tr>
			<tr>
				<th>E</th>
				<th>MB</th>
				<th>B</th>
				<th>R</th>
				<th>D</th>
				<th>% T x C / 100</th>
			</tr>
			<tr>
				<td style="width: 35%; text-align: center;">1. Actividades de Docencia</td>
				<td><center>{{$datos->tiempoActividad1}}</center></td>
				<td><center>{{$datos->e1}}</center></td>
				<td><center>{{$datos->mb1}}</center></td>
				<td><center>{{$datos->b1}}</center></td>
				<td><center>{{$datos->r1}}</center></td>
				<td><center>{{$datos->d1}}</center></td>
				<td><center>{{$datos->t1c}}</center></td>
			</tr>
			<tr>
				<td style="text-align: center;">2. Actividades de Investigación</td>
				<td><center>{{$datos->tiempoActividad2}}</center></td>
				<td><center>{{$datos->e2}}</center></td>
				<td><center>{{$datos->mb2}}</center></td>
				<td><center>{{$datos->b2}}</center></td>
				<td><center>{{$datos->r2}}</center></td>
				<td><center>{{$datos->d2}}</center></td>
				<td><center>{{$datos->t2c}}</center></td>
			</tr>
			<tr>
				<td style="text-align: center;">3. Extensión y Vinculación</td>
				<td><center>{{$datos->tiempoActividad3}}</center></td>
				<td><center>{{$datos->e3}}</center></td>
				<td><center>{{$datos->mb3}}</center></td>
				<td><center>{{$datos->b3}}</center></td>
				<td><center>{{$datos->r3}}</center></td>
				<td><center>{{$datos->d3}}</center></td>
				<td><center>{{$datos->t3c}}</center></td>
			</tr>
			<tr>
				<td style="text-align: center;">4. Administración Académica</td>
				<td><center>{{$datos->tiempoActividad4}}</center></td>
				<td><center>{{$datos->e4}}</center></td>
				<td><center>{{$datos->mb4}}</center></td>
				<td><center>{{$datos->b4}}</center></td>
				<td><center>{{$datos->r4}}</center></td>
				<td><center>{{$datos->d4}}</center></td>
				<td><center>{{$datos->t4c}}</center></td>
			</tr>
			<tr>
				<td style="text-align: center;">5. Otras Actividades Realizadas</td>
				<td><center>{{$datos->tiempoActividad5}}</center></td>
				<td><center>{{$datos->e5}}</center></td>
				<td><center>{{$datos->mb5}}</center></td>
				<td><center>{{$datos->b5}}</center></td>
				<td><center>{{$datos->r5}}</center></td>
				<td><center>{{$datos->d5}}</center></td>
				<td><center>{{$datos->t5c}}</center></td>
			</tr>
			<tr>
				<th colspan="7">Calificación Final</th>
				<th><center>{{$datos->nota_final}}</center></th>
			</tr>
	</table>
</div>

<h4>III. ESCALA EVALUATIVA:</h4>
<div class="w3-container">
	<table class="w3-table-all" WIDTH="30%">
			<tr>
				<th><center>ESCALA:Excelente = 4,5 a 5      Muy Bueno = 4,0 a 4,4<br>Regular = 3,4 a 2,7    Deficiente = menos de 2,7 Bueno: 3,5 a 3,9</center></th>
			</tr>
	</table>
</div>

<div class="page-break"></div>
<br><br><br>
<h4>IV. ARGUMENTOS DE LA CALIFICACIÓN FINAL:</h4>
<div class="w3-container">
	<table class="w3-table-all" WIDTH="30%">
			<tr>
				<th>{{$datos->comentarios}}</th>
			</tr>
	</table>
</div>

<br>
<h4><center>FIRMA COMISIÓN</center></h4>
@if($firmaComision!="")
<center><img src="http://localhost:8888/chm/public/storage/{{$firmaComision}}" width="30%" height="30%"></center>
@endif
<!--<div class="w3-container">
	<table class="w3-table-all" WIDTH="30%">
		<tr hidden=""></tr>
		<tr>
			<td><br><br></td>
			<td><br><br></td>
			<td><br><br></td>
		</tr>
		<tr>
			<th><center>Nombre y Firma</center></th>
			<th><center>Nombre y Firma</center></th>
			<th><center>Nombre y Firma</center></th>
		</tr>
	</table>

	<table class="w3-table-all" WIDTH="30%" style="margin-top: 10px;">
		<tr hidden=""></tr>
		<tr style="margin-top: 3px;">
			<td style="visibility:hidden;"><br><br></td>
			<td style="visibility:hidden;"><br><br></td>
			<td><br><br></td>
		</tr>
		<tr>
			<th style="visibility:hidden;"><center>Nombre y Firmaaaaaaa</center></th>
			<th style="visibility:hidden;"><center>Nombre y Firmaaaaaa</center></th>
			<th style="width: 50%;"><center>Nombre y Firma Ministro de Fe</center></th>
		</tr>
	</table>-->
	<br><h8>FECHA: {{$datos->updated_at->format('d-m-yy')}}</h8>
</div>
</body>
</html>