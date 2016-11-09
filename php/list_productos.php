<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script>
	function deleteProducto(id){
		if (window.confirm("¿Desea eliminar el producto seleccionado?")){
			document.location.href = 'delete_producto.php?id=' + id;
		}
	}

	function updateProducto(id){
			document.location.href = 'update_producto.php?id=' + id;
	}
	
</script>
<style>
	.jumbotron {
		text-align:center;
	}
</style>
</head>

<body>

	<div class="container">
		<div class="jumbotron">
			<h2>LISTAR PRODUCTOS</h2>
		</div>
	</div>
	<div class="container">
		<div class="responsive">
			<table class="table">
 				<?php
					header('Content-Type: text/html;chaset=UTF-8');
					include_once '../includes/bdd.php';
					$con=crearConexion();
					$con->set_charset="utf-8";
					$sql="select pro.id_prod, pro.description, pro.precio, pro.cantidad, cat.description from categorias cat inner join productos pro on cat.id_categoria=pro.id_categoria order by pro.description;";
					$result=$con->query($sql);
				?>
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Categoria</th>
						<th>Eliminar</th>
						<th>Actualizar</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while ($row=$result->fetch_row())	// El while chequea si $row es verdadero o falso (ser� verdadero cada vez que encuentre una l�nea, cuando no haya m�s l�neas ser� falso)
						{
						  echo "<tr>";			
						  foreach ($row as $valor){	//el foreach  con el while voy trayendo filas, con el foreach articulo las lineas
						  	 echo "<td>";
						 	 echo $valor;
						 	 echo "</td>";
						  }
							 echo "<td>";
					?>
								<a href="#" onclick="deleteProducto('<?php echo $row[0];?>')">Eliminar Producto</a>
					<?php 
							 echo "</td>";
							 echo "<td>";
					?>
							 	<a href="#" onclick="updateProducto('<?php echo $row[0];?>')">Actualizar Producto</a>
					
					<?php	
							 echo "</td>";
						  echo "</tr>";
						}
					?>
					
				</tbody>
			</table>
		</div>
	
	</div>



<body>

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


