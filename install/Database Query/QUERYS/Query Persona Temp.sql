SELECT
IdTempPaciente as 'IdPersona', 
Nombres, 
Apellidos, 
'' as 'FechaNacimiento',
'' as 'Direccion',
'' as 'Correo',
IdGeografia as 'IdGeografia',
'' as 'Genero',
1 as 'IdEstadoCivil',
'' as 'IdParentesco',
'' as 'Telefono',
'' as 'Celular',
'' as 'Alergias',
'' as 'Medicamentos',
'' as 'Enfermedad',
dui as 'Dui',
'' as 'TelefonoResponsable',
1 as 'IdEstado',
Categoria as 'Categoria',
'' as 'NombresResponsable',
'' as 'ApellidosResponsable',
'' as 'Parentesco',
'' as 'DuiResponsable',
64 as 'IdPais',
'' as 'RutaCarpeta'
FROM temppaciente
group by Nombres, Apellidos
;




 INSERT INTO TempPaciente SELECT * FROM temporalpacientes group by Nombres, Apellidos;  
