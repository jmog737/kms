<?php
session_start();

//Borro los mensajes de error:
$error_msg = "";
require_once('modelos/connectvars.php');
require_once('modelos/baseMysql.php');

//Si el usuario no está logueado aún, intento loguearlo:
if (!isset($_SESSION['user_id'])) 
  {
  if (isset($_POST['submit'])) 
    {
    //Conexión con la base de datos:
    $dbc = crearConexion(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    //Recupero valores ingresados por el usuario:
    $user_username = mysqli_real_escape_string($dbc, trim($_POST['usuario']));
    $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
  
    //Si se ingresaron usuario y contrase?a los busco en la dB para ver si son auténticos:
    if (!empty($user_username) && !empty($user_password)) 
      {
      //Busco usuario y password en la base de datos para ver si existen:
      $query = "SELECT id_usuario, user FROM appusers WHERE user = '$user_username' AND password = SHA('$user_password')";
      $data = consultarBD($query, $dbc);
      $filas = obtenerResultados($data);
      $registros = $data->num_rows;
      
      if ($registros == 1) 
        {
        foreach($filas as $fila)
          {
          //Si el usuario existe, seteo las variables de sesión y cookies (user_id y username), y lo redirijo a la página principal:
          $_SESSION['user_id'] = $fila->id_usuario;
          $_SESSION['username'] = $fila->user;
        }
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/logbook.php';
        header('Content-Type: text/html; charset=utf-8');
        header('Location: ' . $home_url);
      }
      else 
        {
        //El usuario y/o la contraseña son incorrectos:
        $error_msg = "Lo siento, el usuario y/o la contraseña ingresados no son correctos.<br>";
      }
    }
    else 
      {
      //El usuario y/o la contraseña no fueron ingresados:
      $error_msg = "Lo siento, se deben ingresar las credenciales para acceder al sitio.<br>";
    }
  mysqli_close($dbc);
  }
}

$pageTitle = 'Administración de LLaves';
require_once ('vistas/cabecera.php');
require_once ('vistas/vistaIndex.php');
?>

