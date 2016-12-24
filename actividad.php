<?php
session_start();
$pageTitle = 'DETALLE DE ACTIVIDAD';

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
  
  $flagNuevaActividad = $_POST['flagNuevaActividad'];
  $flagEditar = $_POST['flagEditar'];
    
  if ($flagNuevaActividad == 1)
    {
    $fecha = $_POST["fecha"];
    $inicio = $_POST["horaInicio"];
    $fin = $_POST["horaFin"];
    $motivo = $_POST["motivo"];
    $usuario1 = $_POST["usuario1"];
    $usuario2 = $_POST["usuario2"];
    $rol1 = $_POST["rol1"];
    $rol2 = $_POST["rol2"];
    
    //****MUESTRA DE LOS VALORES PASADOS:
    /*
    echo "Fecha: ".$fecha." Inicio: ".$inicio." Fin: ".$fin."<br>
         Motivo: ".$motivo."<br>
         Usuario 1: ".$usuario1." Rol 1: ".$rol1."<br>
         Usuario 2: ".$usuario2." Rol 2: ".$rol2."<br>";
    */
    
    $agregarActividad = "insert into actividades (fecha, horaInicio, horaFin, estado, usuario1, rolUsuario1, usuario2, rolUsuario2, motivo) values ('$fecha', '$inicio', '$fin', 'activa', $usuario1, '$rol1', $usuario2, '$rol2', '$motivo')";
    
    $data = consultarBD($agregarActividad, $dbc);
    
    if ($data === TRUE) 
      {
      $msgNuevaActividad = "La actividad se agregó con éxito!.";
    }
    else
      {
      $msgNuevaActividad = "Hubo un error al agregar la actividad. Por favor verifique.";
    }
    
    //Recupero el id de la actividad que se acaba de agregar:
    $recuperarId = "select idactividades from actividades order by idactividades desc limit 1";
    $data1 = consultarBD($recuperarId, $dbc);
    $filas = obtenerResultados($data1, $dbc);
    foreach($filas as $fila)
      {
      $actividad = intval($fila->idactividades);
    }
  }

  if ($flagEditar == 1)
    {
    $fecha = $_POST["fecha"];
    $inicio = $_POST["horaInicio"];
    $fin = $_POST["horaFin"];
    $motivo = $_POST["motivo"];
    $usuario1 = $_POST["usuario1"];
    $usuario2 = $_POST["usuario2"];
    $rol1 = $_POST["rol1"];
    $rol2 = $_POST["rol2"];
    
    $actividad = $_POST["idactividades"];
    
    //****MUESTRA DE LOS VALORES PASADOS:
    /*
    echo "Actividad: ".$actividad."<br>".
         "Fecha: ".$fecha." Inicio: ".$inicio." Fin: ".$fin."<br>
         Motivo: ".$motivo."<br>
         Usuario 1: ".$usuario1." Rol 1: ".$rol1."<br>
         Usuario 2: ".$usuario2." Rol 2: ".$rol2."<br>";
    */
    
    $editarActividad = "update actividades set fecha='".$fecha."', horaInicio='".$inicio."', horaFin='".$fin."', usuario1=".$usuario1.", rolUsuario1='".$rol1."', usuario2=".$usuario2.", rolUsuario2='".$rol2."', motivo='".$motivo."' where idactividades=".$actividad;
        
    $data = consultarBD($editarActividad, $dbc);
    
    if ($data === TRUE) 
      {
      $msgEditarActividad = "La actividad se modificó con éxito!.";
    }
    else
      {
      $msgEditarActividad = "Hubo un error al editar la actividad. Por favor verifique.";
    }
  }
  
  if (($flagNuevaActividad != 1) && ($flagEditar != 1))
    {
    $actividad = $_GET['idactividades'];
  }
  
  $query = "select fecha, horaInicio, horaFin, usuario1, usuario2, rolUsuario1, rolUsuario2, motivo from actividades where idactividades=".$actividad."";
  
  $data = consultarBD($query, $dbc);
  $filas = obtenerResultados($data);
  $registroActividades = $data->num_rows;
  
  if ($registroActividades >= 1) 
    {  
    foreach($filas as $fila)
      {
      $horaInicio = $fila->horaInicio;
      $horaFin = $fila->horaFin;
      $usuario1 = $fila->usuario1;
      $usuario2 = $fila->usuario2;
      $rol1 = $fila->rolUsuario1;
      $rol2 = $fila->rolUsuario2;
      $motivo = $fila->motivo;
      
      switch ($rol1)
        {
        case 'CISO':$ciso1 = 'selected';
                    break;
        case 'KM':$km1 = 'selected';
                  break;
        case 'Testigo':$testigo1 = 'selected';
                       break;
        default:$ninguno1 = 'selected'; 
                break;                       
      }
      
      switch ($rol2)
        {
        case 'CISO':$ciso2 = 'selected';
                    break;
        case 'KM':$km2 = 'selected';
                  break;
        case 'Testigo':$testigo2 = 'selected';
                       break;
        default:$ninguno2 = 'selected'; 
                break;                       
      }
      
      $query1 = "select apellido, nombre, empresa from usuarios where idusuarios=".$usuario1."";
      $data1 = consultarBD($query1, $dbc);
      $filas1 = obtenerResultados($data1);
      $apellido1 = $filas1[1]->apellido;
      $nombre1 = $filas1[1]->nombre;
      $user1 = $nombre1.' '.$apellido1;
      
      $query2 = "select apellido, nombre, empresa from usuarios where idusuarios=".$usuario2."";
      $data2 = consultarBD($query2, $dbc);
      $filas2 = obtenerResultados($data2);
      $apellido2 = $filas2[1]->apellido;
      $nombre2 = $filas2[1]->nombre;  
      $user2 = $nombre2.' '.$apellido2;
            
      $sepa = explode('-', $fila->fecha);
      $fecha = $sepa[2].'/'.$sepa[1].'/'.$sepa[0];
      $fechaDB = $fila->fecha;
    }
    
    $refs = "select idreferencias, codigo, resumen from referencias where actividad=".$actividad." and estado='activa' order by idreferencias";
    $data1 = consultarBD($refs, $dbc);
    $filas = obtenerResultados($data1);
    $registros = $data1->num_rows;

    if ($registros >= 1) 
      {  
      foreach($filas as $fila)
        {
        $idrefs[] = $fila->idreferencias;
        $codigos[] = $fila->codigo;
        $resumenes[] = $fila->resumen;
      }
    }
  }  
  else 
    {
    $error_msg = "NO HAY REGISTROS EN EL LOGBÒOK<br>";
  }
  
  //Consulta para determinar los usuarios disponibles:
  $query = "select idusuarios, nombre, apellido, empresa from usuarios where estado='activo' and empresa='EMSA'";
  $data = consultarBD($query, $dbc);
  $filas = obtenerResultados($data);
  foreach($filas as $fila)
    {
    $idusuario = intval($fila->idusuarios);
    $usuarios[$idusuario] = $fila->nombre." ".$fila->apellido;
  }
  require_once ('vistas/cabecera.php');
  require_once ('vistas/navegacion.php');
  require_once ('vistas/vistaActividad.php');
}
?>

