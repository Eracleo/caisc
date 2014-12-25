CREATE TRIGGER agregar_notas_ct
AFTER INSERT ON matricula_ct
FOR EACH ROW
INSERT INTO nota_ct(codMatricula_ct,notaa,notab,notac) 
values (NEW.id,0,0,0);

CREATE TRIGGER agregar_matri_alumno
AFTER INSERT ON alumno
FOR EACH ROW
INSERT INTO matricula_ct(codAlumno,codCargaAcademica_ct,updated_at,created_at) 
values (NEW.id,10001,now(),now()),(NEW.id,10002,now(),now()),(NEW.id,10003,now(),now()),(NEW.id,10004,now(),now()),(NEW.id,10005,now(),now());