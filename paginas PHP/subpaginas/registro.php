<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registro.css">
    <title>Resultado del formulario</title>
</head>
<body>
<?php

//Realiza la conexion a la base de datos
$conexion = new mysqli("localhost","root","","basededatos-test");

if ($conexion->connect_error){
    die("Error en la conexion a la BD: ".$conexion->connect_error);
}

//Toma los datos del formulario
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$password = $_POST["password"];

//Verifica que el nombre y el email no esten en uso
$consulta = "SELECT * FROM usuarios WHERE nombre = '$nombre' OR  email = '$email';";
$resultado = $conexion->query($consulta);
if ($resultado->num_rows > 0) {
    echo '<div>El usuario o el mail ya estan en uso<br><br><a href="registro.html">Volver al formulario</a></div>';
} else {
    $sql = "INSERT INTO usuarios (nombre,email,password) VALUES ('$nombre','$email','$password')";
    $conexion->query($sql);
    session_start();
    $query = mysqli_query($conexion,"SELECT ID FROM `usuarios` WHERE nombre = '$nombre';");
    if ($query) {
        $fila = mysqli_fetch_assoc($query);
        $ID = $fila['ID'];
    
        $_SESSION['nombre'] = $nombre;
        $_SESSION['ID'] = $ID;
    }
    echo '<div>Se a registrado correctamente<br><br><a href="../index.php">Volver al inicio</a></div>';
}

?>
</body>
</html>
