<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>HOME | CASA HOMERO</title>
<link href="../css/style.css" rel="stylesheet">
<link href="slider/sss.css" rel="stylesheet">
<script src="js/jquery-1.12.4.min.js"></script>
<script src="slider/sss.min.js"></script>
</head>
<body>
	<div id="wrapper">
		<header>
			<h1>CASA HOMERO</h1>
			<h3>Materiales Electricos S.R.L</h3>
		</header>
		<nav>
			<ul>
				<li><a href="../index.html">Home</a></li>
				<li><a href="catalogo.php">Catálogo</a></li>
				<li><a href="servicios.html">Servicios</a></li>
				<li><a href="contacto.html">Contacto</a></li>
				<li><a href="form_login.html">Login</a></li>
			</ul>
		</nav>
		<section id="principal">
			<h1 style='text-align: center; color: #000000'>Listado de Productos</h1>
			<form style="display: block; margin: 0px auto; text-align: center;"
				name="frmbusqueda" accept-charset="utf-8" method="GET">
				<label>Producto a Buscar : </labeL><input type="text"
					name="producto" maxlength="50"><input type="submit" name="buscar"
					value="Buscar">
			</form>
			<br>
			
<?php
header ( 'Content-Type: text/html;charset=UTF-8' );
include_once '../includes/bdd.php';
$con = crearConexion ();
$con->set_charset ( "utf8" );
if (isset ( $_GET ['buscar'] )) {
	$claveBusqueda = $_GET ['producto'];
	$sql = "select pro.id_prod,pro.description,pro.precio,pro.cantidad,cat.description from categorias cat inner join productos pro on cat.id_categoria=pro.id_categoria where pro.description like concat('%','$claveBusqueda','%') order by pro.description";
} else {
	$sql = "select pro.id_prod,pro.description,pro.precio,pro.cantidad,cat.description from categorias cat inner join productos pro on cat.id_categoria=pro.id_categoria order by pro.description";
}
$result = $con->query ( $sql );
echo "<table style='margin: 0px auto;border:1px solid #cccccc;font-family:Verdana, Arial, Helvetica'>";
echo "<thead style='background-color:#16a085;color:#ffffff'>";
echo "<tr>";
echo "<th>";
echo "Codigo";
echo "</th>";
echo "<th>";
echo "Descripcion";
echo "</th>";
echo "<th>";
echo "precio";
echo "</th>";
echo "<th>";
echo "cantidad";
echo "</th>";
echo "<th>";
echo "categoria";
echo "</th>";
echo "</thead>";
echo "<tbody>";
while ( $row = $result->fetch_row () ) {
	echo "<tr>";
	foreach ( $row as $valor ) {
		echo "<td style='border:1px solid #ccc;text-align:center'>";
		echo $valor;
		echo "</td>";
	}
	echo "</tr>";
}
echo "</tbody>";
echo "</table>";
/* cerrar la conexión */
$con->close ();
?>
</section>
		<footer>
			<p>
				&copy; 2016 -www.casahomero.com -<span id="destacado">Todoslos
					derechos reservados</span>
			</p>
		</footer>
	</div>
</body>