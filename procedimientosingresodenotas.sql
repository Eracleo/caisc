
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AlumnosXCursoCT`(IN `codcargaAcademica` VARCHAR(20))
BEGIN
    select N.id as idNota, A.codAlumno as "idAlumno", CONCAT(A.apellidos,  ' ', A.nombre) as "NombreCpt", N.notaa as "Nota1", N.notab as "Nota2", N.notac as "Nota3"
	from (alumno A inner join matricula_ct M on A.codAlumno = M.codAlumno) inner join nota_ct N on N.codMatricula_ct = M.id
    where M.codCargaAcademica_ct = codcargaAcademica
    ORDER BY A.apellidos;
END

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CursosXDocenteCT`(IN `id_docente` INT)
    NO SQL
BEGIN
    select cg.codCargaAcademica_ct as id, cu.nombre as nombre

	from carga_academica_ct cg inner join curso_ct cu on cg.codCurso_ct = cu.id 
    where cg.docente_id = id_docente;
END



INSERT INTO `carrera` (`id`, `nombre`, `descripcion`) VALUES
('1', 'Ing Informatica', ''),
('2', 'Analista de sistemas', '');


INSERT INTO `alumno` (`codAlumno`, `nombre`, `apellidos`, `dni`, `direccion`, `telefono`, `email`, `pasword`, `modulo`, `estado`, `codCarrera`) VALUES
('33225223', 'manuel', 'huamani', '56453232', 'urb. mariscal gamarra', '950771438', 'n.antony.nina@gmail.com', '', 0, 0, NULL),
('A0001', 'niko antony', 'nina quispe', '34658798', 'av. pardo', '234567', 'nemo_15@gmail.com', '123456', 1, 0, '1'),
('A0002', 'maria', 'quispe huaman', '12343312', 'av. sol ', '232143', 'maria_86@mail.com', '2343221', 1, 0, '1'),
('A0003', 'marcos ', 'carlo quique', '67879867', 'av. cusco', '345421', 'marcos-987@mail.com', '213454r34', 1, 0, '1'),
('A0005', 'yessenia', 'ceverino', '43567654', 'av. arequipa', '98765643', 'yesy@mail.com', '56777546fcf8', 1, 1, '1'),
('A0011', 'Mariana', 'mendoza', '34652389', 'averc emansiabd', '7898765', 'jcalderon@mail.com', '', 0, 1, '2');


INSERT INTO `curso_ct` (`id`, `nombre`, `modulo`, `estado`, `codCarrera`, `updated_at`, `created_at`) VALUES
('CU001', 'algoritmica I', 1, b'1', '1', '2014-12-09 00:00:00', '2014-12-10 00:00:00'),
('CU002', 'algoritmica II', 1, b'1', '1', '2014-12-15 00:00:00', '2014-12-26 00:00:00'),
('CU003', 'algoritmica III', 1, b'1', '1', '2014-12-01 00:00:00', '2014-12-24 00:00:00'),
('CU004', 'algoritmica IV', 1, b'1', '1', '2014-12-11 00:00:00', '2014-12-30 00:00:00');

INSERT INTO `docente` (`id`, `nombre`, `apellidos`, `dni`, `direccion`, `urlImagen`, `telefono`, `email`, `password`, `estado`, `updated_at`, `created_at`) VALUES
(10001, 'williann', 'zamalloa', '34567823', 'av. lima jr la union', 'asd.jpg', '235412', 'willian@mail.com', '2354365437fhdgs', 1, '2014-12-04 14:46:44', '2014-12-25 00:00:00'),
(10002, 'jose', 'pillco', '56436587', 'av. ayacucho', 'sda.jpg', '236512', 'jose@mail.com', '32543tgdfgsghdy1', 1, '2014-12-15 00:00:00', '2014-12-26 00:00:00');


INSERT INTO `carga_academica_ct` (`codCargaAcademica_ct`, `codCurso_ct`, `docente_id`, `semestre`, `turno`, `grupo`) VALUES
('10001', 'CU001', 10001, '1', 'Mañana', 'A'),
('10002', 'CU002', 10002, '1', 'Mañana', 'A'),
('10003', 'CU003', 10001, '1', 'Mañana', 'A'),
('10004', 'CU004', 10002, '1', 'Mañana', 'A'),
('10005', 'CU001', 10001, '2', 'Mañana', 'A'),
('10006', 'CU002', 10002, '2', 'Mañana', 'A'),
('10007', 'CU003', 10001, '2', 'Mañana', 'A'),
('10008', 'CU004', 10002, '2', 'Mañana', 'A'),
('10009', 'CU001', 10001, '3', 'Mañana', 'A'),
('10010', 'CU002', 10002, '3', 'Mañana', 'A');


