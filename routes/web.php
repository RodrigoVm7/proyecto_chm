<?php

/* Conjunto de Rutas que serán frecuentadas por el software.
Junto con cada ruta, se debe especificar el método a utilizar (get/post) junto con el controlador y la función asociada a ejecutar. */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/index','usersController@index');

Route::get('/academicos','AcademicoController@index');
Route::get('/añadirAcademico','AcademicoController@create');
Route::post('/guardarAcademico','AcademicoController@store');
Route::post('/buscarAcademico','AcademicoController@buscar');
Route::get('/academico/{rut}/edit','AcademicoController@edit');
Route::post('/academico/{rut}/update','AcademicoController@update');

Route::get('/comisiones','ComisionController@index');
Route::get('/añadirComision','ComisionController@create');
Route::post('/guardarComision','ComisionController@store');
Route::post('/buscarComision','ComisionController@buscar');
Route::get('/comision/{id_comision}/edit','ComisionController@edit');
Route::post('/comision/{id_comision}/update','ComisionController@update');

Route::get('/admin/facultades','FacultadController@index');
Route::get('/admin/añadirFacultad','FacultadController@create');
Route::post('/admin/guardarFacultad','FacultadController@store');
Route::get('/admin/facultad/{cod_facultad}/edit','FacultadController@edit');
Route::post('/admin/facultad/{cod_facultad}/update','FacultadController@update');
Route::post('/admin/buscarFacultad','FacultadController@buscar');

Route::get('/admin/departamentos','DepartamentoController@index');
Route::get('/admin/añadirDepartamento','DepartamentoController@create');
Route::post('/admin/guardarDepartamento','DepartamentoController@store');
Route::get('/admin/departamento/{cod_departamento}/edit','DepartamentoController@edit');
Route::post('/admin/departamento/{cod_departamento}/update','DepartamentoController@update');
Route::post('/admin/buscarDepartamento','DepartamentoController@buscar');
Route::get('/admin/depasporfacu/{nombre_facultad}','DepartamentoController@depasporfacu');

Route::get('/admin/usuarios','usersController@mostrar');
Route::get('/admin/añadirUsuario','usersController@create');
Route::post('/admin/guardarUsuario','usersController@store');
Route::post('/admin/buscarUsuario','usersController@buscar');
Route::get('/admin/usuario/{email}/edit','usersController@edit');
Route::post('/admin/usuario/{email}/update','usersController@update');
Route::get('/admin/reenviarContraseña','usersController@reenviarContraseña');
Route::get('/admin/usuario/{email}/nuevaContraseña','usersController@nuevaContraseña');

Route::get('/admin/periodos','PeriodoController@index');
Route::post('/admin/añoPeriodo','PeriodoController@accion');

Route::get('/evaluacion','EvaluacionController@index');
Route::post('/evaluar','EvaluacionController@evaluar');
Route::post('/guardarEvaluacion','EvaluacionController@store');
Route::get('/evaluacion/actualizar/{rut_academico}','EvaluacionController@actualizar');
Route::post('/evaluacion/update','EvaluacionController@update');
Route::get('/evaluacion/ver/{rut_academico}','EvaluacionController@verEvaluacion');

Route::get('/reportes','ReportesController@index');
Route::get('/generarPDF/{periodo}','ReportesController@generarPDF');
Route::get('/generarExc/{periodo}','ReportesController@generarExc');
Route::get('/habilitarSubidaArchivos','ReportesController@habilitarSubida');
Route::get('/subirFirma/{periodo}','ReportesController@subirFirma');
Route::post('/guardarFirma','ReportesController@guardarFirma');
Route::get('/verFirma/{periodo}','ReportesController@verFirma');
Route::post('/buscarReporte','ReportesController@buscar');
Route::get('/habilitarSubirBuscado/{periodo}','ReportesController@habilitarSubidaBuscado');

Route::get('/admin/graficos','GraficosController@index');
Route::post('/admin/graficar','GraficosController@graficar');
Route::get('/graficoAcademico/{rut}','GraficosController@graficoAcademico');
Route::post('/admin/graficoAcademicoPeriodo','GraficosController@graficoAcademicoPeriodo');

Route::get('/secretario/graficos','GraficosController@secretarioIndex');
Route::post('/secretario/graficar','GraficosController@secretarioGraficar');

Route::get('/graficoAcademico/{rut}','GraficosController@graficoAcademico');

Route::get('/personalizarFondo','usersController@personalizar');
Route::post('/cambiarColor','usersController@cambiarColor');

Route::get('/generarReporteIndividual/{periodo}/{rut}', 'GraficosController@reporteIndividual');


 