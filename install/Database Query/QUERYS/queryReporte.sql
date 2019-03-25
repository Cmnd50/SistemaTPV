SELECT con.FechaConsulta as 'Fecha Consulta', concat(per.Nombres,' ',per.Apellidos) as 'Nombre Completo', per.Genero as 'Genero',
TIMESTAMPDIFF(YEAR,per.FechaNacimiento,CURDATE()) AS 'Edad', 
CASE WHEN TIMESTAMPDIFF(YEAR,per.FechaNacimiento,CURDATE()) > 14 and TIMESTAMPDIFF(YEAR,per.FechaNacimiento,CURDATE()) < 18 THEN 'Adolecente' 
WHEN TIMESTAMPDIFF(YEAR,per.FechaNacimiento,CURDATE()) > 0 and TIMESTAMPDIFF(YEAR,per.FechaNacimiento,CURDATE()) < 14 THEN 'Nino' 
ELSE  'Adulto' end as 'Categoria', 
CASE MONTH(con.FechaConsulta) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END as 'Mes'
FROM consulta con
INNER JOIN persona per on per.IdPersona = con.IdPersona;

SELECT 
      CASE WHEN per.Genero = 'Masculino' THEN COUNT(per.Genero) ELSE 0 END as 'CountMasculino', 
      CASE WHEN per.Genero = 'Femenino' THEN COUNT(per.Genero) ELSE 0 END as 'CountFemenino',
      CONCAT(CASE MONTH(con.FechaConsulta) 
      WHEN 1 THEN 'Ene'WHEN 2 THEN  'Feb' WHEN 3 THEN 'Mar' WHEN 4 THEN 'Abr' WHEN 5 THEN 'May'
      WHEN 6 THEN 'Jun' WHEN 7 THEN 'Jul' WHEN 8 THEN 'Ago' WHEN 9 THEN 'Sep' 
      WHEN 10 THEN 'Oct' WHEN 11 THEN 'Nov' WHEN 12 THEN 'Dic'
      END,' ',YEAR(con.FechaConsulta)) as 'Mes'
      FROM consulta con
      INNER JOIN persona per on per.IdPersona = con.IdPersona
      WHERE ACTIVO = 0
      GROUP BY CASE MONTH(con.FechaConsulta) 
      WHEN 1 THEN 'Enero'WHEN 2 THEN  'Febrero' WHEN 3 THEN 'Marzo' WHEN 4 THEN 'Abril' WHEN 5 THEN 'Mayo'
      WHEN 6 THEN 'Junio' WHEN 7 THEN 'Julio' WHEN 8 THEN 'Agosto' WHEN 9 THEN 'Septiembre' 
      WHEN 10 THEN 'Octubre' WHEN 11 THEN 'Noviembre' WHEN 12 THEN 'Diciembre'
      END
      ORDER BY con.FechaConsulta DESC LIMIT 3;
      
      
	(SELECT 
      CASE WHEN per.Genero = 'Masculino' THEN COUNT(per.Genero) ELSE 0 END as 'CountMasculino', 
      CASE WHEN per.Genero = 'Femenino' THEN COUNT(per.Genero) ELSE 0 END as 'CountFemenino',
      CONCAT(CASE MONTH(con.FechaConsulta) 
      WHEN 1 THEN 'Ene'WHEN 2 THEN  'Feb' WHEN 3 THEN 'Mar' WHEN 4 THEN 'Abr' WHEN 5 THEN 'May'
      WHEN 6 THEN 'Jun' WHEN 7 THEN 'Jul' WHEN 8 THEN 'Ago' WHEN 9 THEN 'Sep' 
      WHEN 10 THEN 'Oct' WHEN 11 THEN 'Nov' WHEN 12 THEN 'Dic'
      END,' ',YEAR(con.FechaConsulta)) as 'Mes'
      FROM consulta con
      INNER JOIN persona per on per.IdPersona = con.IdPersona
      WHERE ACTIVO = 0
      GROUP BY CASE MONTH(con.FechaConsulta) 
      WHEN 1 THEN 'Enero'WHEN 2 THEN  'Febrero' WHEN 3 THEN 'Marzo' WHEN 4 THEN 'Abril' WHEN 5 THEN 'Mayo'
      WHEN 6 THEN 'Junio' WHEN 7 THEN 'Julio' WHEN 8 THEN 'Agosto' WHEN 9 THEN 'Septiembre' 
      WHEN 10 THEN 'Octubre' WHEN 11 THEN 'Noviembre' WHEN 12 THEN 'Diciembre'
      END LIMIT 3);
      

      (SELECT 
      CASE WHEN per.Genero = 'Masculino' THEN COUNT(per.Genero) ELSE 0 END as 'CountMasculino', 
      CASE WHEN per.Genero = 'Femenino' THEN COUNT(per.Genero) ELSE 0 END as 'CountFemenino',
      CONCAT(CASE MONTH(con.FechaProcedimiento) 
      WHEN 1 THEN 'Ene'WHEN 2 THEN  'Feb' WHEN 3 THEN 'Mar' WHEN 4 THEN 'Abr' WHEN 5 THEN 'May'
      WHEN 6 THEN 'Jun' WHEN 7 THEN 'Jul' WHEN 8 THEN 'Ago' WHEN 9 THEN 'Sep' 
      WHEN 10 THEN 'Oct' WHEN 11 THEN 'Nov' WHEN 12 THEN 'Dic'
      END,' ',YEAR(con.FechaProcedimiento)) as 'Mes'
      FROM enfermeriaprocedimiento con
      INNER JOIN persona per on per.IdPersona = con.IdPersona
      GROUP BY CASE MONTH(con.FechaProcedimiento) 
      WHEN 1 THEN 'Enero'WHEN 2 THEN  'Febrero' WHEN 3 THEN 'Marzo' WHEN 4 THEN 'Abril' WHEN 5 THEN 'Mayo'
      WHEN 6 THEN 'Junio' WHEN 7 THEN 'Julio' WHEN 8 THEN 'Agosto' WHEN 9 THEN 'Septiembre' 
      WHEN 10 THEN 'Octubre' WHEN 11 THEN 'Noviembre' WHEN 12 THEN 'Diciembre'
      END LIMIT 3);
      
      
	SELECT 
      CASE WHEN per.Genero = 'Masculino' THEN COUNT(per.Genero) ELSE 0 END as 'CountMasculino', 
      CASE WHEN per.Genero = 'Femenino' THEN COUNT(per.Genero) ELSE 0 END as 'CountFemenino',
      mo.NombreModulo as 'Especialidad',
      CONCAT(CASE MONTH(con.FechaConsulta) 
      WHEN 1 THEN 'Ene'WHEN 2 THEN  'Feb' WHEN 3 THEN 'Mar' WHEN 4 THEN 'Abr' WHEN 5 THEN 'May'
      WHEN 6 THEN 'Jun' WHEN 7 THEN 'Jul' WHEN 8 THEN 'Ago' WHEN 9 THEN 'Sep' 
      WHEN 10 THEN 'Oct' WHEN 11 THEN 'Nov' WHEN 12 THEN 'Dic'
      END,' ',YEAR(con.FechaConsulta)) as 'Mes'
      FROM consulta con
      INNER JOIN persona per on per.IdPersona = con.IdPersona
      INNER JOIN modulo mo on mo.IdModulo = con.IdModulo
      WHERE con.activo = 0
      GROUP BY MONTH(con.FechaConsulta) 
      ORDER BY con.FechaConsulta DESC
      LIMIT 12;