<?php
class ClientList
{
	protected $conexion;

	function __construct()
	{
	$bdhost="localhost";		//Servidor
	$bduser="root";				//Usuario de bbdd
	$bdpass="";					//Contraseña de bbdd
	$bbdd="clientes";			//Nombre de la bbdd
	
	//Construcción del objeto mysqli
	$this->conexion=new mysqli($bdhost,$bduser,$bdpass,$bbdd);
	}

//LISTAR	
	function listarClientes()
	{
	//lista todos los registros de la bbdd
	$query = "SELECT mail FROM clientes;";
	$ = mysqli_fetch_all($query, MYSQLI_BOTH);
	return $resultSet;
	}
}
?>