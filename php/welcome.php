<?php
session_start();
if ($_SESSION['logueado']){
echo "<h1 style='text-align:center'>¡Bienvenido al sistema!</h1>";
echo 'Bienvenido '.$_SESSION['username'];
echo '<br>';
echo 'Horario de Conexión: '.$_SESSION['time'];
echo '<br>';
echo "<a href='logout.php'> Logout </a>";
echo "<h1 style='text-align:center'> Menu de opciones </h1>";
echo "<a href='insert_productos.php'> Ingresar nuevos productos </a>";
}
?>
