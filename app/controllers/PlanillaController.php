<?php

class PlanillaController extends BaseController
{
	public function index($registros=5)
	{
		$datos = Docente::paginate($registros);
		$docentes = Docente::all();
		return View::make('Planilla.index',compact("datos"),array('docentes'=>$docentes));
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

				$planilla=DB::select('call Planilla_ct(?)',array($id));
				$total=DB::select('call Planilla_ct_total(?)',array($id));

				$planilla_cl=DB::select('call Planilla_cl(?)',array($id));
				$total_cl=DB::select('call Planilla_cl_total(?)',array($id));

				return View::make('Planilla.detalle_Planilla',compact('docente', 'planilla','total','planilla_cl','total_cl'));
			} else {
				return Redirect::to('404.html');
			}
		}
	}


}