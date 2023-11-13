<?php
class Conexion {
  private $con;

  public function __construct() {
      try {
          $this->con = new mysqli('localhost', 'root', '', 'bdalumos');
          if ($this->con->connect_error) {
              die("Error en la conexión: " . $this->con->connect_error);
          }
      } catch (Exception $e) {
          die("Error en la conexión: " . $e->getMessage());
      }
  }

  public function insertUser($dni, $nombres, $apellidos) {
      try {
          $dni = (int)$dni; // Asegurarse de que $dni sea un entero
          $nombres = $this->con->real_escape_string($nombres);
          $apellidos = $this->con->real_escape_string($apellidos);

          $sql = "INSERT INTO alumnos (dni, nombres, apellidos) VALUES ($dni, '$nombres', '$apellidos')";
          if ($this->con->query($sql) === true) {
              return "Registro insertado correctamente";
          } else {
              return "Error al insertar registro: " . $this->con->error;
          }
      } catch (Exception $e) {
          return "Error: " . $e->getMessage();
      }
  }

  public function updateUser($cod_estudiante, $dni, $nombres, $apellidos) {
      try {
          $cod_estudiante = $this->con->real_escape_string($cod_estudiante);
          $dni = (int)$dni; // Asegurarse de que $dni sea un entero
          $nombres = $this->con->real_escape_string($nombres);
          $apellidos = $this->con->real_escape_string($apellidos);

          $sql = "UPDATE alumnos SET dni = $dni, nombres = '$nombres', apellidos = '$apellidos' WHERE cod_estudiante = '$cod_estudiante'";
          if ($this->con->query($sql) === true) {
              return "Registro actualizado correctamente";
          } else {
              return "Error al actualizar registro: " . $this->con->error;
          }
      } catch (Exception $e) {
          return "Error: " . $e->getMessage();
      }
  }

  public function deleteUser($cod_estudiante) {
      try {
          $cod_estudiante = $this->con->real_escape_string($cod_estudiante);

          $sql = "DELETE FROM alumnos WHERE cod_estudiante = '$cod_estudiante'";
          if ($this->con->query($sql) === true) {
              return "Registro eliminado correctamente";
          } else {
              return "Error al eliminar registro: " . $this->con->error;
          }
      } catch (Exception $e) {
          return "Error: " . $e->getMessage();
      }
  }

  public function getUsers() {
      try {
          $query = $this->con->query('SELECT * FROM alumnos');
          $retorno = [];
          while ($fila = $query->fetch_assoc()) {
              $retorno[] = $fila;
          }
          return $retorno;
      } catch (Exception $e) {
          return "Error: " . $e->getMessage();
      }
  }
}
