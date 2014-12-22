<?php
class CargaControllerCt extends \BaseController {
	
	public function CargarIndexCargaCt(){

		$elementosComboCodCurso_ct = CursoTecnico::all()->lists('nombre','id');
		$elementosComboCodDocente = Docente::all()->lists('nombre','id');
		$elementosComboSemestre = Semestre::all()->lists('nombre','id');
		$elementosComboTurno = Turno::all()->lists('nombre','id');
		$elementosComboGrupo = Grupo::all()->lists('id','id');
		$elementosComboCodAula = Aula::all()->lists('codAula','codAula');
		
		return View::make('vistaCarga.crearCargaCt',array(
			'varElementosComboSemestre'=>$elementosComboSemestre,
			'varElementosComboCodCurso_ct'=>$elementosComboCodCurso_ct,
			'varElementosComboCodDocente'=>$elementosComboCodDocente,
			'varElementosComboCodAula'=>$elementosComboCodAula,
			'varElementosComboTurno'=>$elementosComboTurno,
			'varElementosComboGrupo'=>$elementosComboGrupo,
		));
	}
	public function AgregarDatos(){
	
		$codCurso_ct= $_POST['cmbCursos'];
		$docente_id=$_POST['cmbDocentes'];
		$semestre = $_POST['cmbSemestre'];
		$turno=$_POST['cmbTurnos'];
		$grupo=$_POST['cmbGrupos'];
		$aula=$_POST['cmbAulas'];
		
		global $horaLunes;
		global $horaMartes;
		global $horaMiercoles;
		global $horaJueves;
		global $horaViernes;
		global $horaSabado;
		
		$StringLunes="";
		$StringMartes="";
		$StringMiercoles="";
		$StringJueves="";
		$StringViernes="";
		$StringSabado="";

		$diaLunes="";
		$diaMartes="";
		$diaMiercoles="";
		$diaJueves="";
		$diaViernes="";
		$diaSabado="";
		
		$restrict=false;
		$restrictFinal=false;

		if ((Input::get('rbHorariosLunes')==false)and(Input::get('rbHorariosMartes')==false)and(Input::get('rbHorariosMiercoles')==false)and(Input::get('rbHorariosJueves')==false)and(Input::get('rbHorariosViernes')==false)and(Input::get('rbHorariosSabado')==false)) {$restrictFinal=true;}
		
		if (Input::get('rbHorariosLunes')) {
			$horaLunes=$_POST['rbHorariosLunes'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaLunes,'lunes'));
			$obj = $validador[0];
			
				if ($obj->temp !== "Disponible") {
					$restrict=true;
					$restrictFinal=true;
					$StringLunes="El lunes a las".$horaLunes." ";
				
			}
		} 
		if (Input::get('rbHorariosMartes')) {
		   $horaMartes=$_POST['rbHorariosMartes'];
		   $validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaMartes,'martes'));
		   $obj = $validador[0];
			
				if ($obj->temp !== "Disponible") {
					$restrict=true;
					$restrictFinal=true;
					$StringMartes="El Martes a las".$horaMartes." ";
					
			
			}
		} 
		if (Input::get('rbHorariosMiercoles')) {
			$horaMiercoles=$_POST['rbHorariosMiercoles'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaMiercoles,'miercoles'));
			$obj = $validador[0];
			
				if ($obj->temp !== "Disponible") {
					$restrict=true;
					$restrictFinal=true;
					$StringMiercoles="El Miercoles a las".$horaMiercoles.' ';
					
			
			}
		} 
		if (Input::get('rbHorariosJueves')) {
			$horaJueves=$_POST['rbHorariosJueves'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaJueves,'jueves'));
			$obj = $validador[0];
			
				if ($obj->temp !== "Disponible") {
					$restrict=true;
					$restrictFinal=true;
					$StringJueves="El Jueves a las ".$horaJueves.' ';
					
			
			}
		} 
		if (Input::get('rbHorariosViernes')) {
			$horaViernes=$_POST['rbHorariosViernes'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaViernes,'viernes'));
			$obj = $validador[0];
			
				if ($obj->temp !== "Disponible") {
					$restrict=true;
					$restrictFinal=true;
					$StringViernes="El Viernes a las ".$horaViernes.' ';
					
			
			}
		} 
		if (Input::get('rbHorariosSabado')) {
			$horaSabado=$_POST['rbHorariosSabado'];
			$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaSabado,'sabado'));
			$obj = $validador[0];
			
				if ($obj->temp !== "Disponible") {
					$restrict=true;
					$restrictFinal=true;
					$StringSabado="El Sabado a las ".$horaSabado.' ';
					
					
			}
		}
		if ($restrict==true) {
			return Redirect::to('/crearCargaCt')->with('mensaje',$StringLunes.''.$StringMartes.''.$StringMiercoles.''.$StringJueves.''.$StringViernes.''.$StringSabado. 'no se puede insertar');		 	
		} 
		if ($restrict==false and $restrictFinal ==false) {
			if (Input::get('rbHorariosLunes')) {
			    $StringLunes="Lunes de ".$horaLunes.' ';	
			    $diaLunes="x";
			} 
			if (Input::get('rbHorariosMartes')) {
			    $StringMartes="Martes de ".$horaMartes.' ';	
			    $diaMartes="x";
			} 
			if (Input::get('rbHorariosMiercoles')) {
			    $StringMiercoles="Miercoles de ".$horaMiercoles.' ';	
			    $diaMiercoles="x";
			} 
			if (Input::get('rbHorariosJueves')) {
				$StringJueves="Jueves de ".$horaJueves.' ';	
			    $diaJueves="x";
			} 
			if (Input::get('rbHorariosViernes')) {
				$StringViernes="Viernes de ".$horaViernes.' ';	
				$diaViernes="x";
			} 
			if (Input::get('rbHorariosSabado')) {
				$StringSabado="Sabado de ".$horaSabado.' ';	
				$diaSabado="x";
			}
			DB::select('call insertarCargaAcademica_ct(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
			array($codCurso_ct,$docente_id,$semestre,$turno,$grupo,$aula,
				  $horaLunes,$diaLunes,$horaMartes,$diaMartes,$horaMiercoles,
				  $diaMiercoles,$horaJueves,$diaJueves,$horaViernes,$diaViernes,
				  $horaSabado,$diaSabado));
			
		} else {
			return Redirect::to('/crearCargaCt')->with('mensaje',"ERROR INGRESA UN CAMPO CHECK");		 	
		}
			return Redirect::to('/crearCargaCt')->with('mensaje',$StringLunes.''.$StringMartes.''.$StringMiercoles.''.$StringJueves.''.$StringViernes.''.$StringSabado."se inserto correctamente");		 	
	}
	public $restful=true;
	
	public function eliminarElementoCarga($id){
			
		$elemento = DB::delete('DELETE FROM carga_academica_ct WHERE codCargaAcademica_ct = ? ', array($id) );
        if($elemento)
        {
            echo "elemento eliminado";
        }else{
            echo "el elemento no se pudo eliminar";
        }
	}
	public function MostrarOpcionesPorAula(){

		$elementosComboSemestre = Semestre::all()->lists('nombre','id');
		return View::make('vistaCarga.opcionesPorAula',array(
			'varElementosComboSemestre'=>$elementosComboSemestre,
			));
	}
	
	public function MostrarHorariosPorAula(){
		$elementosComboSemestre = Semestre::all()->lists('nombre','id');
		$semestre = $_POST['comboSemestres'];
		$dia=$_POST['comboDias'];
		//$elementosHorario = DB::select('SELECT * FROM carga_academica_ct WHERE 1');
		$elementosHorario = DB::select('call HorarioCargaAcademica(?,?)',array($semestre,$dia));		
		return View::make('vistaCarga.horarioPorAula',array(
			'varElementosComboSemestre'=>$elementosComboSemestre,
			))->with('elementosHorario',$elementosHorario);
	}

	public function MostrarOpcionesDocente(){

		$elementosComboDocente = Docente::orderBy('id','DESC')->get();
		$elementosComboSemestre = Semestre::all()->lists('nombre','id');
		$elementosComboApellido = Docente::all()->lists('apellidos','id');

		return View::make('vistaCarga.opcionesPorDocente',array(
			'varElementosComboSemestre'=>$elementosComboSemestre,
			'varElementosComboDocente'=>$elementosComboDocente,
			'varElementosComboApellido'=>$elementosComboApellido,
			));
	}
	
	public function MostrarHorariosPorDocente(){
		$elementosComboDocente = Docente::orderBy('id','DESC')->get();
		$elementosComboSemestre = Semestre::all()->lists('nombre','id');
		$elementosComboApellido = Docente::all()->lists('apellidos','id');

		$semestre = $_POST['comboSemestre'];
		$nombreCompleto = $_POST['nombreCompleto'];
		$HorarioPorDocente = DB::select('call HorarioXDocente(?,?)',array($semestre,$nombreCompleto));		

		return View::make('vistaCarga.horarioPorDocente',array(
			'varElementosComboSemestre'=>$elementosComboSemestre,
			'varElementosComboDocente'=>$elementosComboDocente,
			'varElementosComboApellido'=>$elementosComboApellido,
			))->with('HorarioPorDocente',$HorarioPorDocente);
	}
	public function MostrarOpcionesPorCurso(){

		$elementosComboSemestre = Semestre::all()->lists('nombre','id');
		$elementosComboCodCurso_ct = CursoTecnico::all()->lists('nombre','nombre');
		
		return View::make('vistaCarga.opcionesPorCurso',array(
			'varElementosComboSemestre'=>$elementosComboSemestre,
			'varElementosComboCodCurso_ct'=>$elementosComboCodCurso_ct,
			));
	}
	
	public function MostrarHorariosPorCurso(){
		$elementosComboSemestre = Semestre::all()->lists('nombre','id');
		$elementosComboCodCurso_ct = CursoTecnico::all()->lists('nombre','nombre');

		$semestre = $_POST['comboSemestres'];
		$codCurso_ct = $_POST['comboCursos'];

     	$HorarioPorCurso = DB::select('call HorarioXCurso(?,?)',array($semestre,$codCurso_ct));		
		return View::make('vistaCarga.horarioPorCurso',array(
			'varElementosComboSemestre'=>$elementosComboSemestre,
			'varElementosComboCodCurso_ct'=>$elementosComboCodCurso_ct,
			))->with('HorarioPorCurso',$HorarioPorCurso);
	}
//INTEGRANTES : Erik hammer   : controladores
//				Fahed hermoza : procedimientos
//				Jhon zea      : vistas y validaciones
//				Frank johan   : vistas y reportes 
//              grupo 2B   
}