@extends('layouts.app')

<style>
	.imagenUcm{
		text-align: center;
		opacity:0.4;
		position: fixed;
		bottom:100px;
        right: 0;
        left: 0;
        margin-right: auto;
        margin-left: auto;
	}

</style>

@section('content')

<div class="container" style="text-align:center;">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif


<!--Seccion que mediante 5 botones, ofrecerá distintas funcionalidades al secretario.
	Cada botón, redirige a distintas url, según lo que se desee realizar-->
<br><br><br>
<a href="{{ url('secretario/graficos') }}" class="btn btn-primary" >Gráficos</a>
<a href="{{ url('comisiones') }}" class="btn btn-primary" >Comisiones</a>
<a href="{{ url('academicos') }}" class="btn btn-primary" >Académicos</a>
<a href="{{ url('evaluacion') }}" class="btn btn-primary" >Evaluar</a>
<a href="{{ url('reportes') }}" class="btn btn-primary" >Reportes</a>
<br/>
<br/>

<div class="imagenUcm"> <img src="{{asset('images/UCM.png')}}" width="400" height="180"> </div>

<div class="imagenUcm"> <img src="{{asset('images/UCM.png')}}" width="400" height="180"> </div>

</div>
@endsection