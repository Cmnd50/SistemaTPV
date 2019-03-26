SELECT TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) AS Edad,  
concat(Nombres,' ',Apellidos) as 'Nombre Completo',
CASE WHEN TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) < 15 THEN 'PEDIATRIA'
	 WHEN FechaNacimiento IS NULL THEN 'FECHA SIN REGISTRARSE' ELSE 'GENERAL' END as 'Clasificacion'
FROM persona 
