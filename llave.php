<?php
session_start();
$pageTitle = 'DETALLE LLAVE';

require_once('modelos/connectvars.php');
require_once('modelos/baseMysql.php');

//Si el usuario no está logueado aún lo llevo a la página de inicio:
if (!isset($_SESSION['user_id'])) 
  {
  echo "El usuario aún no está logueado en el sistema. Por favor verifique.<br><a href='logout.php'>Salir</a>";
}
else
  {
  $idllave = intval($_GET['idkeys']);
  $ref = intval($_GET['idreferencia']);
  $codigo = $_GET['codigo'];
  $actividad = $_GET['idactividades'];
      
  //Conexión con la base de datos:
  $dbc = crearConexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
  if ($_POST['flagEditar'] == 1)
    {
    $idllave = $_POST['idllave'];
    $ref = $_POST['idreferencia'];
    $nombreLlave = $_POST['nombreLlave'];
    $codigo = $_POST['codigo'];
    $owner = $_POST['owner'];
    $version = $_POST['version'];
    $tipo = $_POST['tipo'];
    $tarea = $_POST['tarea'];
    $actividad = $_POST['idactividades'];
    
    switch ($tipo)
      {
      case 'DES2': $des2 = 'selected';
                   break;
      case 'RSA':  $rsa = 'selected';
                   break;
      default: break;                       
    }
    $bits = $_POST['bits'];
    $exponente = $_POST['exponente'];
    $kcv = strtoupper($_POST['kcv']);
    $generacion = $_POST['generacion'];
    $accion = $_POST['accion'];
    switch ($accion)
        {
        case 'Carga': $carga = 'selected';
                      break;
        case 'Generación': $genSelected = 'selected';
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
    switch ($generacion)
      {
      case 'Aleatoria': $aleatoria = 'selected';
                        break;
      case 'Importada': $importada = 'selected';
                        break;
      case 'En componentes': $componentes = 'selected';
                             break;
      case 'Desde componentes': $desdeComponentes = 'selected';
                                break;
      default: break;                       
    }
    
    if (is_null($exponente) || ($exponente == "No aplica") || ($exponente == '')) $exponente = 0;
    
    if (($uso_encrypt = $_POST['uso_encrypt']) == "on") $uso_encrypt = 1; else $uso_encrypt = 0;
    if (($uso_sign = $_POST['uso_sign']) == "on") $uso_sign = 1; else $uso_sign = 0;
    if (($uso_wrap = $_POST['uso_wrap']) == "on") $uso_wrap = 1; else $uso_wrap = 0;
    if (($uso_export = $_POST['uso_export']) == "on") $uso_export = 1; else $uso_export = 0;
    if (($uso_derive = $_POST['uso_derive']) == "on") $uso_derive = 1; else $uso_derive = 0;
    if (($uso_decrypt = $_POST['uso_decrypt']) == "on") $uso_decrypt = 1; else $uso_decrypt = 0;
    if (($uso_verify = $_POST['uso_verify']) == "on") $uso_verify = 1; else $uso_verify = 0;
    if (($uso_unwrap = $_POST['uso_unwrap']) == "on") $uso_unwrap = 1; else $uso_unwrap = 0;
    if (($uso_import = $_POST['uso_import']) == "on") $uso_import = 1; else $uso_import = 0;
    
    if (($att_sensitive = $_POST['att_sensitive']) == "on") $att_sensitive = 1; else $att_sensitive = 0;
    if (($att_modifiable = $_POST['att_modifiable']) == "on") $att_modifiable = 1; else $att_modifiable = 0;
    if (($att_private = $_POST['att_private']) == "on") $att_private = 1; else $att_private = 0;
    if (($att_extractable = $_POST['att_extractable']) == "on") $att_extractable = 1; else $att_extractable = 0;
    if (($att_exportable = $_POST['att_exportable']) == "on") $att_exportable = 1; else $att_exportable = 0;
    if (($att_trusted = $_POST['att_trusted']) == "on") $att_trusted = 1; else $att_trusted = 0;
    if (($att_wrapwtrusted = $_POST['att_wrapwtrusted']) == "on") $att_wrapwtrusted = 1; else $att_wrapwtrusted = 0;
    if (($att_unwrapmask = $_POST['att_unwrapmask']) == "on") $att_unwrapmask = 1; else $att_unwrapmask = 0;
    if (($att_derivemask = $_POST['att_derivemask']) == "on") $att_derivemask = 1; else $att_derivemask = 0;
    if (($att_deletable = $_POST['att_deletable']) == "on") $att_deletable = 1; else $att_deletable = 0;
    
    
    //Consulta para actualizar los datos de la tabla tareas:
    $actualizarTarea = "update tareas set accion='$accion', observaciones='$observaciones' where idtareas = '$tarea'";
    $data = consultarBD($actualizarTarea, $dbc);
    
    //Consulta para actualizar los datos de la tabla llave:
    $actualizarLlave = "update llaves set nombre='$nombreLlave', owner='$owner', version='$version', tipo='$tipo', bits='$bits', exponente=$exponente, kcv='$kcv', modoGeneracion='$generacion', uso_encrypt='$uso_encrypt', uso_sign='$uso_sign',"
            . " uso_wrap='$uso_wrap', uso_export='$uso_export', uso_derive='$uso_derive', uso_decrypt='$uso_decrypt', uso_verify='$uso_verify', uso_unwrap='$uso_unwrap', uso_import='$uso_import', "
            . " att_sensitive='$att_sensitive', att_modifiable='$att_modifiable', att_private='$att_private', att_extractable='$att_extractable', att_exportable='$att_exportable', att_trusted='$att_trusted', "
            . "att_wrapwtrusted='$att_wrapwtrusted', att_unwrapmask='$att_unwrapmask', att_derivemask='$att_derivemask', att_deletable='$att_deletable'"
            . " where idkeys='$idllave'";
    $data1 = consultarBD($actualizarLlave, $dbc);
    if ($data1) $mensajeActualizacion = "Actualización exitosa:<br>";
    else $mensajeActualizacion = "ERROR. Por favor verifique.<br>";
  }
  
  //********* CALCULO INDICES PARA NAVEGACION ******************************************************
  //Consulta para determinar las llaves involucradas en la referencia:
  $consultaIds = "select llaves.idkeys, tareas.observaciones from llaves inner join tareas on llaves.tarea=tareas.idtareas inner join referencias on referencias.idreferencias=tareas.referencia where idreferencias='$ref' and llaves.estado='activa';";
  $data = consultarBD($consultaIds, $dbc);
  $filas = obtenerResultados($data);
  $num_llaves = $data->num_rows;
  foreach($filas as $fila)
    {
    $idkey[] = $fila->idkeys;
  }
  $primera = $idkey[0];
  $ultima = $idkey[$num_llaves - 1];
  $indiceActual = array_search($idllave, $idkey);
  if ($indiceActual >= 0)
    {
    if ($indiceActual == 0)
      {
      $anterior = $idkey[0];
    }
    else
      {
      $anterior = $idkey[$indiceActual - 1];
    }
    if ($indiceActual == ($num_llaves - 1))
      {
      $siguiente = $idkey[$num_llaves - 1];
    }
    else
      {
    $siguiente = $idkey[$indiceActual + 1];
    }
  }
  //********************** FIN CALCULO INDICES PARA NAVEGACION **************************************        
  
  //Consulta para determinar los datos de la llave:
  $query = "select * from llaves inner join tareas on llaves.tarea=tareas.idtareas where idkeys = '$idllave' and estado='activa'";
  $data = consultarBD($query, $dbc);
  $filas = obtenerResultados($data);
  $registro = $data->num_rows;
  if ($registro == 0) $llaveInactiva = "Esta llave no está activa en este momento.<br>";
  else
    {
    foreach($filas as $fila)
      {
      $nombreLlave = $fila->nombre;
      $owner = $fila->owner;
      $version = $fila->version;
      $tipo = $fila->tipo;
      switch ($tipo)
        {
        case 'DES2': $des2 = 'selected';
                     break;
        case 'RSA':  $rsa = 'selected';
                     break;
        default: break;                       
      }
      $generacion = $fila->modoGeneracion;
      $kcv = strtoupper($fila->kcv);
      $bits = $fila->bits;
      $tarea = $fila->tarea;
      $accion = $fila->accion;
      switch ($accion)
        {
        case 'Carga': $carga = 'selected';
                      break;
        case 'Generación': $genSelected = 'selected';
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
      switch ($generacion)
        {
        case 'Aleatoria': $aleatoria = 'selected';
                          break;
        case 'Importada': $importada = 'selected';
                          break;
        case 'En componentes': $componentes = 'selected';
                               break;
        case 'Desde componentes': $desdeComponentes = 'selected';
                                  break;
        default: break;                       
      }
      if ((($exponente = $fila->exponente)) == 0) $exponente = "No aplica";

      if ($uso_encrypt = $fila->uso_encrypt) {$uso_encrypt = "checked";}else {$uso_encrypt = "";}
      if ($uso_decrypt = $fila->uso_decrypt) {$uso_decrypt = "checked";}else {$uso_decrypt = "";}
      if ($uso_sign = $fila->uso_sign) {$uso_sign = "checked";}else {$uso_sign = "";};
      if ($uso_verify = $fila->uso_verify) {$uso_verify = "checked";}else {$uso_verify = "";}
      if ($uso_wrap = $fila->uso_wrap) {$uso_wrap = "checked";}else {$uso_wrap = "";}
      if ($uso_unwrap = $fila->uso_unwrap) {$uso_unwrap = "checked";}else {$uso_unwrap = "";}
      if ($uso_import = $fila->uso_import) {$uso_import = "checked";}else {$uso_import = "";}
      if ($uso_export = $fila->uso_export) {$uso_export = "checked";}else {$uso_export = "";}
      if ($uso_derive = $fila->uso_derive) {$uso_derive = "checked";}else {$uso_derive = "";}
      if ($att_sensitive = $fila->att_sensitive) {$att_sensitive = "checked";}else {$att_sensitive = "";}
      if ($att_trusted = $fila->att_trusted) {$att_trusted = "checked";}else {$att_trusted = "";}
      if ($att_modifiable = $fila->att_modifiable) {$att_modifiable = "checked";}else {$att_modifiable = "";}
      if ($att_wrapwtrusted = $fila->att_wrapwtrusted) {$att_wrapwtrusted = "checked";}else {$att_wrapwtrusted = "";}
      if ($att_private = $fila->att_private) {$att_private = "checked";}else {$att_private = "";}
      if ($att_unwrapmask = $fila->att_unwrapmask) {$att_unwrapmask = "checked";}else {$att_unwrapmask = "";}
      if ($att_extractable = $fila->att_extractable) {$att_extractable = "checked";}else {$att_extractable = "";}
      if ($att_derivemask = $fila->att_derivemask) {$att_derivemask = "checked";}else {$att_derivemask = "";}
      if ($att_exportable = $fila->att_exportable) {$att_exportable = "checked";}else {$att_exportable = "";}
      if ($att_deletable = $fila->att_deletable) {$att_deletable = "checked";}else {$att_deletable = "";}
    }
  }
  require_once ('vistas/cabecera.php');
  require_once ('vistas/navegacion.php');
  require_once ('vistas/vistaLlave.php');
}
?>

