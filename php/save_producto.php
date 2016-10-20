<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>HOME | CASA HOMERO</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">

<style>
h3{
	text-align:center;
	padding-bottom: 25px;
}
a {
	width: 420px;
	margin: 0 auto;
}
#caja {
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translate(-50%, -50%);
	-webkit-transform: translate(-50%, -50%);
}
</style>

<body>
	<script src="../js/jquery-1.12.4.min.js"</script>
	<script src="../js/bootstrap.min.js"</script>
</body>

<?php
	$nombre = $_POST['descripcion'];
	$cant = $_POST['cantidad'];
	$valor = $_POST['precio'];
	$id_cat = $_POST['categorias'];
	
	header('Content-Type:text/html;charset=UTF-8');
	include_once '../includes/bdd.php';
	$con=crearConexion();
	$con->set_charset("utf-8");
	//La instrucción que tendría que lanzar en SQL sería esta: insert into productos(description,cantidad,precio,id_categoria) values ('$nombre','$cant','$valor','$id_cat');
	$sql="insert into productos (description,cantidad,precio,id_categoria) values (?,?,?,?)";
	$stmt=$con->prepare($sql);
	$stmt->bind_param('sidi',$nombre,$cant,$valor,$id_cat);	//sidi hace referencia al tipo de valor de cada parámetro (description,cantidad,precio,id_categoria): string,int,decimal,int
	$stmt->execute();
	$con->close();
	echo "<div id='caja'>";
		echo "<h3>Â¡Producto almacenado correctamente!</h3>";
		echo "<a class='btn btn-primary' href='../html/insert_productos.html'>Ingresar un Nuevo Producto</a>";
		echo "<br>";
		echo "<br>";
		echo "<a class='btn btn_primary' href='welcome.php'>Salir</a>";
	echo "</div>";
?>


