<?php

$dsn = "BaseSQL32"; 
$usuario = "DBA";
$clave="sql";

$conn = odbc_connect($dsn, $usuario, $clave);


//   $db_host        = "localhost";
//   $db_server_name = "JOSUE";
//   $db_name        = "JOSUE";
//   $db_file        = 'C:\MTCORPORATIVO\BASE\JOSUE.db';
//   $db_user        = "DBA";
//   $db_pass        = "sql";
  
// $connect_string = "Driver={Adaptive Server Anywhere 7.0};".
//                     "CommLinks=tcpip(Host=$db_host);".
//                     "ServerName=$db_server_name;".
//                     "DatabaseName=$db_name;".
//                     "DatabaseFile=$db_file;".
//                     "uid=$db_user;pwd=$db_pass;".
//                     "Client_CSet=UTF-8;Server_CSet=CP850";
 

// $conn = odbc_connect($connect_string,'DBA','sql');

// if(!$conn){
//   echo "CONEXION FALLIDA";
// }else{
//   echo "CONEXION EXITOSA";
// }