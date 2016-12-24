<?php
session_start();
$pageTitle = 'REGISTRO DE ACTIVIDADES';

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
  
  $flagEliminar = $_POST['flagEliminar'];
  
  if ($flagEliminar == 1)
    {
    $actividad = $_POST["idactividades"];
    $borrar = "update actividades set estado='inactiva' where idactividades='$actividad'";
    
    $data = consultarBD($borrar, $dbc);
    if ($data) 
      {
      $mensajeBorrado = "¡¡Actividad borrada con éxito!!.<br>";
    }  
    else
      {
      $mensajeBorrado = "¡¡ERROR!!. Por favor verifique.<br>";
    }
  }
  
  $query = "select idactividades, fecha, horaInicio, horaFin, usuario1, usuario2, rolUsuario1, rolUsuario2, motivo from actividades where estado='activa' order by fecha asc";
         
  $data = consultarBD($query, $dbc);
  $filas = obtenerResultados($data);
  $registros = $data->num_rows;
  
  if ($registros >= 1) 
    {  
    foreach($filas as $fila)
      {
      $idactividades[] = $fila->idactividades;
      $horaInicios[] = $fila->horaInicio;
      $horaFines[] = $fila->horaFin;
      $usuarios1[] = $fila->usuario1;
      $usuarios2[] = $fila->usuario2;
      $roles1[] = $fila->rolUsuario1;
      $roles2[] = $fila->rolUsuario2;
      $motivos[] = $fila->motivo;
      
      $query1 = "select apellido, nombre, empresa from usuarios where idusuarios=".$fila->usuario1."";
      $data1 = consultarBD($query1, $dbc);
      $filas1 = obtenerResultados($data1);
      $apellidos1[] = $filas1[1]->apellido;
      $nombres1[] = $filas1[1]->nombre;
      $empresas1[] = $filas1[1]->empresa;
          
      $query2 = "select apellido, nombre, empresa from usuarios where idusuarios=".$fila->usuario2."";
      $data2 = consultarBD($query2, $dbc);
      $filas2 = obtenerResultados($data2);
      $apellidos2[] = $filas2[1]->apellido;
      $nombres2[] = $filas2[1]->nombre;
      $empresas2[] = $filas2[1]->empresa;   
      
      $sepa = explode('-', $fila->fecha);
      $fechas[] = $sepa[2].'/'.$sepa[1].'/'.$sepa[0];
    }
  }
  else 
    {
    $error_msg = "NO HAY REGISTROS EN EL LOGBOOK<br>";
  }
  require_once ('vistas/cabecera.php');
  require_once ('vistas/navegacion.php');
  require_once ('vistas/vistaLogbook.php');
}
?>

