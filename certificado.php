<?php
session_start();
$pageTitle = 'DETALLE CERTIFICADO';

require_once('modelos/connectvars.php');
require_once('modelos/baseMysql.php');

//Si el usuario no está logueado aún lo llevo a la página de inicio:
if (!isset($_SESSION['user_id'])) 
  {
  echo "El usuario aún no está logueado en el sistema. Por favor verifique.<br><a href='logout.php'>Salir</a>";
}
else
  {
  $idcertificado = intval($_GET['idcertificados']);
  $ref = intval($_GET['idreferencia']);
  $codigo = $_GET['codigo'];
  $actividad = $_GET['idactividades'];
  
  //Conexión con la base de datos:
  $dbc = crearConexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
  if ($_POST['flagEditar'] == 1)
    {
    $idcertificado = $_POST['idcertificado'];
    $ref = $_POST['idreferencia'];
    $nombreCertificado = $_POST['nombreCertificado'];
    $codigo = $_POST['codigo'];
    $owner = $_POST['owner'];
    $version = $_POST['version'];
    $bandera = $_POST['bandera'];
    $tarea = $_POST['tarea'];
    $actividad = $_POST['idactividades'];
    
    switch ($bandera)
      {
      case 'VISA': $visa = 'selected';
                   break;
      case 'MASTER': $master = 'selected';
                   break;
      case 'AMEX': $amex = 'selected';
                   break;           
      default: break;                       
    }
    $vencimiento = $_POST['vencimiento'];
    $accion = $_POST['accion'];
    switch ($accion)
        {
        case 'Solicitud': $solicitud = 'selected';
                      break;
        case 'Importación': $importacion = 'selected';
                            break;
        case 'Exportación': $exportacion = 'selected';
                            break;
        case 'Borrado': $borrado = 'selected';
                        break;
        case 'Edición': $edicion = 'selected';
                        break;            
        default: break;                       
    }
    $observaciones = $_POST['observaciones']; 
    
    //Consulta para actualizar los datos de la tabla tareas:
    $actualizarTarea = "update tareas set accion='$accion', observaciones='$observaciones' where idtareas = '$tarea'";//echo $actualizarTarea."<br>";
    $data = consultarBD($actualizarTarea, $dbc);
    
    //Consulta para actualizar los datos de la tabla llave:
    $actualizarCertificado = "update certificados set nombre = '$nombreCertificado', owner = '$owner', version = '$version', bandera = '$bandera', vencimiento = '$vencimiento'"
                           . " where idcertificados = '$idcertificado'";//echo $actualizarCertificado."<br>";
    $data1 = consultarBD($actualizarCertificado, $dbc);
    if ($data1) $mensajeActualizacion = "Actualización exitosa:<br>";
    else $mensajeActualizacion = "ERROR. Por favor verifique.<br>";
  }
  
  //********* CALCULO INDICES PARA NAVEGACION ******************************************************
  //Consulta para determinar los certificados involucrados en la referencia:
  $consultaIds = "select certificados.idcertificados from certificados inner join tareas on certificados.tarea=tareas.idtareas inner join referencias on referencias.idreferencias=tareas.referencia where referencias.idreferencias = '$ref' and certificados.estado='activo';";
  $data = consultarBD($consultaIds, $dbc);
  $filas = obtenerResultados($data);
  $num_certificados = $data->num_rows;
  foreach($filas as $fila)
    {
    $idcertificados[] = $fila->idcertificados;
  }
  $primero = $idcertificados[0];
  $ultimo = $idcertificados[$num_certificados - 1];
  $indiceActual = array_search($idcertificado, $idcertificados);
  if ($indiceActual >= 0)
    {
    if ($indiceActual == 0)
      {
      $anterior = $idcertificados[0];
    }
    else
      {
      $anterior = $idcertificados[$indiceActual - 1];
    }
    if ($indiceActual == ($num_certificados - 1))
      {
      $siguiente = $idcertificados[$num_certificados - 1];
    }
    else
      {
    $siguiente = $idcertificados[$indiceActual + 1];
    }
  }
  //********************** FIN CALCULO INDICES PARA NAVEGACION **************************************        
  
  //Consulta para determinar los datos de la llave:
  $query = "select * from certificados inner join tareas on certificados.tarea=tareas.idtareas where idcertificados = '$idcertificado' and estado='activo'";
  $data = consultarBD($query, $dbc);
  $filas = obtenerResultados($data);
  $registro = $data->num_rows;
  if ($registro == 0) $certificadoInactivo = "Esta certificado no está activo en este momento.<br>";
  else
    {
    foreach($filas as $fila)
      {
      $nombreCertificado = $fila->nombre;
      $owner = $fila->owner;
      $version = $fila->version;
      $bandera = $fila->bandera;
      switch ($bandera)
        {
        case 'VISA':   $visa = 'selected';
                       break;
        case 'MASTER': $master = 'selected';
                       break;
        case 'AMEX':   $amex = 'selected';
                       break;             
        default: break;                       
      }
      $vencimiento = $fila->vencimiento;
      $tarea = $fila->tarea;
      $accion = $fila->accion;
      switch ($accion)
        {
        case 'Solicitud': $solicitud = 'selected';
                          break;
        case 'Importación': $importacion = 'selected';
                            break;
        case 'Exportación': $exportacion = 'selected';
                            break;
        case 'Borrado': $borrado = 'selected';
                        break;
        case 'Edición': $edicion = 'selected';
                        break;            
        default: break;                       
      }
      $observaciones = $fila->observaciones;
    }
  }
  require_once ('vistas/cabecera.php');
  require_once ('vistas/navegacion.php');
  require_once ('vistas/vistaCertificado.php');
}
?>

