<?php

class PlanillaController extends BaseController
{
	public function index($registros=5)
	{
		$datos = Docente::paginate($registros);
		$docentes = Docente::all();

		$semestres = Semestre::lists('nombre','id');
		//return View::make('matriculaCT.index', array('semestres'=>$semestres));

		return View::make('Planilla.index',compact('datos','semestres'),array('docentes'=>$docentes));
	}

	public function detalle_Planilla($id = null)
	{
		if (is_null($id) or ! is_numeric($id))
		{
			return Redirect::to('404.html');
		} else {
			$docente = Docente::where('id','=',$id)->firstOrFail();
			if (is_object($docente))
			{

				$Semestre=Input::get("semestre");

				$planilla=DB::select('call Planilla_ct(?,?)',array($id,$Semestre));
				$total=DB::select('call Planilla_ct_total(?,?)',array($id,$Semestre));

				$planilla_cl=DB::select('call Planilla_cl(?,?)',array($id,$Semestre));
				$total_cl=DB::select('call Planilla_cl_total(?,?)',array($id,$Semestre));

				return View::make('Planilla.detalle_Planilla',compact('docente', 'planilla','total','planilla_cl','total_cl'));
			} else {
				return Redirect::to('404.html');
			}
		}
	}


}