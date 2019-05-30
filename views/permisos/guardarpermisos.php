<?php 

require_once '../../include/dbconnect.php';


$query = 'SELECT IdMenu, IdMenuDetalle FROM menuusuario where IdUsuario = 2';
$resultado = $mysqli->query($query);

while ($test = $resultado->fetch_assoc())
		{
				$IdMenuDetalle = $test['IdMenuDetalle'];
				$IdMenu = $test['IdMenu'];


				$consulta="SELECT IdMenu, IdMenuDetalle FROM menuusuario where IdUsuario = 2 and IdMenu = '$IdMenu' and IdMenuDetalle = '$IdMenuDetalle'";	
				$resultado1=$mysqli->query($consulta);

				if (mysqli_num_rows($resultado1) != 0)
				{

					$querycargapermiso = "SELECT IdMenuDetalle, IdMenu from menudetalle where IdMenu between 1 and 12 order by IdMenu asc";
					$resultInsercargapermiso = $mysqli->query($querycargapermiso);
					while ($test = $resultInsercargapermiso->fetch_assoc())
					{	
						$IdMenuDetalle1 = $test['IdMenuDetalle'];
						$IdMenu1 = $test['IdMenu'];
						$queryMenuUsuario = "insert into menuusuario
																(IdMenuDetalle,MenuUsuarioActivo,IdUsuario,IdMenu,TipoPermiso)
														values
																($IdMenuDetalle1,1,2,$IdMenu1,1)
														";
					$resultInsermenuusuario = $mysqli->query($queryMenuUsuario);

					}

					
						
				} else {
				
					

							//echo $queryMenuUsuario;
				}

				header('Location: ../../web/permisos/view?id=2');
		}