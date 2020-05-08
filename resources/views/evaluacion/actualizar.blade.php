@extends('layouts.app')

@section('content')

<div class="container">

<h2>Evaluaciones</h2><br>

<!--Pantalla que despliega un mensaje en pantalla indiacando que el academico en cuestion ya fue evaluado.
	Junto con el mensaje se ofrecen dos posibles acciones. Regresar o editar la evaluacion antes realizada.-->
@if(!empty($Mensaje))
  <div class="alert alert-warning"> {{ $Mensaje }}</div>
@endif
<a class="btn btn-success" href="{{ url('evaluacion/actualizar/'.$id_evaluacion) }}" >Editar ✎</a>
<a class="btn btn-primary" href="{{ url('evaluacion') }}">Regresar ←</a>

</div>
@endsection