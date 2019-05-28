-- ACTUALIZAR OPCIONES PARA PODER ELIMINAR Y ACTUALIZAR
SET SQL_SAFE_UPDATES = 0;
SET FOREIGN_KEY_CHECKS=1;

-- ELIMINAR TABLAS POR ORDEN
delete from examenesvarios;
delete from examenheces;
delete from examenhemograma;
delete from examenorina;
delete from examenquimica;
delete from listaexamen;
delete from listarayosx;
delete from indicadorprocedimiento;
delete from enfermeriaprocedimiento;
delete from indicador;
delete from receta;
delete from consulta;
delete from test;
delete from persona;



-- ELIMINAR LINEAS DUPLICADAS
SELECT concat(dui,' ',nombres,' ',Apellidos) as 'NOMBRE', COUNT(*) Total
FROM temporalpacientes
GROUP BY concat(dui,' ',nombres,' ',Apellidos)
HAVING COUNT(*) > 1;


DELETE t1 FROM temporalpacientes t1
INNER JOIN temporalpacientes t2 
WHERE t1.IdTempPaciente > t2.IdTempPaciente AND t1.Dui = t2.Dui; 