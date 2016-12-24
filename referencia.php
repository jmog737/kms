<?php
session_start();
$pageTitle = 'DETALLE REFERENCIA';

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
  
  $flagNuevaLlave = $_POST['flagNuevaLlave'];
  $flagNuevoCertificado = $_POST['flagNuevoCertificado'];
  $flagEliminar = $_POST['flagEliminar'];
  $flagEditar = $_POST['flagEditar'];
  $flagNuevaReferencia = $_POST['flagNuevaReferencia'];
    
  if ($flagNuevaLlave == 1)
    {
    $ref = $_POST['idreferencia'];
    $codigo = $_POST['codigo'];
    $actividad = $_POST['idactividades'];
    
    //Proceso de agregado de la nueva llave en la base:
    $nombreNuevaLlave = $_POST['nombreLlave'];
    $owner = $_POST['owner'];
    $kcv = strtoupper($_POST['kcv']);
    $tipo = $_POST['tipo'];
    $version = $_POST['version'];
    $generacion = $_POST['generacion'];
    $accion = $_POST['accion'];
    $bits = $_POST['bits'];
    $exponente = $_POST['exponente'];if ($exponente == null) $exponente = 0;
    $observaciones = $_POST['observaciones'];
    
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
    
    /*
    //Verificación de los parámetros pasados:
    echo "nombre: ".$nombreNuevaLlave." owner: ".$owner." kcv: ".$kcv."<br>".
         "tipo: ".$tipo." bits: ".$bits." version: ".$version."<br>".
         "generación: ".$generacion." accion: ".$accion." exponente: ".$exponente."<br>".
         "observaciones: ".$observaciones."<br>".
         "encrypt: ".$uso_encrypt." sign: ".$uso_sign." wrap: ".$uso_wrap." export: ".$uso_export." derive: ".$uso_derive."<br>".
         "decrypt: ".$uso_decrypt." verify: ".$uso_verify." unwrap: ".$uso_unwrap." import: ".$uso_import."<br>".
         "sensitive: ".$att_sensitive." modifiable: ".$att_modifiable." private: ".$att_private." extractable: ".$att_extractable." exportable: ".$att_exportable."<br>".
         "trusted: ".$att_trusted." wrapwtrusted: ".$att_wrapwtrusted." unwrapmask: ".$att_unwrapmask." derivemask: ".$att_derivemask." deletable: ".$att_deletable."<br>";         
    */
    
    //Consulta para crear la tarea asociada a la creación de la llave:
    $agregarTareaLlave = "insert into tareas (referencia, accion, observaciones) values ($ref, '$accion', '$observaciones')";
    $data = consultarBD($agregarTareaLlave, $dbc);
    
    //Consulta para conocer el id de la tarea creada:
    $recuperarId = "select idtareas from tareas order by idtareas desc limit 1";
    $data1 = consultarBD($recuperarId, $dbc);
    $filas = obtenerResultados($data1, $dbc);
    foreach($filas as $fila)
      {
      $tarea = $fila->idtareas;
    }
       
    //Verifico si se agregó correctamente el registro en la tabla tareas. De ser así, agrego el registro de la llave.
    if ($data === TRUE)
      {
      $agregarLlave = "insert into llaves (tarea, nombre, owner, version, tipo, modoGeneracion, kcv, bits, exponente, estado, "
                     ."uso_encrypt, uso_decrypt, uso_sign, uso_verify, uso_wrap, uso_unwrap, uso_import, uso_export, uso_derive, "
                     ."att_sensitive, att_trusted, att_modifiable, att_wrapwtrusted, att_private, att_unwrapmask, att_extractable, att_derivemask, att_exportable, att_deletable) "
                     ."values ($tarea, '$nombreNuevaLlave', '$owner', '$version', '$tipo', '$generacion', '$kcv', $bits, $exponente, 'activa', "
                     ."$uso_encrypt, $uso_decrypt, $uso_sign, $uso_verify, $uso_wrap, $uso_unwrap, $uso_import, $uso_export, $uso_derive, "
                     ."$att_sensitive, $att_trusted, $att_modifiable, $att_wrapwtrusted, $att_private, $att_unwrapmask, $att_extractable, $att_derivemask, $att_exportable, $att_deletable)";
      $data1 = consultarBD($agregarLlave, $dbc);
      
      //Verifico si se agregó correctamente el registro en la tabla llaves:
      if ($data1 === TRUE)
        {
        $confirmacionLLave = "La llave se agregó con éxito!.<br>";
      }
      else
        {
        $confirmacionLLave = "Error: ".$data1."<br>";
      } 
    
    }
    else
      {
      $confirmacionLLave = "Error: ".$data."<br>";
    }    
  }
  
  if ($flagNuevoCertificado == 1)
    {
    $ref = $_POST['idreferencia'];
    $codigo = $_POST['codigo'];
    $actividad = $_POST['idactividades'];
    
    //Proceso de agregado de la nueva llave en la base:
    $nombreNuevoCertificado = $_POST['nombreCertificado'];
    $owner = $_POST['owner'];
    $version = $_POST['version'];
    $bandera = $_POST['bandera'];
    $accion = $_POST['accion'];    
    $vencimiento = $_POST['vencimiento'];
    $observaciones = $_POST['observaciones'];
    
    /*
    //Verificación de los parámetros pasados:
    echo "nombre: ".$nombreNuevoCertificado." owner: ".$owner." version: ".$version."<br>".
         "bandera: ".$bandera." accion: ".$accion." vencimiento: ".$vencimiento."<br>".
         "observaciones: ".$observaciones."<br>";
    */
    
    //Consulta para crear la tarea asociada a la creación de la llave:
    $agregarTarea = "insert into tareas (referencia, accion, observaciones) values ($ref, '$accion', '$observaciones')";
    $data = consultarBD($agregarTarea, $dbc);
    
    //Consulta para conocer el id de la tarea creada:
    $recuperarId = "select idtareas from tareas order by idtareas desc limit 1";
    $data1 = consultarBD($recuperarId, $dbc);
    $filas = obtenerResultados($data1, $dbc);
    foreach($filas as $fila)
      {
      $tarea = $fila->idtareas;
    }
        
    //Verifico si se agregó correctamente el registro en la tabla tareas. De ser así, agrego el registro de la llave.
    if ($data === TRUE)
      {
      $agregarCertificado = "insert into certificados (tarea, nombre, owner, version, bandera, vencimiento, estado) "
                     ."values ($tarea, '$nombreNuevoCertificado', '$owner', '$version', '$bandera', '$vencimiento', 'activo')";
      $data = consultarBD($agregarCertificado, $dbc);
      
      //Verifico si se agregó correctamente el registro en la tabla llaves:
      if ($data === TRUE)
        {
        $confirmacionCertificado = "El certificado se agregó con éxito!.<br>";
      }
      else
        {
        $confirmacionCertificado = "Error: ".$data."<br>";
      } 
    }
    else
      {
      $confirmacionCertificado = "Error: ".$data."<br>";
    }
  }
  
  //Se manejan los dos casos juntos de eliminación (llaves y certificados):
  if ($flagEliminar == 1)
    {
    $ref = $_POST['idreferencia'];
    $objeto = $_POST['fuente'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombreBorrar'];
    $owner = $_POST['ownerBorrar'];
    $actividad = $_POST['idactividades'];
    
    if ($objeto == 'llave')
      {
      $idllave = $_POST['idllave'];
      $borrar = "update llaves set estado='inactiva' where idkeys='$idllave'";
    }
    else
      {
      $idcertificado = $_POST['idcertificado'];
      $borrar = "update certificados set estado='inactivo' where idcertificados = '$idcertificado'";
    }
    
    $data = consultarBD($borrar, $dbc);
    if ($data) 
      {
      if ($objeto == 'llave')
        {
        $mensajeBorrado = "¡¡Llave <font class='negritaRoja'>".$nombre." (".$owner.")"." </font>borrada con éxito!!.<br>";
      }
      else 
        {
        $mensajeBorrado = "¡¡Certificado <font class='negritaRoja'>".$nombre." (".$owner.")"." </font>borrado con éxito!!.<br>";
      }
    }  
    else
      {
      $mensajeBorrado = "¡¡ERROR!!. Por favor verifique.<br>";
    }
  }
  
  if ($flagNuevaReferencia == 1)
    {
    $actividad = $_POST["idactividades"];
    $codigo = $_POST["codigo"];
    $lugar = $_POST["lugar"];
    $slot = $_POST["slot"];
    $plataforma = $_POST["plataforma"];
    $app = $_POST["app"];
    $resumen = $_POST["resumen"];
    $detalles = $_POST["detalles"];
    
    //****MUESTRA DE LOS VALORES PASADOS:
    /*
    echo "Código: ".$codigo."<br>
         Lugar: ".$lugar." SLOT: ".$slot."<br>
         Plataforma: ".$plataforma." App: ".$app."<br>
         Resumen: ".$resumen."<br>
         Detalles: ".$detalles."<br>";
    */
    
    $agregarRef = "insert into referencias (actividad, codigo, slot, estado, lugar, plataforma, aplicacion, resumen, detalles) values ('$actividad', '$codigo', $slot, 'activa', '$lugar', '$plataforma', '$app', '$resumen', '$detalles')";
    
    $data = consultarBD($agregarRef, $dbc);
    
    if ($data === TRUE) 
      {
      $msgNuevaRef = "La referencia se agregó con éxito!.";
    }
    else
      {
      $msgNuevaRef = "Hubo un error al agregar la referencia. Por favor verifique.";
    } 
  }
  
  if ($flagEditar == 1)
    {
    
  }
  
  if (($flagNuevaLlave != 1) && ($flagNuevoCertificado != 1) && ($flagEliminar != 1) && ($flagNuevaReferencia != 1))
    {
    $ref = intval($_GET['idreferencias']);
    $actividad = $_GET['idactividades'];
  }
  
  //Consulta para determinar los datos de la tabla referencias
  $query = "select codigo, lugar, slot, plataforma, aplicacion, resumen, detalles from referencias where idreferencias=".$ref."";//echo $query."<br>";
  $data = consultarBD($query, $dbc);
  $filas = obtenerResultados($data);
  
  foreach($filas as $fila)
    {
    $codigo = $fila->codigo;
    $lugar = $fila->lugar;
    $slot = intval($fila->slot);
    $plataforma = $fila->plataforma;
    $aplicacion = $fila->aplicacion;
    $resumen = $fila->resumen;
    $detalles = $fila->detalles;
  }
  
  //Consulta para determinar el nombre del HSM usado:
  $query = "select hsm.nombre as hsm, slots.nombre as slot from slots inner join hsm on slots.hsm=hsm.idhsm where idslots=".$slot."";//echo $query."<br>";
  $data = consultarBD($query, $dbc);
  $filas = obtenerResultados($data);
  foreach($filas as $fila)
    {
    $hsm = $fila->hsm;
    $slot = $fila->slot;
  }
    
  //Consulta para determinar las llaves involucradas en la referencia:
  $query = "select tareas.accion, llaves.idkeys, llaves.nombre, llaves.owner, llaves.kcv from llaves inner join tareas on llaves.tarea=tareas.idtareas inner join referencias on referencias.idreferencias=tareas.referencia where idreferencias=".$ref." and llaves.estado='activa';";//echo $query."<br>";
  $data = consultarBD($query, $dbc);
  $filas = obtenerResultados($data);
  $num_llaves = $data->num_rows;
  foreach($filas as $fila)
    {
    $accionLlave[] = $fila->accion;
    $idkey[] = $fila->idkeys;
    $nombreLlave[] = $fila->nombre;
    $ownerLlave[] = $fila->owner;
    $kcvs[] = $fila->kcv;
  }
  
  //Guardo el valor del primer index key de la referencia para la navegación:
  $primera = $idkey[0];
  $ultima = $idkey[$num_llaves-1];
    
  //Consulta para determinar los certificados involucrados en la referencia:
  $query = "select tareas.accion, certificados.idcertificados, certificados.nombre, certificados.owner from certificados inner join tareas on certificados.tarea = tareas.idtareas inner join referencias on referencias.idreferencias = tareas.referencia where idreferencias=".$ref." and certificados.estado='activo'";//echo $query."<br>";
  $data = consultarBD($query, $dbc);
  $filas = obtenerResultados($data);
  $num_certificados = $data->num_rows;
  foreach($filas as $fila)
    {
    $accionCertificado[] = $fila->accion;
    $idscertificado[] = $fila->idcertificados;
    $nombresCertificado[] = $fila->nombre;
    $ownersCertificado[] = $fila->owner;
  }
  
  //Consulta para determinar las personas involucradas en la referencia:
  $query = "select usuarios.idusuarios, usuarios.apellido, usuarios.nombre, usuarios.empresa, involucrados.rol from involucrados inner join usuarios on involucrados.usuario=usuarios.idusuarios inner join referencias on referencias.idreferencias=involucrados.referencia where idreferencias = $ref";
  $data = consultarBD($query, $dbc);
  $filas = obtenerResultados($data);
  $num_involucrados = $data->num_rows;
  foreach($filas as $fila)
    {
    $idusuarios[] = $fila->idusuarios;
    $nombreInvolucrado[] = $fila->nombre;
    $apellidoInvolucrado[] = $fila->apellido;
    $empresaInvolucrado[] = $fila->empresa;
    $rolInvolucrado[] = $fila->rol;
  }
}

require_once ('vistas/cabecera.php');
require_once ('vistas/navegacion.php');
require_once ('vistas/vistaReferencia.php');
?>

