<?php
class MySQL
{
  private $conexion;

  public function __construct()
  {
    $this->conexion = new mysqli("localhost", "root", "", "paises");
    if ($this->conexion->connect_error) {
      die("MySQL Error: " . $this->conexion->connect_error);
    }
  }

  public function consulta($consulta)
  {
    $resultado = $this->conexion->query($consulta);
    if (!$resultado) {
      echo 'MySQL Error: ' . $this->conexion->error;
      exit;
    }
    return $resultado;
  }

  public function fetch_array($resultado)
  {
    return $resultado->fetch_array();
  }

  public function num_rows($resultado)
  {
    return $resultado->num_rows;
  }

  public function fetch_row($resultado)
  {
    return $resultado->fetch_row();
  }

  public function fetch_assoc($resultado)
  {
    return $resultado->fetch_assoc();
  }

  public function cerrarConexion()
  {
    $this->conexion->close();
  }
}
?>
