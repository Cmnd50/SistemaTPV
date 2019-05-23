<?php

require_once '../../include/database_connection.php';


 // $activo = $_POST['activo'];
 // $id = $_POST['id'];

 // for($count = 0; $count < count($id); $count++)
 // {
 //  $data = array(

 //   ':activo'  => $activo[$count],
 //   ':id'   => $id[$count]
 //  );
 //  $query = "
 //  UPDATE menusuario 
 //  SET MenuUsuarioActivo = :activo
 //  WHERE IdMenuUsuario = :id
 //  ";
 //  $statement = $connect->prepare($query);
 //  $statement->execute($data);

 // }


if(isset($_POST['hidden_id']))
{
  $activo = $_POST['activo'];
  $id = $_POST['hidden_id'];
 for($count = 0; $count < count($id); $count++)
 {
  $data = array(
   ':activo'  => $activo[$count],
   ':id'   => $id[$count]
  );
  $query = "
  UPDATE menusuario 
  SET MenuUsuarioActivo = :activo
  WHERE IdMenuUsuario = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>

?>