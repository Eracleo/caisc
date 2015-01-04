<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    if (Auth::check())
        if(Auth::user()->tipoUsuario == 'Personal')
            return Redirect::to('persona');           
        else

            if(Auth::user()->tipoUsuario == 'Docente')
                return Redirect::to('docente');
            else
                return Redirect::to('alumno');
    return View::make('login');
});
// Errors
Route::get('404.html',array('uses'=>'ErrorController@mostrar404'));
Route::get('500.html',array('uses'=>'ErrorController@mostrar500'));
Route::get('blank.html',array('uses'=>'ErrorController@blank'));
//login
Route::get('salir',function()
{
    Auth::logout();
    return Redirect::to('/');
});
Route::post('check',array('uses'=>'Login@postUser'));
// Grupo para que accedan los Docentes
Route::group(['before' => 'auth|sessionDoc'], function()
{
    Route::get('docente',array('uses'=>'DocenteController@perfil'));
    Route::get('docente/password/{id}',array('uses'=>'DocenteController@password'))->where('id','[0-9]+');
    Route::post('docente/password/{id}',array('uses'=>'DocenteController@passwordUpdate'))->where('id','[0-9]+');
    Route::get('docente/imagen/{id}',array('uses'=>'DocenteController@imagen'))->where('id','[0-9]+');
    Route::post('docente/imagen/{id}',array('uses'=>'DocenteController@uploadImage'))->where('id','[0-9]+');        
    Route::get('docente/edit/{id}',array('uses'=>'DocenteController@edit'))->where('id','[0-9]+');

    Route::get('ingresonotas/inicioCT','IngresoNotasController@inicioCT');
    Route::post('ingresonotas/ingresoCT','IngresoNotasController@cursoCT');
    Route::post('ingresonotas/ingresoNotaCT','IngresoNotasController@ingresoCT');
    Route::post('ingresonotas/consolidadoCT','IngresoNotasController@consolidadoCT');
    Route::get('ingresonotas/registroCT','IngresoNotasController@registroCT');

    Route::get('ingresonotas/inicioCL','IngresoNotasController@inicioCL');
    Route::post('ingresonotas/ingresoCL','IngresoNotasController@cursoCL');
    Route::post('ingresonotas/ingresoNotaCL','IngresoNotasController@ingresoCL');
    Route::post('ingresonotas/consolidadoCL','IngresoNotasController@consolidadoCL');
    Route::get('ingresonotas/registroCL','IngresoNotasController@registroCL');


    Route::post('/ListarCursos/create/{id}','ListarCursosController@create');
    Route::controller('ListarCursos','ListarCursosController');
    Route::post('/ListarCursosCarrera/create/{id}','ListarCursosController@create');
    Route::controller('ListarCursosCarreras','ListarCursosCTController');



     //Rutas para el carrera técnica
    Route::get('asistencia/inicioCT','AsistenciaController@inicioCT');
    Route::post('asistencia/ingresoCT','AsistenciaController@cursoCT');
    Route::post('asistencia/ingresoAsistenciaCT','AsistenciaController@ingresoCT');
    Route::post('asistencia/consolidadoCT','AsistenciaController@consolidadoCT');
    Route::get('asistencia/registroCT','AsistenciaController@registroCT');
    //Rutas para Cursos Libres
    Route::get('asistencia/inicioCL','AsistenciaController@inicioCL');
    Route::post('asistencia/ingresoCL','AsistenciaController@cursoCL');
    Route::post('asistencia/ingresoAsistenciaCL','AsistenciaController@ingresoCL');
    Route::post('asistencia/consolidadoCL','AsistenciaController@consolidadoCL');
    Route::get('asistencia/registroCL','AsistenciaController@registroCL');
});
// Rutas para que accedan los alumnos
Route::group(['before' => 'auth|sessionAlu'], function()
{
    Route::get('alumno',array('uses'=>'AlumnoController@perfil'));
    Route::get('alumnoB/iniciocursosmatriculados',array('uses'=>'FuncionalidadAlumnoController@iniciocursosmatriculados'));
    Route::post('alumnoB/cursosmatriculados',array('uses'=>'FuncionalidadAlumnoController@cursosmatriculados'));
    Route::get('alumnoB/inicionotascursos',array('uses'=>'FuncionalidadAlumnoController@inicionotascursos'));
    Route::post('alumnoB/notascursos',array('uses'=>'FuncionalidadAlumnoController@notascursos'));
    Route::get('alumnoB/perfil',array('uses'=>'FuncionalidadAlumnoController@perfil'));
    Route::get('alumnoB/imagen/{id}',array('uses'=>'FuncionalidadAlumnoController@imagen'));
    Route::post('alumnoB/imagen/{id}',array('uses'=>'FuncionalidadAlumnoController@uploadImage'));
    Route::get('alumnoB/modificar',array('uses'=>'FuncionalidadAlumnoController@modificarAlum'));
    Route::post('alumnoB/update',array('uses'=>'FuncionalidadAlumnoController@update'));
    // -- para las matriculas
    Route::get('alumnoB/registroCT',array('uses'=>'FuncionalidadAlumnoController@indexCT'));
    Route::post('alumnoB/listarCargasDispo.html',array('uses'=>'FuncionalidadAlumnoController@listacursosnuevosProcStore'));
    Route::post('alumnoB/matricular_lista',array('uses'=>'FuncionalidadAlumnoController@matricular_lista'));
    Route::get('alumnoB/listaMatriculas/{semestre}',array('uses'=>'FuncionalidadAlumnoController@listarMatriculasAlumno'));
    Route::get('alumnoB/lista_cursos',array('uses'=>'FuncionalidadAlumnoController@listaCursosCLdisponibles'));
    Route::get('alumnoB/registrar_cl/{cod}',array('uses'=>'FuncionalidadAlumnoController@registrarCL'));
});
// Grupo para que accedan los Administradores
Route::group(['before' => 'auth|sessionPer'], function()
{
    // Alumno
    Route::get('alumnos',array('uses'=>'AlumnoController@index'));
    Route::get('alumno/add.html',array('uses'=>'AlumnoController@add'));
    Route::get('alumno/edit/{id}',array('uses'=>'AlumnoController@edit'));
    Route::get('alumno/deshabilitar/{id}',array('uses'=>'AlumnoController@deshabilitar'));
    Route::get('alumno/habilitar/{id}',array('uses'=>'AlumnoController@habilitar'));
    Route::post('alumno/update/{id}',array('uses'=>'AlumnoController@update'));
    Route::post('alumno/insert.html',array('uses'=>'AlumnoController@insert'));
    Route::get('alumno/profile/{id}',array('uses'=>'AlumnoController@profile'));
    Route::get('alumno/imagen/{id}',array('uses'=>'AlumnoController@imagen'));
    Route::post('alumno/imagen/{id}',array('uses'=>'AlumnoController@uploadImage'));
    Route::get('alumno/change-pass/{id}',array('uses'=>'AlumnoController@changepass'));
    Route::post('alumno/updatePass/{id}',array('uses'=>'AlumnoController@updatePass'));
    Route::get('alumnosXcarrera',array('uses'=>'AlumnoController@indexcarrera'));

    
        // Docentes
    Route::get('docentes',array('uses'=>'DocenteController@index'));
    Route::get('docente/add.html',array('uses'=>'DocenteController@add'));
    Route::post('docente/login',array('uses'=>'DocenteController@loginInit'));
    Route::get('docente/edit/{id}',array('uses'=>'DocenteController@edit'))->where('id','[0-9]+');
    Route::post('docente/update/{id}',array('uses'=>'DocenteController@update'))->where('id','[0-9]+');
    Route::post('docente/insert.html',array('uses'=>'DocenteController@insert'));
    Route::get('docente/delete/{id}',array('uses'=>'DocenteController@delete'))->where('id','[0-9]+');
    Route::get('docente/profile/{id}',array('uses'=>'DocenteController@profile'))->where('id','[0-9]+');
    Route::get('docente/delete/{id}',array('uses'=>'DocenteController@delete'))->where('id','[0-9]+');
    Route::get('docente/active/{id}',array('uses'=>'DocenteController@active'))->where('id','[0-9]+');
    
    
    // Personal
    Route::get('personal/cargos',array('uses'=>'CargoController@index'));
    Route::get('personal/cargo/add.html',array('uses'=>'CargoController@add'));
    Route::post('personal/cargo/insert.html',array('uses'=>'CargoController@insert'));
    Route::get('personal/cargo/edit/{id}',array('uses'=>'CargoController@edit'))->where('id','[0-9]+');
    Route::post('personal/cargo/update/{id}',array('uses'=>'CargoController@update'))->where('id','[0-9]+');
    Route::get('personal/cargo/delete/{id}',array('uses'=>'CargoController@delete'))->where('id','[0-9]+');
    Route::get('personal/cargo/active/{id}',array('uses'=>'CargoController@active'))->where('id','[0-9]+');
    Route::get('personal',array('uses'=>'PersonalController@index'));
    Route::get('persona',array('uses'=>'PersonalController@perfil'));
    Route::get('personal/add.html',array('uses'=>'PersonalController@add'));
    Route::post('personal/insert.html',array('uses'=>'PersonalController@insert'));
    Route::get('personal/profile/{id}',array('uses'=>'PersonalController@profile'))->where('id','[0-9]+');
    Route::get('personal/edit/{id}',array('uses'=>'PersonalController@edit'))->where('id','[0-9]+');
    Route::post('personal/update/{id}',array('uses'=>'PersonalController@update'))->where('id','[0-9]+');
    Route::get('personal/delete/{id}',array('uses'=>'PersonalController@delete'))->where('id','[0-9]+');
    Route::get('personal/active/{id}',array('uses'=>'PersonalController@active'))->where('id','[0-9]+');
    Route::get('personal/imagen/{id}',array('uses'=>'PersonalController@imagen'))->where('id','[0-9]+');
    Route::post('personal/imagen/{id}',array('uses'=>'PersonalController@uploadImage'))->where('id','[0-9]+');
    Route::get('personal/password/{id}',array('uses'=>'PersonalController@password'))->where('id','[0-9]+');
    Route::post('personal/password/{id}',array('uses'=>'PersonalController@passwordUpdate'))->where('id','[0-9]+');
    //Modulos mantenimiento
    Route::get('modulo',array('uses'=>'ModuloController@index'));
    Route::get('modulo/nuevo.html',array('uses'=>'ModuloController@nuevo'));
    Route::get('modulo/actualizar.html',array('uses'=>'ModuloController@actualizar'));
    Route::post('modulo/crear',array('uses'=>'ModuloController@crear'));
    Route::get('modalidad_pago/nuevo.html',array('uses'=>'ModuloController@nuevo'));

    /*Begin Caja y Facturacion*/
    Route::post('modalidad/store','ModalidadController@store');
    Route::post('modalidad/update/{id}','ModalidadController@update');
    Route::get('modalidad/destroy/{id}','ModalidadController@destroy');
    Route::post('modalidad/index','ModalidadController@index');
    Route::controller('modalidad','ModalidadController');

    //Route::post('pagos/update/{id}','PagosController@update');
    Route::post('pagos/store','PagosController@store');

    Route::get('pagos/destroy/{id}','PagosController@destroy');
    Route::post('pagos/index','PagosController@index');
    Route::get('pagos/create',array('uses'=>'PagosController@add'));
    //Route::post('pagos/showAlumno/{id}','PagosController@getAlumno');
    Route::get('pagos/showAlumno/{id}',array('uses'=>'PagosController@profile'))->where('id','[0-9]+');
    Route::post('pagos/create',array('uses' => 'PagosController@store'));
    Route::post('pagos/showAlumno/store','PagosController@store');
    Route::post('pagos/search',array('uses'=>'PagosController@search'));
    Route::get('pagos/search_pagos',array('uses'=>'PagosController@search_pagos'));
    Route::get('pagos/search_detail_pagos',array('uses'=>'PagosController@search_detail_pagos'));
    Route::get('pagos/search_pagos_alumno',array('uses'=>'PagosController@search_pagos_alumno'));

    Route::controller('pagos','PagosController');
    /*End Caja y Facturacion*/
    // Modulos Asistencia: Docentes y Alumnos

   


    //Pago en planilla docentes
    Route::get('Planilla',array('uses'=>'PlanillaController@index'));
    Route::get('Planilla/detalle_Planilla/{id}',array('uses'=>'PlanillaController@detalle_Planilla'))->where('id','[0-9]+');
    //mantenimiento de tablas libres
    Route::resource('dia','DiaController');
    Route::resource('grupo','GrupoController');
    Route::resource('horario','HorarioController');
    Route::resource('modulo','ModuloController');
    Route::resource('semestre','SemestreController');
    Route::resource('turno','TurnoController');

    // Mantenimiento matricula carrera tecnica
    Route::get('matriculas_ct/listaMatriculas',array('uses'=>'MatriculaCTController@listaMatriculas'));
    Route::get('matriculas_ct/registro',array('uses'=>'MatriculaCTController@index'));
    Route::get('matriculas_ct/edit/{cod}',array('uses'=>'MatriculaCTController@edit'));
    Route::post('matriculas_ct/update.html',array('uses'=>'MatriculaCTController@update'));
    Route::get('matriculas_ct/delete/{cod}',array('uses'=>'MatriculaCTController@delete'));
    Route::post('matriculas_ct/listaMatricula.html',array('uses'=>'MatriculaCTController@listacursosnuevosProcStore'));
    Route::get('matriculas_ct/matricular/{cod}',array('uses'=>'MatriculaCTController@registroMatricula'));
    Route::post('matriculas_ct/insert.html',array('uses'=>'MatriculaCTController@insert_matriculaCT'));
    Route::post('matriculas/test','MatriculaCTController@matriculatest');
    Route::get('matriculas_ct/listacursos',array('uses'=>'MatriculaCTController@listacursos'));
    Route::get('matriculas_ct/lista',array('uses'=>'MatriculaCTController@lista'));
    Route::get('matriculas_ct/add.html',array('uses'=>'MatriculaCTController@add'));
    Route::post('matriculas_ct/matricular_lista',array('uses'=>'MatriculaCTController@matricular_lista'));

    // MANTENIMIENTO MATRICULA CURSOS LIBRES
    Route::post('matriculas_cl/listarMatriculas.html',array('uses'=>'MatriculaCLController@listarMatriculasXcargaAcademica'));
    Route::get('matriculas_curso_libre',array('uses'=>'MatriculaCLController@index'));
    Route::get('matriculas_cl/lista_cursos',array('uses'=>'MatriculaCLController@listaCursosCLdisponibles'));
    Route::get('matriculas_cl/registrar/{cod}',array('uses'=>'MatriculaCLController@registrar'));
    Route::post('matriculas_cl/insert.html',array('uses'=>'MatriculaCLController@insert_test'));
    Route::get('matriculas_cl/delete/{cod}',array('uses'=>'MatriculaCLController@delete'));
    Route::get('matriculas_cl/edit/{cod}',array('uses'=>'MatriculaCLController@edit'));
    Route::post('matriculas_cl/update.html',array('uses'=>'MatriculaCLController@update'));
    Route::get('matriculas_cl/ingresar','MatriculaCLController@recibir');
    //***

    Route::get('matriculas_cl/add.html',array('uses'=>'MatriculaCLController@add'));

    //Modulo Cursos de Carrera Libre
    Route::get('CursosLibres/create.html','CursosCarreraLibreController@nuevo');
    Route::post('CursosLibres/insert.html','CursosCarreraLibreController@insertar');
    Route::get('CursosLibres/index.html','CursosCarreraLibreController@listar');

    Route::get('CursosLibres/updatecID/{id}','CursosCarreraLibreController@ActualizarConID');
    Route::post('CursosLibres/post_update.html',array('uses'=>'CursosCarreraLibreController@post_actualizar'));//->where('codCurso_cl','[0-9]+');

    Route::get('CursosLibres/delete.html','CursosCarreraLibreController@get_eliminar');
    Route::get('CursosLibres/post_delete/{id}','CursosCarreraLibreController@post_eliminar');
    Route::post('CursosLibres/eliminar.html','CursosCarreraLibreController@eliminando');
    Route::get('CursosLibres/changed.html','CursosCarreraLibreController@changed');

    //Modulo Cursos de Carrera Tecnica
    Route::get('CursosTecnica/create.html','CursosCarreraTecnicaController@nuevo');
    Route::post('CursosTecnica/insert.html','CursosCarreraTecnicaController@insertar');
    Route::get('CursosTecnica/index.html','CursosCarreraTecnicaController@listar');

    Route::get('CursosTecnica/updatecID/{id}',array('uses'=>'CursosCarreraTecnicaController@ActualizarConID'));
    Route::post('CursosTecnica/post_update.html',array('uses'=>'CursosCarreraTecnicaController@post_actualizar'));

    Route::get('CursosTecnica/delete.html','CursosCarreraTecnicaController@get_eliminar');
    Route::get('CursosTecnica/post_delete/{id}',array('uses'=>'CursosCarreraTecnicaController@post_eliminar'));
    Route::post('CursosTecnica/eliminar.html','CursosCarreraTecnicaController@eliminando');
    Route::get('CursosTecnica/listarCarrera.html','CursosCarreraTecnicaController@listarCarrera');
    Route::get('CursosTecnica/listarModulo.html','CursosCarreraTecnicaController@listarModulo');
    Route::get('CursosTecnica/listarAmbos.html','CursosCarreraTecnicaController@listarAmbos');

    
    //Modulo silabo de carrera libre

    // Listar cursos por docente
    

    Route::get('SilaboCarreraLibre/create/{id}','SilaboCarreraLibreController@nuevo');
    Route::get('SilaboCarreraLibre/index.html','SilaboCarreraLibreController@listar');
    Route::get('SilaboCarreraLibre/index/{id}','SilaboCarreraLibreController@listar');
    
    Route::post('SilaboCarreraLibre/insert.html','SilaboCarreraLibreController@insertar');

    Route::get('SilaboCarreraLibre/updatecID/{id}',array('uses'=>'SilaboCarreraLibreController@ActualizarConID'));
    Route::post('SilaboCarreraLibre/post_update.html',array('uses'=>'SilaboCarreraLibreController@post_actualizar'));
    Route::post('SilaboCarreraLibre/end.html',array('uses'=>'SilaboCarreraLibreController@post_finalizar'));

    Route::get('SilaboCarreraLibre/delete.html','SilaboCarreraLibreController@get_eliminar');
    Route::get('SilaboCarreraLibre/post_delete/{id}',array('uses'=>'SilaboCarreraLibreController@post_eliminar'));
    Route::post('SilaboCarreraLibre/eliminar.html','SilaboCarreraLibreController@eliminando');
    Route::get('SilaboCarreraLibre/detalle/{id}',array('uses'=>'SilaboCarreraLibreController@detalle'));


    //Modulo silabo de carrera tecnica

    // Listar cursos de carrera por docente
    

    Route::get('SilaboCarreraTecnica/create/{id}','SilaboCarreraTecnicaController@nuevo');
    Route::get('SilaboCarreraTecnica/index.html','SilaboCarreraTecnicaController@listar');
    Route::get('SilaboCarreraTecnica/index/{id}','SilaboCarreraTecnicaController@listar');
    
    Route::post('SilaboCarreraTecnica/insert.html','SilaboCarreraTecnicaController@insertar');

     Route::get('SilaboCarreraTecnica/updatecID/{id}',array('uses'=>'SilaboCarreraTecnicaController@ActualizarConID'));
    Route::post('SilaboCarreraTecnica/post_update.html',array('uses'=>'SilaboCarreraTecnicaController@post_actualizar'));

    Route::get('SilaboCarreraTecnica/delete.html','SilaboCarreraTecnicaController@get_eliminar');
    Route::get('SilaboCarreraTecnica/post_delete/{id}',array('uses'=>'SilaboCarreraTecnicaController@post_eliminar'));
    Route::post('SilaboCarreraTecnica/eliminar.html','SilaboCarreraTecnicaController@eliminando');
    Route::get('SilaboCarreraTecnica/detalle/{id}',array('uses'=>'SilaboCarreraTecnicaController@detalle'));
    Route::post('SilaboCarreraTecnica/end.html',array('uses'=>'SilaboCarreraTecnicaController@post_finalizar'));

    Route::get('CursosTecnica/post_delete/',array('uses'=>'CursosCarreraTecnicaController@post_eliminar'));

    // carga academica
    Route::get('crearCargaCt','CargaControllerCt@CargarIndexCargaCt');
    Route::post('recogerDatos','CargaControllerCt@AgregarDatos');
    Route::get('eliminarCarga/{id}', 'CargaControllerCt@eliminarElementoCarga');
    Route::get('crearCargaCl','CargaControllerCl@CargarIndexCargaCl');
    Route::post('recogerDatosCl','CargaControllerCl@AgregarDatos');
    Route::get('mostrarDatos','CargaControllerCt@MostrarDatos');
    Route::get('eliminarCarga/{id}', 'CargaControllerCt@eliminarElementoCarga');
    Route::post('mostrarHorariosPorAula','CargaControllerCt@MostrarHorariosPorAula');
    Route::get('MostrarOpcionesPorAula','CargaControllerCt@MostrarOpcionesPorAula');
    Route::post('MostrarHorariosPorDocente', 'CargaControllerCt@MostrarHorariosPorDocente');
    Route::get('MostrarOpcionesDocente', 'CargaControllerCt@MostrarOpcionesDocente');
    Route::post('mostrarHorariosPorCurso', 'CargaControllerCt@MostrarHorariosPorCurso');
    Route::get('MostrarOpcionesPorCurso', 'CargaControllerCt@MostrarOpcionesPorCurso');


    

    //Pago en planilla docentes
    Route::get('Planilla',array('uses'=>'PlanillaController@index'));
    Route::get('Planilla/detalle_Planilla/{id}',array('uses'=>'PlanillaController@detalle_Planilla'))->where('id','[0-9]+');
    //Carrera Profesional
    Route::get('CarreraProfesional',array('uses'=>'CarreraProfesionalController@index'));
    Route::get('CarreraProfesional/add.html',array('uses'=>'CarreraProfesionalController@add'));
    Route::post('CarreraProfesional/post_update.html',array('uses'=>'CarreraProfesionalController@post_actualizar'));
    Route::get('CarreraProfesional/updatecID/{id}',array('uses'=>'CarreraProfesionalController@ActualizarConID'));
    Route::post('CarreraProfesional/update/{id}',array('uses'=>'CarreraProfesionalController@update'));
    Route::post('CarreraProfesional/insert.html',array('uses'=>'CarreraProfesionalController@insert'));
    Route::post('CarreraProfesional/delete',array('uses'=>'CarreraProfesionalController@eliminando'));
    Route::get('CarreraProfesional/profile/{id}',array('uses'=>'CarreraProfesionalController@profile'));
    Route::get('CarreraProfesional/post_eliminar/{id}',array('uses'=>'CarreraProfesionalController@post_eliminar'));
    //Aula
    Route::get('Aula',array('uses'=>'AulaController@index'));
    Route::get('Aula/add.html',array('uses'=>'AulaController@add'));
    Route::post('Aula/post_update.html',array('uses'=>'AulaController@post_actualizar'));
    Route::get('Aula/updatecID/{id}',array('uses'=>'AulaController@ActualizarConID'));
    Route::post('Aula/update/{id}',array('uses'=>'AulaController@update'));
    Route::post('Aula/insert.html',array('uses'=>'AulaController@insert'));
    Route::post('Aula/delete',array('uses'=>'AulaController@eliminando'));
    Route::get('Aula/profile/{id}',array('uses'=>'AulaController@profile'));
    Route::get('Aula/post_eliminar/{id}',array('uses'=>'AulaController@post_eliminar'));



});
