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
	<main><h2><center><u>PAUTA RESUMEN: PROFESOR TITULAR</u></center></h2></main>
<br>
<h3><u>I. IDENTIFICACIÓN:</u></h3>
<div class="w3-container">
	<table class="w3-table-all" WIDTH="30%">
		<tbody>
			<tr>
				<th>Académico</th>
				<th>Departamento</th>		
			</tr>
			<tr>
				<td>{{$academico->nombre}} {{$academico->apellido}}</td>
				<td>{{$academico->departamento}}</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th>Facultad</th>
				<th>Periodo</th>		
			</tr>
			<tr>
				<td>{{$academico->facultad}}</td>
				<td>{{$datos->año}}</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th>Título Profesional</th>
				<th>Horas de Contrato</th>		
			</tr>
			<tr>
				<td>{{$academico->titulo}}</td>
				<td>{{$academico->horas_contrato}}</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th>Categoría</th>
				<th>Grado Académico</th>		
			</tr>
			<tr>
				<td>{{$academico->categoria}}</td>
				<td>{{$academico->grado_academico}}</td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<th>Calificación Anterior</th>
				<th>Tipo de Planta</th>		
			</tr>
			<tr>
				<td>Era</td>
				<td>{{$academico->tipo_planta}}</td>
			</tr>
		</tbody>
	</table>
</div>
<br><br>
<h3>II. Calificación Académica:</h3>
<div class="w3-container">
	<table class="w3-table-all" WIDTH="30%">
		<tbody>
			<tr>
				<th>Académico</th>
				<th>Departamento</th>		
			</tr>
			<tr>
				<td>{{$academico->nombre}} {{$academico->apellido}}</td>
				<td>{{$academico->departamento}}</td>
			</tr>
		</tbody>
	</table>
</div>

</body>
</html>