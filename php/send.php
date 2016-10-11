<?php
session_start();
if (isset($_POST['enviar']) && $_POST["captcha"] && $_POST["captcha"]!="" &&
		$_SESSION["code"]==$_POST["captcha"])
{
	$nombre = $_POST['nombre'];
	$mail = $_POST['mail'];
	$empresa = $_POST['empresa'];


	
	$header ="From: " . $mail . "\r\n";
	$header .="X-Mailer: PHP/" . phpversion() . "\r\n";
	$header .="Mime-Version: 1.0 \r\n";
	$header .="Content-Type: text/plain";

	$mensaje = "Este mensaje fue enviado por " . $nombre . ", de la empresa" . $empresa . " \r\n";
	$mensaje .= "Su e-mail es:" . $mail . " \r\n";
	$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
	$mensaje .= "Enviado el " . date('d/m/Y', time());

	$para = "info@micorreo.com.ar";
	$asunto = "Pedido de información de: " . $nombre;

if (($nombre=="") or ($mail=="") or ($_POST['mensaje']==""))
	{
	//header("location: error.html");
	echo "Error en el envío del correo";
	}
else
	{
	mail($para, $asunto, utf8_decode($mensaje), $header);
	header("location:../html/correo_enviado.html");
	}
}
elseif ($_SESSION["code"]!=$_POST["captcha"])
	{
	echo "<p style='text-align:center'>Codigo inválido</p>";
	}
?>
