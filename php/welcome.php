<?php
session_start();
if ($_SESSION['logueado']){
echo "<h1 style='text-align:center'>¡Bienvenido al Sistema!</h1>";
echo 'Bienvenido '.$_SESSION['username'];
echo '<br>';
echo 'Horario de Conexión: '.$_SESSION['time'];
echo '<br>';
}
?>