 
===============  Creando Procedimiento almacenado  para silabo de curso Libres =====================================
create procedure ListarCursosPorDocente (in idDocente int )
begin
      select A.CodCargaAcademica_cl ,C.id,C.nombre
      from carga_academica_cl A inner join curso_cl C
      on A.codCurso_cl = C.id
      where A.docente_id=idDocente and A.estado=1;
end$$
===============  Creando Procedimiento almacenado para silabo de cursos Tecnicos =====================================
create procedure ListarCursosPorDocenteCT (in idDocente int )
begin
      select A.CodCargaAcademica_ct ,C.id,C.nombre
      from carga_academica_ct A inner join curso_ct C
      on A.codCurso_ct = C.id
      where A.docente_id=idDocente and A.estado=1;

end$$

