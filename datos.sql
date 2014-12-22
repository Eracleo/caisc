use isc_test8;
-- Insertando cargos
INSERT INTO cargo (nombre,privilegios,descripcion) VALUES("Administrador","General","Facultad de Crear y Deshacer usuarios");
-- Insertando personal
INSERT INTO personal (nombre,apellidos,dni,direccion,telefono,email,password,cargo_id) VALUES("NameAdmin","ApellidoAdmin","12345678","UNSAAC","123456","admin@gmail.com","$2y$10$fY.z..RdDITDo5/0LcLqNuE9Ij1GuncP1IyJwNMdKSfQFmCSd0s/u",1);
-- Insertando Usuario Administrador
INSERT INTO users (email,password,tipoUsuario,nroId) VALUES("admin@gmail.com","$2y$10$fY.z..RdDITDo5/0LcLqNuE9Ij1GuncP1IyJwNMdKSfQFmCSd0s/u","Personal",214);
INSERT INTO users (email,password,tipoUsuario,nroId) VALUES("admin1@gmail.com","$2y$10$fY.z..RdDITDo5/0LcLqNuE9Ij1GuncP1IyJwNMdKSfQFmCSd0s/u","Docente",123);

INSERT INTO `docente` (`id`, `nombre`, `apellidos`, `dni`, `direccion`, `foto`, `telefono`, `email`, `password`, `estado`, `updated_at`, `created_at`) VALUES
(1, 'Gerardo', 'Mamani', '45544334', 'Av. Grau', NULL, '234435', 'Correo@gmail.com', '132456', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

INSERT INTO `carrera` (`id`, `nombre`, `descripcion`, `estado`, `updated_at`, `created_at`) VALUES
('EDU', 'Educacion', 'Fue fundada en 1092', 1, '2014-12-22 06:41:04', '2014-12-22 06:41:04'),
('IN', 'INFORMATICA', 'Informatica 1993', 1, '2014-12-22 06:59:49', '0000-00-00 00:00:00'),
('MA', 'Matematica', 'Fue Creada en 1792', 1, '2014-12-22 05:51:46', '2014-12-22 05:51:46');

INSERT INTO `curso_ct` (`id`, `nombre`, `modulo`, `estado`, `codCarrera`, `updated_at`, `created_at`) VALUES
('C001', 'Programacion', 1, 1, 'IN', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

INSERT INTO `carga_academica_ct` (`codCargaAcademica_ct`, `codCurso_ct`, `docente_id`, `semestre`, `turno`, `grupo`) VALUES
(1, 'C001', 1, '2012-II', 'Tarde', '2');

INSERT INTO `curso_cl` (`id`, `nombre`, `horas_academicas`, `estado`, `updated_at`, `created_at`) VALUES
('CL002', 'Programacion Android', '35', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

INSERT INTO `carga_academica_cl` (`codCargaAcademica_cl`, `codCurso_cl`, `docente_id`, `turno`, `grupo`, `semestre`, `fecha_inicio`, `fecha_fin`, `estado`, `minimo`) VALUES
(2, 'CL002', 1, 'Tarde', 'B', '2001-I', '0000-00-00', '0000-00-00', b'1', 20);

INSERT INTO `silabus_cl` (`id`, `codCargaAcademica_cl`) VALUES
(2, 2);

INSERT INTO `silabus_ct` (`id`, `codCargaAcademica_ct`) VALUES
(2, 1);

-- Insertando aulas

INSERT INTO `aula`(`codAula`, `capacidad`) VALUES ('A101',40);
INSERT INTO `aula`(`codAula`, `capacidad`) VALUES ('A102',55);
INSERT INTO `aula`(`codAula`, `capacidad`) VALUES ('A103',40);
INSERT INTO `aula`(`codAula`, `capacidad`) VALUES ('A104',40);
INSERT INTO `aula`(`codAula`, `capacidad`) VALUES ('A105',45);
INSERT INTO `aula`(`codAula`, `capacidad`) VALUES ('A106',45);
INSERT INTO `aula`(`codAula`, `capacidad`) VALUES ('A107',45);
INSERT INTO `aula`(`codAula`, `capacidad`) VALUES ('A108',40);
INSERT INTO `aula`(`codAula`, `capacidad`) VALUES ('A109',45);
INSERT INTO `aula`(`codAula`, `capacidad`) VALUES ('A110',40);
