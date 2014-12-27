DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarMatriculaXCargaAcademic`(codigo int)
BEGIN
	select M.id, M.codAlumno as codigo, CONCAT(A.nombre,' ',A.apellidos) as alumno, M.codCargaAcademica_cl, F.nombre as curso
	from matricula_cl M
	inner join alumno A on M.codAlumno = A.id
	inner join carga_academica_cl C on M.codCargaAcademica_cl = C.codCargaAcademica_cl and M.codCargaAcademica_cl = codigo
	inner join curso_cl F on C.codCurso_cl = F.id
	order by id;
END


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_cursosCL_disponibles`()
BEGIN
	select C.codCargaAcademica_cl, C.codCurso_cl, C2.nombre as nom_curso, C.docente_id, CONCAT(D.nombre,' ',D.apellidos) as nom_docente, C.turno, C.grupo
    from carga_academica_cl C
    inner join curso_cl C2 on C.codCurso_cl = C2.id
    inner join docente D on C.docente_id = D.id
    order by C.codCargaAcademica_cl;
END


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_matriculas_curso_libre`()
BEGIN
	select M.id, M.codAlumno, CONCAT(A.nombre,' ',A.apellidos) as nom_alumno, M.codCargaAcademica_cl, D.codCurso_cl, C.nombre as nom_curso
	from matricula_cl M
	inner join alumno A on M.codAlumno = A.id
	inner join carga_academica_cl D on M.codCargaAcademica_cl = D.codCargaAcademica_cl
	inner join curso_cl C on D.codCurso_cl = C.id
	order by id;
END


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarMatricula`($alumno int ,$carga int)
BEGIN
	SELECT id FROM matricula_cl WHERE codAlumno=$alumno AND codCargaAcademica_cl=$carga;
END


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertMatriculaCL`(alumno int, carga int)
BEGIN
	INSERT INTO `matricula_cl`(`codAlumno`, `codCargaAcademica_cl`, `updated_at`, `created_at`) VALUES (alumno,carga,now(),now());
END