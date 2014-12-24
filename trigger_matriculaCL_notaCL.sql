CREATE TRIGGER agregar_notas_cl
AFTER INSERT ON matricula_cl
FOR EACH ROW
INSERT INTO nota_cl(codMatricula_cl,nota) 
values (NEW.id,0);