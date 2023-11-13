<?php
require(__DIR__ . '/../Model/Conexion.php');

// Crear una instancia de la clase Conexion
$con = new Conexion();

// Inicializar la variable resultado
$resultado = null;

// Validar la acción
if (isset($_POST['accion'])) {
    if ($_POST['accion'] === 'insertar') {
        // Validar y obtener datos del formulario
        $dni = isset($_POST['dni']) ? $_POST['dni'] : "";
        $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : "";
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
        if (!empty($dni) && !empty($nombres) && !empty($apellidos)) {
            $resultado = $con->insertUser($dni, $nombres, $apellidos);
        }
    } elseif ($_POST['accion'] === 'actualizar') {
        // Validar y obtener datos del formulario
        $cod_estudiante = isset($_POST['cod_estudiante']) ? $_POST['cod_estudiante'] : 1;
        $dni = isset($_POST['dni']) ? $_POST['dni'] : "";
        $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : "";
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
        if (!empty($dni) && !empty($nombres) && !empty($apellidos)) {
            $resultado = $con->updateUser($cod_estudiante, $dni, $nombres, $apellidos);
        }
    }
}

// Eliminar un usuario si se proporciona el parámetro "eliminar" en la URL
if (isset($_GET['eliminar'])) {
    $cod_estudiante = $_GET['eliminar'];
    $resultado = $con->deleteUser($cod_estudiante);
}

// Obtener la lista de usuarios
$usuarios = $con->getUsers();

// Incluir la vista para mostrar los resultados
require(__DIR__ . '/../Views/V_verUsuarios.php');
