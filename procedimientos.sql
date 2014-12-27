-- Cambiar definer : 'root por usuario asignado' @ 'localhost por tu servidor o ip del servidor'
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCargaAcademica_ct`()
BEGIN
    select c.codCargaAcademica_ct,dia,horaInicio,horaFin,d1.nombre as "NombreDocente",d1.apellidos as "ApellidoDocente",codAula,cct1.nombre as "curso",grupo,c.semestre
    from (((horario_aula h inner join carga_academica_ct c
    on h.codCargaAcademica_ct = c.codCargaAcademica_ct) inner join
    horario h1 on h.Horario = h1.codHorario) inner join curso_ct cct1 on c.codCurso_ct = cct1.codCurso_ct) inner join docente d1 on c.docente_id= d1.id;
END$$

-- Cambiar definer : 'root por usuario asignado' @ 'localhost por tu servidor o ip del servidor'
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCargaAcademica_cl`()
BEGIN
    select c.codCargaAcademica_cl,h.dia,h1.horaInicio,h1.horaFin,ccl_1.nombre as "Nombre Curso",ccl_1.horas_academicas as "Horas Academicas",d.nombre as "Nombre Docente",d.apellidos as "Apellidos Docente",c.grupo,c.turno,c.fecha_inicio,c.fecha_fin,c.estado,c.minimo
    from (((horario_aula h inner join carga_academica_cl c
    on h.codCargaAcademica_cl = c.codCargaAcademica_cl) inner join
    curso_cl ccl_1 on c.codcurso_cl=ccl_1.codcurso_cl) inner join
    docente d on c.docente_id=d.id) inner join
    horario h1 on c.codHorarioAula=h1.codHorario ;
END$$
-- --------------------------------------------------------------------------------
-- Routine DDL
DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `validarCarga`(codAulaBuscar varchar(10),horarioBuscar varchar(10),diaBuscar varchar(10)) RETURNS varchar(50) CHARSET latin1
BEGIN
    Declare Devolver varchar(50);
    select CONCAT(codAula,'-',horario,'-',dia,' ERROR') into Devolver
    from horario_aula
    where codAula=codAulaBuscar and horario=horarioBuscar and dia=diaBuscar;
    set Devolver=ifnull(Devolver,"Disponible");
