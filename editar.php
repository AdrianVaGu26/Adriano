<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>
    <?php
    // Incluye la clase de conexión
    require(__DIR__ . '/../Model/Conexion.php');
    $con = new Conexion();

    if (isset($_GET['cod_estudiante']) && is_numeric($_GET['cod_estudiante'])) {
        $cod_estudiante = $_GET['cod_estudiante'];
        
        // Realiza la consulta para obtener los datos del usuario
        $user = $con->getUsers();
        
        if ($user) {
    ?>
    <form method="POST" action="Controller/C_verUsuarios.php">
        <input type="hidden" name="accion" value="actualizar">
        <input type="hidden" name="cod_estudiante" value="<?php echo $user['cod_estudiante']; ?>">
        <input type="text" name="dni" value="<?php echo $user['dni']; ?>" required>
        <input type="text" name="nombres" value="<?php echo $user['nombres']; ?>" required>
        <input type="text" name="apellidos" value="<?php echo $user['apellidos']; ?>" required>
        <input type="submit" value="Actualizar">
    </form>
    <?php
        }
    }
    ?>

    <!-- Mostrar el resultado de la actualización (debe ser pasado desde el controlador) -->
    <?php if (isset($resultado)) { ?>
    <p><?php echo $resultado; ?></p>
    <?php } ?>
</body>
</html>
