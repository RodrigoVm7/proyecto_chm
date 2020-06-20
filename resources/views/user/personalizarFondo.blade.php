@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />
<script type="text/javascript" src="{!! asset('js/evaluar.js') !!}"></script>

<body class="fondo{{$color}}">
@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<h2>Personalizar Fondo de Navegación</h2><br>

<form action="{{url('/cambiarColor')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}

	<div id = "0" class="circulo0" onclick = "cambiar_fondo(id)"></div>
	<div id = "1" class="circulo1" onclick = "cambiar_fondo(id)"></div>
	<div id = "2" class="circulo2" onclick = "cambiar_fondo(id)"></div>
	<div id = "3" class="circulo3" onclick = "cambiar_fondo(id)"></div>
	<div id = "4" class="circulo4" onclick = "cambiar_fondo(id)"></div>

	<input type="number" name="color" id="color" value="{{$color}}" hidden>
	<br>

	<input type="submit" class="btn btn-success" value="Confirmar">
	<a href="{{ url('index') }}" class="btn btn-success" >⏎ Regresar</a>

</div>
@endsection
</body>