RETURN Devolver;
END$$
-- aqui
-- --------------------------------------------------------------------------------
-- Routine DDL
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarCargaAcademica_cl`(codCurso_clI varchar(10),
docente_idI int,turnoI varchar(10),grupoI int,semestreI varchar(10),fecha_inicioI date,fecha_finI date,estadoI bit,minimoI int,codAulaI varchar(10),horarioLunesI varchar(10),LunesI varchar(1),horarioMartesI varchar(10),MartesI varchar(1),horarioMiercolesI varchar(10),MiercolesI varchar(1),horarioJuevesI varchar(10),JuevesI varchar(1),horarioViernesI varchar(10),ViernesI varchar(1),horarioSabadoI varchar(10),SabadoI varchar(1))
BEGIN
    Declare codCargaAcademica_clI varchar(10);
    Declare aleartorio int;
    select 10+(RAND() * 1000) into aleartorio;
    select Date_format(now(),'%m%d%H%i%s')+aleartorio into codCargaAcademica_clI;
    INSERT INTO `carga_academica_cl`(`codCargaAcademica_cl`, `codCurso_cl`, `docente_id`, `turno`, `grupo`, `semestre`, `fecha_inicio`, `fecha_fin`, `estado`, `minimo`) VALUES (codCargaAcademica_clI,codCurso_clI,docente_idI,turnoI,grupoI,semestreI,fecha_inicioI,fecha_finI,estadoI,minimoI);

    if(LunesI="x")
    then
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioLunesI,"Lunes",null,codCargaAcademica_clI);
    end if;

    if(MartesI="x")
    then
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioMartesI,"Martes",null,codCargaAcademica_clI);
    end if;

    if(MiercolesI="x")
    then
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioMiercolesI,"Miercoles",null,codCargaAcademica_clI);
   end if;

    if(JuevesI="x")
    then
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioJuevesI,"Jueves",null,codCargaAcademica_clI);
    end if;

    if(ViernesI="x")
    then
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioViernesI,"Viernes",null,codCargaAcademica_clI);
    end if;

    if(SabadoI="x")
    then
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioSabadoI,"Sabado",null,codCargaAcademica_clI);
    end if;

END$$

-- --------------------------------------------------------------------------------
-- Routine DDL
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarCargaAcademica_ct`(codCurso_ctI varchar(10),docente_idI int,semestreI varchar(10),turnoI varchar(10),grupoI int,codAulaI varchar(10),horarioLunesI varchar(10),LunesI varchar(1),horarioMartesI varchar(10),MartesI varchar(1),horarioMiercolesI varchar(10),MiercolesI varchar(1),horarioJuevesI varchar(10),JuevesI varchar(1),horarioViernesI varchar(10),ViernesI varchar(1),horarioSabadoI varchar(10),SabadoI varchar(1))
BEGIN
    Declare codCargaAcademica_ctI varchar(10);
    Declare aleartorio int;
    select 10+(RAND() * 1000) into aleartorio;
    select Date_format(now(),'%m%d%H%i%s')+aleartorio into codCargaAcademica_ctI;
    INSERT INTO `carga_academica_ct`(`codCargaAcademica_ct`, `codCurso_ct`, `docente_id`, `semestre`, `turno`, `grupo`) VALUES (codCargaAcademica_ctI,codCurso_ctI,docente_idI,semestreI,turnoI,grupoI);

    if(LunesI="x")
    then
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioLunesI,"Lunes",codCargaAcademica_ctI,null);
    end if;

    if(MartesI="x")
    then
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioMartesI,"Martes",codCargaAcademica_ctI,null);
    end if;

    if(MiercolesI="x")
    then
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioMiercolesI,"Miercoles",codCargaAcademica_ctI,null);
    end if;

    if(JuevesI="x")
    then
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioJuevesI,"Jueves",codCargaAcademica_ctI,null);
    end if;

    if(ViernesI="x")
    then
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioViernesI,"Viernes",codCargaAcademica_ctI,null);
    end if;

    if(SabadoI="x")
    then
    INSERT INTO `horario_aula`(`codAula`, `horario`, `dia`, `codCargaAcademica_ct`, `codCargaAcademica_cl`) VALUES (codAulaI ,horarioSabadoI,"Sabado",codCargaAcademica_ctI,null);
    end if;
