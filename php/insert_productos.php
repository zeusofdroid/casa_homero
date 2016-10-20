<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Insert title here</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<style>
h3{
	margin-bottom:30px
}

form{
position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);
-webkit-transform: translate(-50%, -50%)
}
</style>
</head>
<body>
	<h1>Agregar productos</h1>
	<form class="form-horizontal" method="post" name="ingreso_productos" action="save_producto.php" accept-charset="utf-8">
		<div class="form-group">
			<label class="control-label col-md-3">Descripcion:</label>
			<div class="col-md-9">
				<input type="text" class="form-control" placeholder="Descripcion" name="descripcion">
			</div>
			<!-- Lo anterior es igual a poner:
			<label class="control-label col-md3">Description:</label>
			<input type="text" class="form-control col-md-9" placeholder="Descripcion" name="descripcion">
			(Nota: el div que se puso de más fue porque el profe había puesto otra cosa más además del input, y quería que las 9 columnas restantes las usen los dos elementos. En la versión que nos mostró a nostros sólo hay un elemento que es el input, así que no tiene sentido hacer el div. Lo dejo porque creo que después nos va a pasar el otro parámetro que va dentro de ese div. Sin embargo, probé sin poner ese div y visualmente me queda distinto, no sé por qué -y Claudio tampoco sabe-)
			 -->
		</div>
		<div class="form-group">
			<label class="control-label col-md-3">Cantidad:</label>
			<div class="col-md-9">
				<input type="text" class="form-control" placeholder="Cantidad" name="cantidad">
			</div>
		</div>	
		<div class="form-group">
			<label class="control-label col-md-3">Precio:</label>
			<div class="col-md-9">
				<input type="text" class="form-control col-md-9" placeholder="Precio" name="precio">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3">Categorias:</label>
			<div class="col-md-9">
				<select class="form-control col-md-9" name="categorias">
					<?php
						header('Content-Type:text/html;charset=UTF-8');
						include_once '../includes/bdd.php';
						$con=crearConexion();
						$con->set_charset("utf-8");
						$sql="select id_categoria,description from categorias order by description";
						$result = $con->query($sql);
						while ($row = mysqli_fetch_assoc ($result)){
						//	echo '<option value="">.  .'</option>';
						//	echo '<option value="">'. $row['description'] .'</option>';  //$row: me trae una fila de la memoria y 'description' es el nombre de la columna
						//	echo '<option value="$row[id_categoria]">'. $row['description'] .'</option>';
							echo '<option value="'.$row['id_categoria']. '">'. $row['description'] .'</option>';  //$row: me trae una fila de la memoria y 'description' es el nombre de la columna
						}
					?>
				</select>
			</div>	
		</div>
		<div class="form-group">
			<div class="col-md-3"></div>
		  	<div class="col-md-9">		
  				<button type="submit" class="btn btn-primary ">Agregar</button>
			</div>		
		</div>
	</form>
<script type="text/javascript" src="../js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>	
</body>
</html>