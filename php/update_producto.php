<?php
session_start();
if ($_SESSION['logueado']){
	header('Content-Type:text/html;charset=UTF-8');
	include_once '../includes/bdd.php';
	$con=crearConexion();
	$con->set_charset("utf-8");

	if (isset($_GET['id'])){
		$codUpdate=$_GET['id'];
		$sql="select p.id_prod,p.id_categoria,p.description,p.cantidad,p.precio,c.description from productos p inner join categorias c on p.id_categoria=c.id_categoria where p.id_prod=" . $codUpdate;
		$result=$con->query($sql);
		$row = $result->fetch_row();
	}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<style>
.jumbotron {
	text-align:center;
}
</style>
</head>

<body>

	<div class="container">
		<div class="jumbotron">
			<h2>MODIFICAR PRODUCTOS</h2>
		</div>
	</div>

	<div class="container">
		<form class="form-horizontal" method="post" action="save_producto_all.php" accept-charset="utf-8">
			<div class="form-group">
				<label class="control-label col-md-3">Descripción</label>
				<div class="col-md-7">
					<input type="text" class="form-control"	placeholder="Descripcion" name="descripcion" value="<?php echo $row[2];?>">
				</div>			
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Cantidad</label>
				<div class="col-md-7">
					<input type="text" class="form-control"	placeholder="Cantidad" name="cantidad" value="<?php echo $row[3];?>">
				</div>			
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Precio</label>
				<div class="col-md-7">
					<input type="text" class="form-control"	placeholder="Precio" name="precio" value="<?php echo $row[4];?>">
				</div>			
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Categorias:</label>
				<div class="col-md-7">
					<select class="form-control col-md-7" name="categorias">
						<?php
							header('Content-Type:text/html;charset=UTF-8');
							include_once '../includes/bdd.php';
							$con=crearConexion();
							$con->set_charset("utf-8");
							$sql="select id_categoria,description from categorias order by description";
							$result = $con->query($sql);
							while ($row2 = mysqli_fetch_assoc ($result)){
								echo '<option value="'.$row2['id_categoria']. '">'. $row2['description'] .'</option>';
							}
						?>
					</select>
				</div>	
			</div>
			<!-- clase 58 -->
			<div class="form-group">
				<input type="hidden" name="id_prod" value="<?php echo $row[0];?>">	<!-- necesito agregar el campo "id_prod" al form para poder trabajarlo, pero como no quiero que se vea le pongo el 'type="hidden"' -->
			</div>
			<div class="form-group">
				<div class="col-md-3"></div>
				<div class="col-md-7">
					<button type="submit" class="btn btn-primary" name="guardar" id="enviar">
						<span class="glyphicon glyphicon-plus"></span> Guardar Producto
					</button>
				</div>
			</div>
		</form>
	</div>



	<footer>
		<div class="container">
			<div class="row">
				<hr>
				<div class="col-md-12">
					<p class="text-center">&copy 2016 CASA HOMERO. Todos los derechos reservados</p>
				</div>
			</div>
		</div>
	</footer>


<script src="../js/jquery-1.12.4.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>


