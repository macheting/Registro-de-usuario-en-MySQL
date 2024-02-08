<?php
session_start();
$nombre = $_SESSION['nombre'];
$ID = $_SESSION['ID'];
session_unset();
session_destroy();

$conexion = new mysqli("localhost","root","","basededatos-test");
$query = mysqli_query($conexion,"DELETE FROM `usuarios` WHERE ID = '$ID';");

header("Location: ../index.php");
?>