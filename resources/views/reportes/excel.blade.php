<table>
    <thead>
    <tr>
		<th><br><b>Fecha</b></th>
		<th><br><b>Facultad</b></th>
		<th><br><b>Nombre</b></th>
		<th><b>Actividades de Docencia<br>Tiempo Asig. - Nota</b></th>
		<th><b>Actividades de Investigación<br>Tiempo Asig. - Nota</b></th>
		<th><b>Extensión y Vinculación<br>Tiempo Asig. - Nota</b></th>
		<th><b>Administración Académica<br>Tiempo Asig. - Nota</b></th>
		<th><b>Otras<br>Tiempo Asig. - Nota</b></th>
		<th><b>Calificación<br>Nota - Concepto</b></th>
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