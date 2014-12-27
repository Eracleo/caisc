DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCargaAcademicaCT`(modu int)
BEGIN
	select codCargaAcademica_ct, C.nombre as curso, CONCAT(D.nombre,' ',D.apellidos) as docente, T.turno, T.grupo
    from carga_academica_ct T
    inner join curso_ct C on T.codCurso_ct = C.id and C.modulo = modu
    inner join docente D on T.docente_id = D.id
    order by codCargaAcademica_ct;
END


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertMatriculaCT`(codAlumno int, codCarga int)
BEGIN
	INSERT INTO `matricula_ct`(`codAlumno`, `codCargaAcademica_ct`, `updated_at`, `created_at`) VALUES (codAlumno,codCarga,now(),now());
END


DELIMITER
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarMatriculaCT`(alumno int ,carga int)
BEGIN
	SELECT id FROM matricula_ct WHERE codAlumno=alumno AND codCargaAcademica_ct=carga;
END