END
$$
-- --------------------------------------------------------------------------------
-- --------------------------------------------------------------------------------
-- Routine DDL
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HorarioCargaAcademica`(semestreCA varchar(10),diaCA varchar(10))
BEGIN
    DROP TABLE IF EXISTS AuxCtCA;
    DROP TABLE IF EXISTS AuxCt2CA;
    DROP TABLE IF EXISTS AuxClCA;
    DROP TABLE IF EXISTS AuxCl2CA;
    DROP TABLE IF EXISTS AuxCargaAcademicaCA;
    DROP TABLE IF EXISTS horarioAula;


    create temporary table AuxCtCA
    select h1.codAula,h1.horario,h1.dia,ca1.docente_id
    from horario_aula h1 inner join carga_academica_ct ca1
    on h1.codCargaAcademica_ct=ca1.codCargaAcademica_ct
    where ca1.semestre=semestreCA;

    create temporary table AuxCt2CA
    select A1.codAula,A1.horario,A1.dia,CONCAT(d1.nombre,' ',d1.apellidos) as nombres
    from AuxCtCA A1 inner join docente d1
    on A1.docente_id=d1.id;

    create temporary table AuxClCA
    select h1.codAula,h1.horario,h1.dia,ca2.docente_id
    from horario_aula h1 inner join carga_academica_cl ca2
    on h1.codCargaAcademica_cl=ca2.codCargaAcademica_cl
    where ca2.semestre=semestreCA;

    create temporary table AuxCl2CA
    select A1.codAula,A1.horario,A1.dia,CONCAT(d1.nombre,' ',d1.apellidos) as nombres
    from AuxClCA A1 inner join docente d1
    on A1.docente_id=d1.id;

    create temporary table AuxCargaAcademicaCA
    select * from AuxCt2CA
    UNION ALL
    select * from AuxCl2CA;

    create temporary table horarioAula
    select horario,
     case when car1.codAula = 'A101'  then car1.nombres else '' end as "Aula101",
     case when car1.codAula = 'A102'  then car1.nombres else '' end as "Aula102",
     case when car1.codAula = 'A103'  then car1.nombres else '' end as "Aula103",
     case when car1.codAula = 'A104'  then car1.nombres else '' end as "Aula104",
     case when car1.codAula = 'A105'  then car1.nombres else '' end as "Aula105",
     case when car1.codAula = 'A106'  then car1.nombres else '' end as "Aula106",
     case when car1.codAula = 'A107'  then car1.nombres else '' end as "Aula107",
     case when car1.codAula = 'A108'  then car1.nombres else '' end as "Aula108",
     case when car1.codAula = 'A109'  then car1.nombres else '' end as "Aula109",
     case when car1.codAula = 'A110'  then car1.nombres else '' end as "Aula110"
    from AuxCargaAcademicaCA car1
    where dia=diaCA
    order by horario DESC;

    select horario,MAX(Aula101) as "Aula101",MAX(Aula102) as "Aula102",MAX(Aula103) as "Aula103",MAX(Aula104) as "Aula104",MAX(Aula105) as "Aula105",MAX(Aula106) as "Aula106",MAX(Aula107) as "Aula107",MAX(Aula108) as "Aula108",MAX(Aula109) as "Aula109",MAX(Aula110) as "Aula110"
    from horarioAula
    group by horario;
END$$

-- --------------------------------------------------------------------------------
-- Routine DDL
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HorarioXDocente`(semestreCA varchar(10),nombreCA varchar(50))
BEGIN
    DROP TABLE IF EXISTS AuxCtCA;
    DROP TABLE IF EXISTS AuxCt2CA;
    DROP TABLE IF EXISTS AuxClCA;
    DROP TABLE IF EXISTS AuxCl2CA;
    DROP TABLE IF EXISTS AuxCargaAcademicaCA;
    DROP TABLE IF EXISTS horario;


    create temporary table AuxCtCA
    select h1.codAula,h1.horario,h1.dia,ca1.docente_id
    from horario_aula h1 inner join carga_academica_ct ca1
    on h1.codCargaAcademica_ct=ca1.codCargaAcademica_ct
    where ca1.semestre=semestreCA;

    create temporary table AuxCt2CA
    select A1.codAula,A1.horario,A1.dia,CONCAT(d1.nombre,' ',d1.apellidos) as nombres
    from AuxCtCA A1 inner join docente d1
    on A1.docente_id=d1.id;

    create temporary table AuxClCA
    select h1.codAula,h1.horario,h1.dia,ca2.docente_id
    from horario_aula h1 inner join carga_academica_cl ca2
    on h1.codCargaAcademica_cl=ca2.codCargaAcademica_cl
    where ca2.semestre=semestreCA;

    create temporary table AuxCl2CA
    select A1.codAula,A1.horario,A1.dia,CONCAT(d1.nombre,' ',d1.apellidos) as nombres
    from AuxClCA A1 inner join docente d1
    on A1.docente_id=d1.id;

    create temporary table AuxCargaAcademicaCA
    select * from AuxCt2CA
    UNION ALL
    select * from AuxCl2CA;


    create temporary table horario
    select distinct horario,
     case when car1.dia = 'Lunes'  then car1.codAula else '' end as "Lunes",
     case when car1.dia = 'Martes'  then car1.codAula else '' end as "Martes",
     case when car1.dia = 'Miercoles'  then car1.codAula else '' end as "Miercoles",
     case when car1.dia = 'Jueves'  then car1.codAula else '' end as "Jueves",
     case when car1.dia = 'Viernes'  then car1.codAula else '' end as "Viernes",
     case when car1.dia = 'Sabado'  then car1.codAula else '' end as "Sabado"
    from AuxCargaAcademicaCA car1
    where nombres=nombreCA
    order by horario DESC;

    select horario,MAX(Lunes) as "Lunes",MAX(Martes) as "Martes",MAX(Miercoles) as "Miercoles",MAX(Jueves) as "Jueves",MAX(Viernes) as "Viernes",MAX(Sabado) as "Sabado"
    from horario
    group by horario;


