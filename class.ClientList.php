<?php
class ClientList
{
	protected $conexion;

	function __construct()
	{
	$bdhost="localhost";		//Servidor
	$bduser="root";				//Usuario de bbdd
	$bdpass="";					//Contraseña de bbdd
	$bbdd="mailer";			//Nombre de la bbdd
	
	//Construcción del objeto mysqli
	$this->conexion=new mysqli($bdhost,$bduser,$bdpass,$bbdd);
	}

//LISTAR	
	function listarClientes()
	{
	//lista todos los registros de la bbdd
	$query = "SELECT * FROM clientes;";
	$result = mysqli_query($this->conexion, $query);
	return $result;
	}
	
	function getClientesSubscritos()
	{
	//lista todos los registros de la bbdd
	$query = "SELECT * FROM clientes where status=1;";
	$result = mysqli_query($this->conexion, $query);
	return $result;
	}
}
?>