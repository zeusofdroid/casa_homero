<?php
function crearConexion(){
	$config = parse_ini_file('database.ini'); //esto lo que hace es tomar los datos de "database.ini" linea por linea y lo guarda dentro de un array
	$conexion = new mysqli($config['SERVIDOR'],$config['USUARIO'],$config['PASSWORD'],$config['NOMBREBDD']);
//cuando llamamos a "mysqli" estamos usando una api de mysql que nos permite conectar php con sql
if($conexion->connect_errno>0) //si el valor que me da es mayor a cero es porque no hay conexion con el servidor
	die ("Error en la conexión");

return $conexion;
}
