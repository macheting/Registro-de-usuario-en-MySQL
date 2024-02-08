<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../inicio.css">
    <title>Inicio</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['nombre'],$_SESSION['ID'])) {
    $nombre = $_SESSION['nombre'];
    $ID = $_SESSION['ID'];
    echo '<div>
          <h1>¿Estas seguro de querer cerrar sesion?</h1>
          <fieldset id="fieldset-confirmacion">
          <a href="logout.php" id="logout-account">Si</a>
          <a href="../index.php">No</a>
          </fieldset>
          </div>';
        }
    ?>
</body>
</html>