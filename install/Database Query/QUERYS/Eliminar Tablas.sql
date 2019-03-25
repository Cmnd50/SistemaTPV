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