CREATE DATABASE isc_test8;
use isc_test8;

CREATE TABLE IF NOT EXISTS users(
	`id` INT AUTO_INCREMENT NOT NULL,
	`email` VARCHAR(120) NOT NULL,
    `password` VARCHAR(120) NOT NULL,
    `tipoUsuario` VARCHAR(120) NOT NULL,
    `nroId` INT NOT NULL,
    `estado` INT(2) DEFAULT '1',
    `remember_token` VARCHAR(60) DEFAULT NULL,
    `updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS carrera (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS alumno(
	`id` INT AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(50) NOT NULL,
	`apellidos` VARCHAR(50) NOT NULL,
	`dni` VARCHAR(8) NOT NULL,
	`foto` VARCHAR(100) DEFAULT 'foto.jpg',
	`direccion` VARCHAR(120) NOT NULL,
	`telefono` VARCHAR(120) NOT NULL,
	`email` VARCHAR(120) NOT NULL,
	`password` VARCHAR(120) NOT NULL,
	`modulo` INT(2) DEFAULT '0',
	`estado` INT(2) DEFAULT '1',
	`codCarrera` VARCHAR(10) DEFAULT null,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`codCarrera`) REFERENCES carrera(`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS curso_ct(
	`id` int AUTO_INCREMENT NOT NULL,
	`codigo` VARCHAR(10) NOT NULL,	
	`nombre` VARCHAR(30) NOT NULL,
	`modulo` INT(2) DEFAULT null,
	`horas_academicas` VARCHAR(30) DEFAULT null,
	`estado` tinyint(1) DEFAULT '1',
	`codCarrera` VARCHAR(10) NOT NULL,
	`updated_at` DATETIME NOT NULL,
	`created_at` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`codCarrera`) REFERENCES carrera(`id`)

) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS docente(
    `id` INT AUTO_INCREMENT NOT NULL,
    `nombre` VARCHAR(50) NOT NULL,
    `apellidos` VARCHAR(50) NOT NULL,
    `dni` VARCHAR(8) NOT NULL,
    `direccion` VARCHAR(120) NOT NULL,
    `foto` VARCHAR(100) DEFAULT 'foto.jpg',
    `telefono` VARCHAR(120) NOT NULL,
    `email` VARCHAR(120) NOT NULL,
    `password` VARCHAR(120) NOT NULL,
    `estado` INT(2) DEFAULT '1',
    `updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) CHARSET=utf8 AUTO_INCREMENT=2141 ;

CREATE TABLE IF NOT EXISTS cargo(
    `id` INT AUTO_INCREMENT NOT NULL,
    `nombre` VARCHAR(50) NOT NULL,
    `privilegios` VARCHAR(50) NOT NULL,
    `descripcion` text DEFAULT NULL,
    `updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS personal(
    `id` INT AUTO_INCREMENT NOT NULL,
    `nombre` VARCHAR(50) NOT NULL,
    `apellidos` VARCHAR(50) NOT NULL,
    `dni` VARCHAR(8) NOT NULL,
    `direccion` VARCHAR(120) NOT NULL,
    `foto` VARCHAR(100) DEFAULT 'foto.jpg',
    `telefono` VARCHAR(120) NOT NULL,
    `email` VARCHAR(120) NOT NULL,
    `password` VARCHAR(120) NOT NULL,
    `estado` INT(2) DEFAULT '1',
    `cargo_id` INT NOT NULL,
    `updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
	FOREIGN KEY (`cargo_id`) REFERENCES cargo(`id`)
) CHARSET=utf8 AUTO_INCREMENT=214 ;

CREATE TABLE IF NOT EXISTS carga_academica_ct(
	`codCargaAcademica_ct` INT AUTO_INCREMENT NOT NULL,
	`codCurso_ct` INT NOT NULL,
	`docente_id` INT NOT NULL,
	`semestre` VARCHAR(10) NOT NULL,
	`turno` VARCHAR(10) NOT NULL,
	`grupo` VARCHAR(10) NOT NULL,
	PRIMARY KEY (`codCargaAcademica_ct`),
	FOREIGN KEY (`codCurso_ct`) REFERENCES curso_ct(`id`),
	FOREIGN KEY (`docente_id`) REFERENCES docente(`id`)
) CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS silabus_ct(
	`id` int AUTO_INCREMENT NOT NULL,
	`codCargaAcademica_ct` INT NOT NULL,
	`updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
	PRIMARY KEY(`id`),
	FOREIGN KEY (`codCargaAcademica_ct`) REFERENCES carga_academica_ct(`codCargaAcademica_ct`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS detalle_silabus_ct(
	`id` int AUTO_INCREMENT NOT NULL,
	`codSilabus_ct`int NOT NULL,
	`capitulo` VARCHAR(50) NOT NULL,
	`titulo` VARCHAR(120) NOT NULL,
	`objetivos` text NOT NULL,
	`descripcion` text NOT NULL,
	`numeroclases` int NOT NULL,
	`orden` INT NOT NULL,
	`estado` tinyint(1) DEFAULT '1',
	`created_at` DATETIME NOT NULL,
	`updated_at` DATETIME NOT NULL,
	PRIMARY KEY(`id`),
	FOREIGN KEY(`codSilabus_ct`) REFERENCES silabus_ct(`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS modulo(
	`id` INT AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(10),
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS matricula_ct(
	`id` INT AUTO_INCREMENT NOT NULL,
	`codAlumno` INT NOT NULL,
	`codCargaAcademica_ct` INT NOT NULL,
	`updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`codAlumno`) REFERENCES alumno(`id`),
	FOREIGN KEY(`codCargaAcademica_ct`) REFERENCES carga_academica_ct(`codCargaAcademica_ct`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS nota_ct(
	`id` INT AUTO_INCREMENT,
	`codMatricula_ct` INT NOT NULL,
	`notaa` float(7,4) NOT NULL,
	`notab` float(7,4) NOT NULL,
	`notac` float(7,4) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`codMatricula_ct`) REFERENCES matricula_ct(`id`)
) CHARSET=utf8;

 -- CURSOS LIBRES
CREATE TABLE IF NOT EXISTS curso_cl(
	`id` int AUTO_INCREMENT NOT NULL,
	`codigo` VARCHAR(10) NOT NULL,	
	`nombre` VARCHAR(30) NOT NULL,
	`horas_academicas` VARCHAR(30) DEFAULT null,
	`estado` tinyint(1) DEFAULT '1',
	`updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS carga_academica_cl(
	`codCargaAcademica_cl` INT AUTO_INCREMENT NOT NULL,
	`codCurso_cl` INT NOT NULL,
	`docente_id` INT NOT NULL,
	`turno` VARCHAR(10) NOT NULL,
	`grupo` VARCHAR(10) NOT NULL,
	`semestre` VARCHAR(10) NOT NULL,
	`fecha_inicio` DATE NOT NULL,
	`fecha_fin` DATE NOT NULL,
	`estado` BIT DEFAULT 1,
	`minimo` INT NOT NULL,
	PRIMARY KEY (`codCargaAcademica_cl`),
	FOREIGN KEY (`codCurso_cl`) REFERENCES curso_cl(`id`),
	FOREIGN KEY (`docente_id`) REFERENCES docente(`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS silabus_cl(
	`id` int AUTO_INCREMENT NOT NULL,
	`codCargaAcademica_cl` INT NOT NULL,
	`updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
	PRIMARY KEY(`id`),
	FOREIGN KEY (`codCargaAcademica_cl`) REFERENCES carga_academica_cl(`codCargaAcademica_cl`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS detalle_silabus_cl(
	`id` int AUTO_INCREMENT NOT NULL,
	`codSilabus_cl` int NOT NULL,
	`capitulo` VARCHAR(50) NOT NULL,
	`titulo` VARCHAR(120) NOT NULL,
	`objetivos` text NOT NULL,
	`descripcion` text NOT NULL,
	`numeroclases` int NOT NULL,
	`orden` INT NOT NULL,
	`estado` tinyint(1) DEFAULT '1',
	`updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
	PRIMARY KEY(`id`),
	FOREIGN KEY(`codSilabus_cl`) REFERENCES silabus_cl(`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS matricula_cl(
	`id` INT AUTO_INCREMENT NOT NULL,
	`codAlumno` INT NOT NULL,
	`codCargaAcademica_cl` INT NOT NULL,
	`updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`codAlumno`) REFERENCES alumno(`id`),
	FOREIGN KEY(`codCargaAcademica_cl`) REFERENCES carga_academica_cl(`codCargaAcademica_cl`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS nota_cl(
	`id` INT AUTO_INCREMENT,
	`codMatricula_cl` INT NOT NULL,
	`nota` float(7,4) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`codMatricula_cl`) REFERENCES matricula_cl(`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS aula(
	`codAula` VARCHAR(10) NOT NULL,
	`capacidad` INT NOT NULL,
	PRIMARY KEY (`codAula`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS horario_aula(
	`codAula` VARCHAR(10) NOT NULL,
	`horario` VARCHAR(10) NOT NULL,
	`dia` VARCHAR(10) NOT NULL,
	`codCargaAcademica_ct` INT NULL,
	`codCargaAcademica_cl` INT NULL,
	PRIMARY KEY(`codAula`,`horario`,`dia`),
	FOREIGN KEY (`codAula`)  REFERENCES aula(`codAula`),
	FOREIGN KEY (`codCargaAcademica_ct`)  REFERENCES carga_academica_ct(`codCargaAcademica_ct`),
	FOREIGN KEY (`codCargaAcademica_cl`)  REFERENCES carga_academica_cl(`codCargaAcademica_cl`)
) CHARSET=utf8;

-- ASISTENCIA ALUMNOS
CREATE TABLE IF NOT EXISTS asistencia_ct(
	`codAsistencia_ct` VARCHAR(10) NOT NULL,
	`fecha` DATE NOT NULL,
	`codCargaAcademica_ct` INT NOT NULL,
	`tema` VARCHAR(10) NOT NULL,
	`docente_id` INT NOT NULL,
	PRIMARY KEY (`codAsistencia_ct`),
	FOREIGN KEY (`codCargaAcademica_ct`) REFERENCES carga_academica_ct(`codCargaAcademica_ct`),
	FOREIGN KEY (`docente_id`) REFERENCES docente(`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS detalle_asistencia_ct(
	`codAlumno` INT NOT NULL,
	`codAsistencia_ct` VARCHAR(10) NOT NULL,
	PRIMARY KEY (`codAlumno`,`codAsistencia_ct`),
	FOREIGN KEY (`codAlumno`) REFERENCES alumno(`id`),
	FOREIGN KEY (`codAsistencia_ct`) REFERENCES asistencia_ct(`codAsistencia_ct`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS asistencia_cl(
	`codAsistencia_cl` VARCHAR(10) NOT NULL,
	`fecha` DATE NOT NULL,
	`codCargaAcademica_cl` INT NOT NULL,
	`tema` VARCHAR(10) NOT NULL,
	`docente_id` INT NOT NULL,
	PRIMARY KEY (`codAsistencia_cl`),
	FOREIGN KEY (`codCargaAcademica_cl`) REFERENCES carga_academica_cl(`codCargaAcademica_cl`),
	FOREIGN KEY (`docente_id`) REFERENCES docente(`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS detalle_asistencia_cl(
	`codAlumno` INT NOT NULL,
	`codAsistencia_cl` VARCHAR(10) NOT NULL,
	PRIMARY KEY (`codAlumno`,`codAsistencia_cl`),
	FOREIGN KEY (`codAlumno`) REFERENCES alumno(`id`),
	FOREIGN KEY (`codAsistencia_cl`) REFERENCES asistencia_cl(`codAsistencia_cl`)
) CHARSET=utf8;

-- PAGOS
CREATE TABLE IF NOT EXISTS modalidad_pago(
	`id` varchar(30) NOT NULL,
	`descripcion` VARCHAR(50),
	`monto` real,
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS pagos(
	`id` int AUTO_INCREMENT NOT NULL,
	`nro_serie` varchar(3),
	`id_alumno` INT,
	`fecha` DATE,
	`total_pago` real,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`id_alumno`) REFERENCES alumno(`id`)
) CHARSET=utf8 AUTO_INCREMENT=214;


CREATE TABLE IF NOT EXISTS detalle_pagos(
	`id` int AUTO_INCREMENT not null,
	`pagos_id` int NOT NULL,
	`descripcion` varchar(20),
	`id_modalidad` VARCHAR(30),
	PRIMARY KEY (`id`),
	FOREIGN KEY (`id_modalidad`) REFERENCES modalidad_pago(`id`),
	FOREIGN KEY (`pagos_id`) REFERENCES pagos(`id`)
) CHARSET=utf8 AUTO_INCREMENT=214;

-- Flotantes
CREATE TABLE IF NOT EXISTS horario(
	`codHorario` VARCHAR(10) NOT NULL,
	`horaInicio` time,
	`horaFin` time,
	PRIMARY KEY (`codHorario`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS dia(
	`id` INT AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(10),
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS semestre(
	`id` INT AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(10),
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS turno(
	`id` INT AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(10),
	PRIMARY KEY (`id`)
) CHARSET=utf8;

CREATE TABLE IF NOT EXISTS grupo(
	`id` INT AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(10),
	PRIMARY KEY (`id`)
) CHARSET=utf8;
