<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista De usuarios</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>Codigo de estudiante</td>
                <td>DNI</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $user) { ?>
                <tr>
                    <td><?php echo $user['cod_estudiante']; ?></td>
                    <td><?php echo $user['dni']; ?></td>
                    <td><?php echo $user['nombres']; ?></td>
                    <td><?php echo $user['apellidos']; ?></td>
                    <td>
                        <a href="editar.php?cod_estudiante=<?php echo $user['cod_estudiante']; ?>">Editar</a>
                        <a href="indexx.php?eliminar=<?php echo $user['cod_estudiante']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Formulario para insertar un nuevo usuario -->
    <h2>Insertar Usuario</h2>
    <form method="post" action="Controller/C_verUsuarios.php">
        <input type="hidden" name="accion" value="insertar">
        <input type="text" name="dni" placeholder="DNI" required>
        <input type="text" name="nombres" placeholder="Nombres" required>
        <input type="text" name="apellidos" placeholder="Apellidos" required>
        <input type="submit" value="Insertar">
    </form>

    <!-- Mostrar el resultado de la inserción o eliminación -->
    <?php if (!empty($resultado)) { ?>
        <p><?php echo $resultado; ?></p>
    <?php } ?>
</body>
</html>
