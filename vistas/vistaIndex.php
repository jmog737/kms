<?php
// If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
if (empty($_SESSION['user_id'])) 
  {
?>
  <div id='contenido'>
    <body onload='mueveReloj()'>
    <br>  
    <h1>Acceso al sistema:</h1>
    <br>
<?php
  if (isset($_POST['submit']))
    {
    echo $error_msg;
    }
?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <table class='edicion' name='login'> 
          <tr>
              <th align='left'><font class='negra'>Usuario:</font></th>
              <td align='center'><input type='text' name='usuario' maxlength='15' size='9'></td>
          </tr>
          <tr>
              <th align='left'><font class='negra'>Password:</font></th>
              <td align='center'><input type='password' name='password' maxlength='15' size='9'></td>
          </tr>    
          <tr>
              <td colspan="2"><input type="submit" value="LogIn" name="submit" class='boton' align='center'/></td>
          </tr>
      </table>
    </form>
    <br>
    </body>
<?php
  }
  else 
    {
    require_once 'vistas/navegacion.php';
?>
    <div id='contenido'>
    <body onload='mueveReloj()'>
    <br>
    </body>
<?php       
  }
?>
    
</div> <!-- fin del div contenido -->
<?php
require_once ('vistas/pie.php');
?>