<?php
session_start();
$pageTitle = 'NUEVA ACTIVIDAD';

require_once('modelos/connectvars.php');
require_once('modelos/baseMysql.php');

//Si el usuario no está logueado aún lo llevo a la página de inicio:
if (!isset($_SESSION['user_id'])) 
  {
  echo "El usuario aún no está logueado en el sistema. Por favor verifique.<br><a href='logout.php'>Salir</a>";
}
else
  {
  //Conexión con la base de datos:
  $dbc = crearConexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  
  //Consulta para determinar los usuarios disponibles:
  $query = "select idusuarios, nombre, apellido, empresa from usuarios where estado='activo' and empresa='EMSA'";
  $data = consultarBD($query, $dbc);
  $filas = obtenerResultados($data);
  foreach($filas as $fila)
    {
    $idusuario = intval($fila->idusuarios);
    $usuarios[$idusuario] = $fila->nombre." ".$fila->apellido;
  }

}

require_once ('vistas/cabecera.php');
require_once ('vistas/navegacion.php');
require_once ('vistas/vistaNuevaActividad.php');
?>

