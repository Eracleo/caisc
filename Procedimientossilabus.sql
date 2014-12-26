
--  Creando Procedimiento almacenado  para silabo de curso Libres

DELIMITER $$

create procedure ListarCursosPorDocente (in idDocente int )
begin
      select A.CodCargaAcademica_cl ,C.id,C.nombre
      from carga_academica_cl A inner join curso_cl C
      on A.codCurso_cl = C.id
      where A.docente_id=idDocente and A.estado=1;
end$$

-- Creando Procedimiento almacenado para silabo de cursos Tecnicos
DELIMITER $$
create procedure ListarCursosPorDocenteCT (in idDocente int )
begin
      select A.CodCargaAcademica_ct ,C.id,C.nombre, A.semestre,A.turno
      from carga_academica_ct A inner join curso_ct C
      on A.codCurso_ct = C.id
      where A.docente_id=idDocente and A.estado=1;

end$$


--=============== Procedimiento texchanged para listar =====================================

CREATE DEFINER=`root`@`localhost` PROCEDURE `TextChangedCT`(IN `texto` VARCHAR(30))
begin
      select *
      from curso_ct c where SUBSTRING(c.nombre, 1, LENGTH(texto)) = texto and c.estado=1;
      
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TextChangedCL`(IN `texto` VARCHAR(30))
begin
      select *
      from curso_cl c where SUBSTRING(c.nombre, 1, LENGTH(texto)) = texto and c.estado=1;
      
end$$