INSERT INTO `matricula_ct` (`id`, `codAlumno`, `codCargaAcademica_ct`, `modulo`, `updated_at`, `created_at`) VALUES
(11001, 'A0001', '10001', 1, '2014-12-04 00:00:00', '2014-12-05 00:00:00'),
(11002, 'A0002', '10001', 1, '2014-12-08 00:00:00', '2014-12-31 00:00:00'),
(11003, 'A0003', '10002', 1, '2014-12-01 00:00:00', '2014-12-17 00:00:00'),
(11004, 'A0005', '10002', 1, '2014-12-09 00:00:00', '2014-12-15 00:00:00');


INSERT INTO `nota_ct` (`id`, `codMatricula_ct`, `notaa`, `notab`, `notac`) VALUES
(12001, 11001, 20, 20, 16),
(12002, 11002, 10, 16, 18),
(12004, 11003, NULL, NULL, NULL),
(12005, 11004, NULL, NULL, NULL);



CREATE DEFINER=`root`@`localhost` PROCEDURE `AlumnosXCursoCL`(IN `codcargaAcademica` VARCHAR(20))
    NO SQL
BEGIN
    select N.id as idNota, A.codAlumno as "idAlumno", CONCAT(A.apellidos,  ' ', A.nombre) as "NombreCpt", N.nota as "Nota"
	from (alumno A inner join matricula_cl M on A.codAlumno = M.codAlumno) inner join nota_cl N on N.codMatricula_cl = M.id
    where M.codCargaAcademica_cl = codcargaAcademica
    ORDER BY A.apellidos;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CursosXDocenteCL`(IN `id_docente` INT)
    NO SQL
BEGIN
    select cg.codCargaAcademica_cl as id, cu.nombre as nombre

	from carga_academica_cl cg inner join curso_cl cu on cg.codCurso_cl = cu.id 
    where cg.docente_id = id_docente;
END$$


INSERT INTO `curso_cl` (`id`, `nombre`, `horas_academicas`, `estado`, `updated_at`, `created_at`) VALUES 
('CUL001', 'Diseño Grafico', '240', '1', '2014-12-01 00:00:00', '2014-12-02 00:00:00'), 
('CUL002', 'CorelDraw', '120', '1', '2014-12-02 00:00:00', '2014-12-26 00:00:00'), 
('CUL003', 'AutoCad', '120', '1', '2014-12-02 00:00:00', '2014-12-31 00:00:00'), 
('CUL004', 'Civil3D', '150', '1', '2014-12-01 00:00:00', '2014-12-23 00:00:00');

INSERT INTO `carga_academica_cl` (`codCargaAcademica_cl`, `codCurso_cl`, `docente_id`, `turno`, `grupo`, `semestre`, `fecha_inicio`, `fecha_fin`, `estado`, `minimo`) VALUES 
('111001', 'CUL001', '10002', 'Mañana', 'A', '2014-I', '2014-12-01', '2014-12-23', b'1', '30'), 
('111002', 'CUL003', '10002', 'Mañana', 'A', '2014-I', '2014-12-01', '2014-12-01', b'1', '40');

INSERT INTO `matricula_cl` (`id`, `codAlumno`, `codCargaAcademica_cl`, `updated_at`, `created_at`) VALUES 
('101001', 'A0001', '111001', '2014-12-01 00:00:00', '2014-12-26 00:00:00'), 
('101002', 'A0002', '111001', '2014-12-01 00:00:00', '2014-12-26 00:00:00'), 
('101003', 'A0003', '111001', '2014-12-01 00:00:00', '2014-12-26 00:00:00'), 
('101004', 'A0005', '111001', '2014-12-02 00:00:00', '2014-12-31 00:00:00'),
('101005', 'A0011', '111001', '2014-12-01 00:00:00', '2014-12-26 00:00:00');

INSERT INTO `isc_test8`.`nota_cl` (`codNota_cl`, `codMatricula_cl`, `nota`) VALUES 
('200001', '101001', '10'), 
('200002', '101002', '11'),
('200003', '101003', '10'), 
('200004', '101004', '11'), 
('200005', '101005', '11');