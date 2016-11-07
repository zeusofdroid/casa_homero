<?php
session_start();
if ($_SESSION['logueado']){
	header('Content-Type:text/html;charset=UTF-8');
	include_once '../includes/bdd.php';
	$con=crearConexion();
	$con->set_charset("utf-8");

	if (isset($_GET['id'])){
		$cod_eliminar=$_GET['id'];
		// instruccion de sql para eliminar el registro nro 9 por ejemplo: "delete from productos where id_prod=9"
		$sql="delete from productos where id_prod=" . $cod_eliminar;
		$result=$con->query($sql);
		header("location:list_productos.php");
	}
}


