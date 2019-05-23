<?php

require_once '../../include/database_connection.php';

$IdUsuario = $_POST["id"];

$query = "SELECT mu.IdMenuUsuario as 'ID', m.DescripcionMenu as 'MENU', me.DescripcionMenuDetalle as 'SUBMENU', 
          CASE WHEN
                mu.MenuUsuarioActivo = 1 THEN 'ACTIVO' ELSE 'INACTIVO' END as 'ACTIVO', u.InicioSesion  FROM menuusuario mu
        INNER JOIN menudetalle me on mu.IdMenuDetalle = me.IdMenuDetalle
             INNER JOIN menu m on mu.IdMenu = m.IdMenu
             INNER JOIN usuario u on mu.IdUsuario = u.IdUsuario
             WHERE u.IdUsuario = $IdUsuario";

$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }

 echo json_encode($data);
}




?>
