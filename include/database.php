<?php


class Database extends PDO
{

	public function __construct(){
		 $array = split("\n", file_get_contents('C:\xampp\htdocs\SistemaTPV\config\db.txt'));
		 $localhost = $array[0];
		 $db = trim($array[1]);
		 $usuario = trim($array[2]);
		 $clave = trim($array[3]);


		parent::__construct('mysql:host=localhost;dbname='. $db.'',''.$usuario.'',''.$clave.'');
	}
}
