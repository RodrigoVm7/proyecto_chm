@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />

<body class="fondo{{$color}}">
@section('content')

<div class="container" style="text-align:center;">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif


<!--Sección que mediante 9 botones, ofrecerá distintas funcionalidades al administrador.
	Cada botón, redirige a distintas url, según lo que se desee realizar-->
<br/>
<br/>
<br/>
<a href="{{ url('admin/graficos') }}" class="btn btn-primary" >Gráficos</a>
<a href="{{ url('admin/facultades') }}" class="btn btn-primary" >Facultades</a>
<a href="{{ url('admin/departamentos') }}" class="btn btn-primary" >Departamentos</a>
<a href="{{ url('comisiones') }}" class="btn btn-primary" >Comisiones</a>
<a href="{{ url('academicos') }}" class="btn btn-primary" >Académicos</a>
<a href="{{ url('evaluacion') }}" class="btn btn-primary" >Evaluar</a>
<a href="{{ url('reportes') }}" class="btn btn-primary" >Reportes</a>
<a href="{{ url('admin/usuarios') }}" class="btn btn-primary" >Usuarios</a>
<a href="{{ url('admin/periodos') }}" class="btn btn-primary" >Periodos</a>
<!--<a href="{{ url('personalizarFondo') }}" class="btn btn-primary" >Personalizar Fondo</a>-->
<br><br>

<div class="imagenUcm"><img src="{{asset('images/UCM.png')}}" width="400" height="180"></div>

</div>
@endsection
</body>