END$$

-- --------------------------------------------------------------------------------
-- Routine DDL
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HorarioXCurso`(semestreCA varchar(10),cursoCA varchar(50))
BEGIN
    DROP TABLE IF EXISTS AuxCtCA;
    DROP TABLE IF EXISTS AuxCt2CA;
    DROP TABLE IF EXISTS AuxClCA;
    DROP TABLE IF EXISTS AuxCl2CA;
    DROP TABLE IF EXISTS AuxCargaAcademicaCA;
    DROP TABLE IF EXISTS horarioCurso;


    create temporary table AuxCtCA
    select h1.codAula,h1.horario,h1.dia,ca1.codCurso_ct
    from horario_aula h1 inner join carga_academica_ct ca1
    on h1.codCargaAcademica_ct=ca1.codCargaAcademica_ct
    where ca1.semestre=semestreCA;

    create temporary table AuxCt2CA
    select A1.codAula,A1.horario,A1.dia,d1.nombre
    from AuxCtCA A1 inner join curso_ct d1
    on A1.codCurso_ct=d1.id;

    create temporary table AuxClCA
    select h1.codAula,h1.horario,h1.dia,ca2.codCurso_cl
    from horario_aula h1 inner join carga_academica_cl ca2
    on h1.codCargaAcademica_cl=ca2.codCargaAcademica_cl
    where ca2.semestre=semestreCA;

    create temporary table AuxCl2CA
    select A1.codAula,A1.horario,A1.dia,d1.nombre
    from AuxClCA A1 inner join curso_ct d1
    on A1.codCurso_cl=d1.id;

    create temporary table AuxCargaAcademicaCA
    select * from AuxCt2CA
    UNION ALL
    select * from AuxCl2CA;

    create temporary table horarioCurso
    select distinct horario,
     case when car1.dia = 'Lunes'  then car1.codAula else '' end as "Lunes",
     case when car1.dia = 'Martes'  then car1.codAula else '' end as "Martes",
     case when car1.dia = 'Miercoles'  then car1.codAula else '' end as "Miercoles",
     case when car1.dia = 'Jueves'  then car1.codAula else '' end as "Jueves",
     case when car1.dia = 'Viernes'  then car1.codAula else '' end as "Viernes",
     case when car1.dia = 'Sabado'  then car1.codAula else '' end as "Sabado"
    from AuxCargaAcademicaCA car1
    where nombre=cursoCA
    order by horario DESC;

    select horario,MAX(Lunes) as "Lunes",MAX(Martes) as "Martes",MAX(Miercoles) as "Miercoles",MAX(Jueves) as "Jueves",MAX(Viernes) as "Viernes",MAX(Sabado) as "Sabado"
    from horarioCurso
    group by horario;

END$$


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


-- Procedimiento texchanged para listar
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `TextChangedCT`(IN `texto` VARCHAR(30))
begin
      select *
      from curso_ct c where SUBSTRING(c.nombre, 1, LENGTH(texto)) = texto and c.estado=1;

end$$

-- Procedimiento TextChangedCL
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `TextChangedCL`(IN `texto` VARCHAR(30))
begin
      select *
      from curso_cl c where SUBSTRING(c.nombre, 1, LENGTH(texto)) = texto and c.estado=1;

end$$
-- end
-- begin
-- procedimientos ingreso de notras
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AlumnosXCursoCT`(IN `codcargaAcademica` VARCHAR(20))
BEGIN
    select N.id as idNota, A.id as "idAlumno", CONCAT(A.apellidos,  ' ', A.nombre) as "NombreCpt", N.notaa as "Nota1", N.notab as "Nota2", N.notac as "Nota3"
    from (alumno A inner join matricula_ct M on A.id = M.codAlumno) inner join nota_ct N on N.codMatricula_ct = M.id
    where M.codCargaAcademica_ct = codcargaAcademica
    ORDER BY A.apellidos;
