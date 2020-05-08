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

<!-- Formulario que permite agregar archivos al sistema, mediante el metodo post, donde redirige a la url"/guardarFirma"-->
<form action="{{url('/guardarFirma')}}" class="form-horizontal" enctype="multipart/form-data" method="post">
	{{ csrf_field() }}

	<div class="panel-heading">Agregar archivo</div><br>
        <div class="panel-body">
        	<div class="form-group">
              <div class="col-md-6">
                <input type="file" name="file" >
              </div>
            </div>
            <input type="text" class="form-control {{$errors->has('periodo')?'is-invalid':''}}" name="periodo" id="periodo" value="{{$periodo}}" hidden=></li>
          	<input type="submit" class="btn btn-success" value="Subir">
			<a class="btn btn-primary" href="{{ url('habilitarSubidaArchivos') }}">Regresar ←</a>
        </div>
</form>
</div>
@endsection