<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="inicio.css">
    <title>Inicio</title>
</head>
<body>
<?php 
    session_start();
    if (isset($_SESSION['nombre'],$_SESSION['ID'])) {
    $nombre = $_SESSION['nombre'];
    $ID = $_SESSION['ID'];
    echo '<div>
          <h1><img src="round-circle.svg">'.$nombre.'</h1>
          <h2>#'.$ID.'</h2>
          <a href="confirmaciones/confirmacion-logout.php">Cerrar sesion</a>
          <a href="confirmaciones/confirmacion-borrar.php" id="delete-account">Eliminar cuenta</a>
          </div>';
    } else { 
   echo '<div>
        <h1>¿Que desea hacer?</h1>
        <p><a href="subpaginas/registro.html">Registrarse</a> | <a href="subpaginas/inicio.html">Iniciar Sesion</a></p>
        </div>'; }
    ?>
    
</body>
</html>