END$$

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CursosXDocenteCT`(IN `id_docente` INT)
    NO SQL
BEGIN
    select cg.codCargaAcademica_ct as id, cu.nombre as nombre

    from carga_academica_ct cg inner join curso_ct cu on cg.codCurso_ct = cu.id
    where cg.docente_id = id_docente;
END$$

-- AlumnosXCurso
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AlumnosXCursoCL`(IN `codcargaAcademica` VARCHAR(20))
    NO SQL
BEGIN
    select N.id as idNota, A.id as "idAlumno", CONCAT(A.apellidos,  ' ', A.nombre) as "NombreCpt", N.nota as "Nota"
    from (alumno A inner join matricula_cl M on A.id = M.codAlumno) inner join nota_cl N on N.codMatricula_cl = M.id
    where M.codCargaAcademica_cl = codcargaAcademica
    ORDER BY A.apellidos;
END$$

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CursosXDocenteCL`(IN `id_docente` INT)
    NO SQL
BEGIN
    select cg.codCargaAcademica_cl as id, cu.nombre as nombre

    from carga_academica_cl cg inner join curso_cl cu on cg.codCurso_cl = cu.id
    where cg.docente_id = id_docente;
END$$
-- end
-- listarCargaAcademicaCT
-- begin
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCargaAcademicaCT`(modu int)
BEGIN
    select codCargaAcademica_ct, C.nombre as curso, CONCAT(D.nombre,' ',D.apellidos) as docente, T.turno, T.grupo
    from carga_academica_ct T
    inner join curso_ct C on T.codCurso_ct = C.id and C.modulo = modu
    inner join docente D on T.docente_id = D.id
    order by codCargaAcademica_ct;
END $$
-- end
-- listarMatriculaXCargaAcademic
-- begin
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarMatriculaXCargaAcademic`(codigo int)
BEGIN
    select M.id, M.codAlumno as codigo, CONCAT(A.nombre,' ',A.apellidos) as alumno, M.codCargaAcademica_cl, F.nombre as curso
    from matricula_cl M
    inner join alumno A on M.codAlumno = A.id
    inner join carga_academica_cl C on M.codCargaAcademica_cl = C.codCargaAcademica_cl and M.codCargaAcademica_cl = codigo
    inner join curso_cl F on C.codCurso_cl = F.id
    order by id;
END $$
-- end
-- begin
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_cursosCL_disponibles`()
BEGIN
    select C.codCargaAcademica_cl, C.codCurso_cl, C2.nombre as nom_curso, C.docente_id, CONCAT(D.nombre,' ',D.apellidos) as nom_docente, C.turno, C.grupo
    from carga_academica_cl C
    inner join curso_cl C2 on C.codCurso_cl = C2.id
    inner join docente D on C.docente_id = D.id
    order by C.codCargaAcademica_cl;
