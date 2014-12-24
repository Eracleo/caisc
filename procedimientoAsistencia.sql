 
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarAsistencia_CT`(codCargaAcademica varchar(10),tema varchar(10),docente_id int,codAlumno int,Fecha date, observacion varchar(30))
BEGIN
Declare codAsistencia int;
    insert into `asistencia_ct`(`codAsistencia_ct`,`codCargaAcademica_ct`,`docente_id`,`fecha`,`tema`,`codAlumno`, `Observacion`) 
    values(codAsistencia,codCargaAcademica,docente_id,Fecha,tema,codAlumno,observacion); 
    
END


DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Listar_Asistencias_fecha`(docente_id INT, Fecha date, Carga varchar(10))
BEGIN
    select A.id as "idAlumno", CONCAT(A.apellidos,  ' ', A.nombre) as "NombreCpt"
    from (alumno A inner join matricula_ct M on A.id = M.codAlumno inner join asistencia_ct Asis on M.codCargaAcademica_ct=Asis.codCargaAcademica_ct)
    where cg.docente_id = id_docente and Asis.fecha=Fecha and M.codCargaAcademica_ct = Carga;
END


DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AlumnoXCursoCT`(IN `codcargaAcademica` VARCHAR(20), Codigo varchar(10))
BEGIN
    select A.codAlumno as "idAlumno", CONCAT(A.apellidos,  ' ', A.nombre) as "NombreCpt"
    from alumno A inner join matricula_ct M on A.codAlumno = M.codAlumno
    where M.codCargaAcademica_ct = codcargaAcademica and  A.codAlumno=Codigo
    ORDER BY A.apellidos;
END

--Pago de planilla docente de carrera técnica
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Planilla_ct`(codDocente int)
BEGIN
    select ct.id as Codigo, ct.horas_academicas as horas, (SUM(ct.horas_academicas)*15)as Pago
    from (carga_academica_ct C inner join  docente D on C.docente_id=D.id) inner join curso_ct ct on C.codCurso_ct=ct.id
    where ct.estado=1 and D.id=codDocente and (C.semestre=(SELECT id FROM semestre order by id desc limit 1))
    group by ct.id, ct.horas_academicas;
    
END

---Total del pago de planilla carrera tecnica

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Planilla_ct_total`(codDocente int)
BEGIN
    select  (SUM(ct.horas_academicas)*15)as Pago
    from (carga_academica_ct C inner join  docente D on C.docente_id=D.id) inner join curso_ct ct on C.codCurso_ct=ct.id
    where ct.estado=1 and D.id=codDocente and (C.semestre=(SELECT id FROM semestre order by id desc limit 1));
    
END

--------------------------------------------------------------------------------------
--Pago de planilla docente de cursos Libres
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Planilla_cl`(codDocente int)
BEGIN
    select cl.id as Codigo, cl.horas_academicas, (SUM(cl.horas_academicas)*15)as Pago
    from (carga_academica_cl C inner join  docente D on C.docente_id=D.id) inner join curso_cl cl on C.codCurso_cl=cl.id
    where cl.estado=1 and (C.semestre=(SELECT id FROM semestre order by id desc limit 1)) and D.id=codDocente
    group by cl.id, cl.horas_academicas;
                                                                
END

--Totalde pago de planilla cursos libres
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Planilla_cl_total`(codDocente int)
BEGIN
    select (SUM(cl.horas_academicas)*15)as Pago
    from (carga_academica_cl C inner join  docente D on C.docente_id=D.id) inner join curso_cl cl on C.codCurso_cl=cl.id
    where cl.estado=1 and (C.semestre=(SELECT id FROM semestre order by id desc limit 1)) and D.id=codDocente;
    
    
END
