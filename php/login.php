<?php
header('content-type: text/html; charset=UTF-8'); //esto, lo de UTF-8, Claudio siempre lo aclara para no tener problemas con los asentos y demases
$usuario=$_POST['user'];
$pass=$_POST['password'];
// echo $usuario;	//prueba para ver si funciona y me toma las variable que ingreso en el navegador
// echo "<br>";
// echo $pass;

// define('SERVIDOR', 'localhost');  //todo esto lo paso al archivo de configuración que creé (database.ini)
// define('NOMBREBDD', 'login');
// define('USUARIO', 'root');
// define('PASSWORD', 'P12345678');

// $conexion = new mysqli(SERVIDOR,USUARIO,PASSWORD,NOMBREBDD);	//todo esto lo paso al archivo bdd.php y lo saco de acá (luego hay que proteger la carpeta donde está esto (que son mis funciones) y el archivo de configuración)
// if($conexion ->connect_errno>0) //si el valor que me da es mayor a cero es porque no hay conexion con el servidor
//	 die ("Error en la conexión");
	
include_once '../includes/bdd.php';	//esto me permite llamar al archivo donde voy a buscar las funciones que necesito

$con=crearConexion();
$con->set_charset("utf8");	//con esto me aseguro que los datos que se lleven y traigan del servidor sean UTF8
$sql="call login_usuario(?,?,@valor_existe)";
$stml=$con->prepare($sql);  // llama a los variables sql y las prepara para limpiar los valores de entrada
$stml->bind_param('ss',$usuario,$pass);	//limpia los valores de entrada para que sean "ss" -esto significa que sean string sin admitir instrucciones sql en la entrada-)
//ss > string
//ii > si son numeros
//dd > si son decimales
$stml->execute();
$result2=$con->query("select @valor_existe"); //lo que viene después de query se ejecuta como instruccion sql
$row=$result2->fetch_assoc();
if($row['@valor_existe']==0){
//	echo "<h1 style='text-align:center'>"."Ingreso inválido al sistema"."</h1>";  // esto estaba en la clase 46, en la 47 lo reemplazo por lo de abajo
	echo "<script> alert ('Ingreso Inválido al Sistema') </script>";
	echo "<script> window.location.assign('../html/form_login.html') </script>";	//acá estoy usando el dom.
}
else {
//	echo "Bienvenido";	// esto estaba en la clase 46, en la 47 lo reemplazo por lo de abajo
	session_start();
	$_SESSION['time']=date('H:i:s');
	$_SESSION['username']=$usuario;
	$_SESSION['logueado']=true;
	header('location:welcome.php');
}
?>