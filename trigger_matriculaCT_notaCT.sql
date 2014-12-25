CREATE TRIGGER agregar_notas_ct
AFTER INSERT ON matricula_ct
FOR EACH ROW
INSERT INTO nota_ct(codMatricula_ct,notaa,notab,notac) 
values (NEW.id,0,0,0);