END $$
-- end
-- begin
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_matriculas_curso_libre`()
BEGIN
    select M.id, M.codAlumno, CONCAT(A.nombre,' ',A.apellidos) as nom_alumno, M.codCargaAcademica_cl, D.codCurso_cl, C.nombre as nom_curso
    from matricula_cl M
    inner join alumno A on M.codAlumno = A.id
    inner join carga_academica_cl D on M.codCargaAcademica_cl = D.codCargaAcademica_cl
    inner join curso_cl C on D.codCurso_cl = C.id
    order by id;
END $$
-- end


-- begin
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarAsistencia_CT`(codCargaAcademica varchar(10),tema varchar(10),docente_id int,codAlumno int,Fecha date, observacion varchar(30))
BEGIN
Declare codAsistencia int;
    insert into `asistencia_ct`(`codAsistencia_ct`,`codCargaAcademica_ct`,`docente_id`,`fecha`,`tema`,`codAlumno`, `Observacion`)
    values(codAsistencia,codCargaAcademica,docente_id,Fecha,tema,codAlumno,observacion);
END $$
-- end
-- begin
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Listar_Asistencias_fecha`(docente_id INT, Fecha date, Carga varchar(10))
BEGIN
    select A.id as "idAlumno", CONCAT(A.apellidos,  ' ', A.nombre) as "NombreCpt"
    from (alumno A inner join matricula_ct M on A.id = M.codAlumno inner join asistencia_ct Asis on M.codCargaAcademica_ct=Asis.codCargaAcademica_ct)
    where cg.docente_id = id_docente and Asis.fecha=Fecha and M.codCargaAcademica_ct = Carga;
END $$
-- end
-- begin
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AlumnoXCursoCT`(IN `codcargaAcademica` VARCHAR(20), Codigo varchar(10))
BEGIN
    select A.codAlumno as "idAlumno", CONCAT(A.apellidos,  ' ', A.nombre) as "NombreCpt"
    from alumno A inner join matricula_ct M on A.codAlumno = M.codAlumno
    where M.codCargaAcademica_ct = codcargaAcademica and  A.codAlumno=Codigo
    ORDER BY A.apellidos;
END $$
-- end

-- Pago de planilla docente de carrera técnica
-- begin
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Planilla_ct`(codDocente int)
BEGIN
    select ct.id as Codigo, ct.horas_academicas as horas, (SUM(ct.horas_academicas)*15)as Pago
    from (carga_academica_ct C inner join  docente D on C.docente_id=D.id) inner join curso_ct ct on C.codCurso_ct=ct.id
    where ct.estado=1 and D.id=codDocente and (C.semestre=(SELECT id FROM semestre order by id desc limit 1))
    group by ct.id, ct.horas_academicas;

END $$
-- end

-- Total del pago de planilla carrera tecnica
-- begin
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Planilla_ct_total`(codDocente int)
BEGIN
    select  (SUM(ct.horas_academicas)*15)as Pago
    from (carga_academica_ct C inner join  docente D on C.docente_id=D.id) inner join curso_ct ct on C.codCurso_ct=ct.id
    where ct.estado=1 and D.id=codDocente and (C.semestre=(SELECT id FROM semestre order by id desc limit 1));
END $$
-- end
-- Pago de planilla docente de cursos Libres
-- begin
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Planilla_cl`(codDocente int)
BEGIN
    select cl.id as Codigo, cl.horas_academicas, (SUM(cl.horas_academicas)*15)as Pago
    from (carga_academica_cl C inner join  docente D on C.docente_id=D.id) inner join curso_cl cl on C.codCurso_cl=cl.id
    where cl.estado=1 and (C.semestre=(SELECT id FROM semestre order by id desc limit 1)) and D.id=codDocente
    group by cl.id, cl.horas_academicas;

END $$
-- end
-- Totalde pago de planilla cursos libres
-- begin
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Planilla_cl_total`(codDocente int)
BEGIN
    select (SUM(cl.horas_academicas)*15)as Pago
    from (carga_academica_cl C inner join  docente D on C.docente_id=D.id) inner join curso_cl cl on C.codCurso_cl=cl.id
    where cl.estado=1 and (C.semestre=(SELECT id FROM semestre order by id desc limit 1)) and D.id=codDocente;


END $$
-- end