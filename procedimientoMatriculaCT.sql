DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCargaAcademicaCT`(modu int)
BEGIN
	select codCargaAcademica_ct, C.nombre as curso, CONCAT(D.nombre,' ',D.apellidos) as docente, T.turno, T.grupo
    from carga_academica_ct T
    inner join curso_ct C on T.codCurso_ct = C.id and C.modulo = modu
    inner join docente D on T.docente_id = D.id
    order by codCargaAcademica_ct;
END