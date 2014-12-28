use isc_test8;
-- Insertando cargos
INSERT INTO cargo (nombre,privilegios,descripcion) VALUES("Administrador","General","Facultad de Crear y Deshacer usuarios");
-- Insertando personal
INSERT INTO personal (nombre,apellidos,dni,direccion,telefono,email,password,cargo_id) VALUES("NameAdmin","ApellidoAdmin","12345678","UNSAAC","123456","admin@gmail.com","$2y$10$fY.z..RdDITDo5/0LcLqNuE9Ij1GuncP1IyJwNMdKSfQFmCSd0s/u",1);

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
