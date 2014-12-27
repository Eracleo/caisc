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


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarMatriculaCT`(alumno int ,carga int)
BEGIN
	SELECT id FROM matricula_ct WHERE codAlumno=alumno AND codCargaAcademica_ct=carga;
END


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarMatriculasCT`()
BEGIN
	select C1.id, C1.codAlumno, CONCAT(A.nombre,' ', A.apellidos) as alumno, C1.codCargaAcademica_ct, C3.nombre
	from matricula_ct C1
	inner join alumno A on C1.codAlumno = A.id
	inner join carga_academica_ct C2 on C1.codCargaAcademica_ct = C2.codCargaAcademica_ct
	inner join curso_ct C3 on C2.codCurso_ct = C3.id
	order by id;
END


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCursosFaltantesParaMatriculaCT`(alumno int, modulo int)
BEGIN
	DROP TABLE IF EXISTS F;
	DROP TABLE IF EXISTS G;
    DROP TABLE IF EXISTS H;
    
    -- lista de cargas academicas de un modulo
    create temporary table F
	select codCargaAcademica_ct as codig
	from carga_academica_ct T
	inner join curso_ct C on T.codCurso_ct = C.id and C.modulo = modulo
	inner join docente D on T.docente_id = D.id
	order by codCargaAcademica_ct;
	
    -- lista de cargas academicas matriculados por un alumno
	create temporary table G
	select codCargaAcademica_ct as codigo
	from matricula_ct
	where codAlumno = alumno;
    
    -- realizamos la diferencia entre las dos anteriores tablas
    create temporary table H
    select distinct codig from F where not exists(select codigo from G where F.codig = G.codigo);
    
    select R.codCargaAcademica_ct, R.codCurso_ct, S.nombre as curso, T.id as codDocente, concat(T.nombre,' ',T.apellidos) as docente, R.turno, R.grupo
    from carga_academica_ct R 
    inner join H on R.codCargaAcademica_ct = H.codig
    inner join curso_ct S on R.codCurso_ct = S.id
    inner join docente T on R.docente_id = T.id
    order by R.codCargaAcademica_ct;
END