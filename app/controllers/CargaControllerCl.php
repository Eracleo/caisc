<?php
class CargaControllerCl extends \BaseController {

	public function CargarIndexCarga(){
		return View::make('vistaCarga.indexCarga');
	}
	public function CargarIndexCargaCl(){

		$elementosComboCodCurso_cl = CursoLibre::all()->lists('nombre','id');
		$elementosComboCodDocente = Docente::all()->lists('nombre','id');
		$elementosComboTurno = Turno::all()->lists('nombre','id');
		$elementosComboGrupo = Grupo::all()->lists('nombre','id');
		$elementosComboSemestre = Semestre::all()->lists('nombre','id');
		$elementosComboCodAula = Aula::all()->lists('codAula','codAula');
		
		return View::make('vistaCarga.crearCargaCl',array(
			'varElementosComboCursos'=>$elementosComboCodCurso_cl,
			'varElementosComboIdDocentes'=>$elementosComboCodDocente,
			'varElementosComboTurnos'=>$elementosComboTurno,
			'varElementosComboGrupos'=>$elementosComboGrupo,
			'varElementosComboSemestres'=>$elementosComboSemestre,
			'varElementosComboCodAula'=>$elementosComboCodAula,

			));
	}
	public function AgregarDatos(){
			    $codCursoCl=$_POST['cmbCodCursos'];
				$codDocente=$_POST['cmbIdDocentes'];
				$turno=$_POST['cmbTurnos'];
				$grupo=$_POST['cmbGrupos'];
				$semestre=$_POST['cmbSemestres'];
				$aula=$_POST['cmbAulas'];
				$estado=$_POST['cmbEstado'];
				$minimo=$_POST['txtMinimo'];

				// convertir 
				$varFechaInicio = Input::get('txtFechaInicio');
				$varFechaFin = Input::get('txtFechaFin');

				$auxInicio = date_create($varFechaInicio);
				$auxFin = date_create($varFechaFin);

				$fechaInicio = date_format($auxInicio, 'Y-m-d H:i:s');
				$fechaFin = date_format($auxFin, 'Y-m-d H:i:s');

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

		if ($minimo=="") {
			return Redirect::to('/crearCargaCl')->with('mensaje','ingresa un minimo');		 		
		} 
		else { if ($fechaInicio==$fechaFin) {
			return Redirect::to('/crearCargaCl')->with('mensaje','ingrese fecha correcta');		 			
		} else {
					if ((Input::get('rbHorariosLunes')==false)and(Input::get('rbHorariosMartes')==false)and(Input::get('rbHorariosMiercoles')==false)and(Input::get('rbHorariosJueves')==false)and(Input::get('rbHorariosViernes')==false)and(Input::get('rbHorariosSabado')==false)) {$restrictFinal=true;}

					if (Input::get('rbHorariosLunes')) {
						$horaLunes=$_POST['rbHorariosLunes'];
						$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaLunes,'lunes'));
						$obj = $validador[0];
					
							if ($obj->temp !== "Disponible") {
								$StringLunes="El lunes a las".$horaLunes." ";
								$restrict=true;
								$restrictFinal=true;
							   }
					}
					if (Input::get('rbHorariosMartes')) {
						$horaMartes=$_POST['rbHorariosMartes'];
						$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaMartes,'Martes'));
						$obj = $validador[0];
							if ($obj->temp !== "Disponible") {
								$StringMartes="El Martes a las".$horaMartes." ";
								$restrict=true;
								$restrictFinal=true;
							   }
					}
					if (Input::get('rbHorariosMiercoles')) {
						$horaMiercoles=$_POST['rbHorariosMiercoles'];
						$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaMiercoles,'Miercoles'));
						$obj = $validador[0];
					
							if ($obj->temp !== "Disponible") {
								$StringMiercoles="El Miercoles a las".$horaMiercoles.' ';
								$restrict=true;
								$restrictFinal=true;
						}
					}
					if (Input::get('rbHorariosJueves')) {
						$horaJueves=$_POST['rbHorariosJueves'];
						$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaJueves,'Jueves'));
						$obj = $validador[0];
						
							if ($obj->temp !== "Disponible") {
								$StringJueves="El Jueves a las ".$horaJueves.' ';
								$restrict=true;
								$restrictFinal=true;
							}
					} 
					if (Input::get('rbHorariosViernes')) {
						$horaViernes=$_POST['rbHorariosViernes'];
						$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaViernes,'Viernes'));
						$obj = $validador[0];
							if ($obj->temp !== "Disponible") {
								$StringViernes="El Viernes a las ".$horaViernes.' ';
								$restrict=false;
								$restrictFinal=true;
							}  
					} 
					if (Input::get('rbHorariosSabado')) {
						$horaSabado=$_POST['rbHorariosSabado'];
						$validador = DB::select('select validarCarga(?,?,?) as temp',array($aula,$horaSabado,'Sabado'));
						$obj = $validador[0];
						
							if ($obj->temp !== "Disponible") {
								$StringSabado="El Sabado a las ".$horaSabado.' ';
								$restrict=true;
								$restrictFinal=true;
							}
					} 
				

				if ($restrict==true) {
					return Redirect::to('/crearCargaCl')->with('mensaje',$StringLunes.''.$StringMartes.''.$StringMiercoles.''.$StringJueves.''.$StringViernes.''.$StringSabado. 'NO ESTA DISPONIBLE NO SE PUDO INSERTAR');		 	
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
					DB::select('call insertarCargaAcademica_cl(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)'
						    	,array($codCursoCl,$codDocente,$turno,$grupo,$semestre,
						    		   $fechaInicio,$fechaFin,$estado,$minimo,$aula,
						    		   $horaLunes,$diaLunes,$horaMartes,$diaMartes,$horaMiercoles,
						    		   $diaMiercoles,$horaJueves,$diaJueves,$horaViernes,$diaViernes,
						    		   $horaSabado,$diaSabado));	
			
				} else {
					return Redirect::to('/crearCargaCl')->with('mensaje',"ERROR INGRESA UN CAMPO CHECK");		 	
				}
					return Redirect::to('/crearCargaCl')->with('mensaje',"SE INSERTO EXITOSAMENTE");
			}
		}	
	}
	public $restful=true;
	
	public function MostrarDatos(){
		$elementosCarga = DB::table('tcargaacademica')->get();
	    return View::make('vistaCarga.datosRegistrados')->with('elementosCarga',$elementosCarga);
	}
	public function eliminarElementoCarga($id){
		// no disponible	
		$elemento = DB::delete('DELETE FROM tcargaacademica WHERE codCargaAcademica_ct = ? ', array($id) );
        if($elemento)
        {
            echo "elemento eliminado";
            //return Redirect::to('crud/show')->with(array('mensaje' => 'El post ha sido eliminado correctamente.'));
        }else{
            //return Redirect::to('crud/show')->with(array('mensaje' => "El post con id $id que intentas eliminar no existe."));
            echo "el elemento no se pudo eliminar";
        }
	}

}	

	