<?php
session_start();
if ($_SESSION["logueado"]){	
	header ('Content-Type: text/html; charser=utf-8');
	include_once '../includes/bdd.php';
	$con=crearConexion();
	$con->set_charset("utf8");	
	if 
	(isset($_POST['guardar']))  // eso lo guardo
	{
	//lo que obtengo por metodo post le asigno a las siguientes variables son los name de los input del form que tengo en "update_producto.php"
	$idProducto=$_POST['id_prod'];	
	$idCategoria=$_POST['categorias'];
	$idDescripcion=$_POST['descripcion'];
	$idCantidad=$_POST['cantidad'];
	$idPrecio=$_POST['precio'];
	
	//a continuación le asigno a los campos de la base de sql las variables que definí arriba
	$sql="update productos set id_categoria='$idCategoria',
									precio='$idPrecio',
									description='$idDescripcion',
									cantidad='$idCantidad'
	where id_prod=". $idProducto;
	$result=$con->query($sql);
	$con->close();
	header("location:list_productos.php");
	}
}	
	