<?php
session_start();
$pageTitle = 'NUEVO CERTIFICADO';

require_once('modelos/connectvars.php');
require_once('modelos/baseMysql.php');

//Si el usuario no está logueado aún lo llevo a la página de inicio:
if (!isset($_SESSION['user_id'])) 
  {
  echo "El usuario aún no está logueado en el sistema. Por favor verifique.<br><a href='logout.php'>Salir</a>";
}
else
  {
  $ref = intval($_POST['idreferencia']);
  $codigo = $_POST['codigo'];
  $actividad = $_POST['idactividades'];
  
  //Conexión con la base de datos:
  $dbc = crearConexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  
  require_once ('vistas/cabecera.php');
  require_once ('vistas/navegacion.php');
  require_once ('vistas/vistaNuevocertificado.php');
}
?>

