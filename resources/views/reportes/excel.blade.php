<table>
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