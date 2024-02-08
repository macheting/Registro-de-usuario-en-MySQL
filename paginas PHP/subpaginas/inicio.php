<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inicio.css">
    <title>Resultado del formulario</title>
</head>
<body>
<?php

//Realiza la conexion a la base de datos
$conexion = new mysqli("localhost","root","","basededatos-test");

if ($conexion->connect_error){
    die("Error en la conexion a la Base de Datos: ".$conexion->connect_error);
}

//Toma los datos del formulario
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$password = $_POST["password"];

//verifica si existen los datos ingresados en el formulario en la base de datos
$query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE nombre = '$nombre' AND email = '$email' AND password = '$password';");
$filas = mysqli_num_rows($query);

if ($filas == 1){ 
    session_start();
    $query = mysqli_query($conexion,"SELECT ID FROM `usuarios` WHERE nombre = '$nombre';");
    if ($query) {
        $fila = mysqli_fetch_assoc($query);
        $ID = $fila['ID'];
    
        $_SESSION['nombre'] = $nombre;
        $_SESSION['ID'] = $ID;
    }
    echo '<div>Se inicio sesion correctamente<br><br><a href="../index.php">Volver al inicio</a></div>';
} else if ($filas == 0){
    echo '<div>El usuario, email o contraseña no se a encontrado<br><br><a href="inicio.html">Volver al formulario</a></div>';
} else {
    
}

?>
</body>
</html>
