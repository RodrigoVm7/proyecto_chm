@extends('layouts.app')

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error}}</li>
		@endforeach
	</ul>
</div>
@endif

<!-- Visualizacion en pantalla del archivo subido al sistema-->
	<img src="http://localhost:8888/sea/public/storage/{{$data->archivo}}">

	<a class="btn btn-primary" href="{{ url('reportes') }}">Regresar ←</a>

</div>
@endsection