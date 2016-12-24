<body onload='mueveReloj()'>

<div id='contenido'>

<br>
<h1>RESUMEN DE LA ACTIVIDAD</h1>
<br>
<?php
if ($flagNuevaActividad == 1) 
  {
  echo "<font class='negra'>".$msgNuevaActividad."</font><br>";
}
if ($flagEditar == 1) 
  {
  echo "<font class='negra'>".$msgEditarActividad."</font><br>";
}

if ($registroActividades >= 1)
  {
?> 
<form name='activity' method='post' action="actividad.php">
  <table class="edicion">
    <tr>
      <th class="subtitulo1">Fecha</th>
      <th class="subtitulo1">Inicio</th>
      <th class="subtitulo1">Fin</th>
    </tr>
    <tr>
      <td><input id="fecha" name="fecha" disabled='true' type="date"  style="width:100%; text-align: center" min="2016-10-01" value="<?php echo $fechaDB ?>"></td>
      <td><input id="horaInicio" name="horaInicio" disabled='true' type="time"  style="width:100%; text-align: center" min="09:00" max="18:00" step="600" value="<?php echo $horaInicio ?>"></td>
      <td><input id="horaFin" name="horaFin" disabled='true' type="time"  style="width:100%; text-align: center" min="09:00" max="18:00" step="600" value="<?php echo $horaFin ?>"></td>
    </tr>
    <tr>
      <th colspan="3">Motivo</th>
    </tr>
    <tr>
      <td colspan='3' style="vertical-align: middle;"><input id="motivo" name="motivo" disabled='true' style="width:100%; resize: none; text-align: center; font-size: 18pt; font-weight: bolder;" value="<?php echo $motivo ?>"></td>
    </tr>
    <tr>
      <th colspan="3">Usuarios</th> 
    </tr>
    <tr>
      <th class="subtitulo2">Nombre</th>
      <th class="subtitulo2" colspan="2">Rol</th>
    </tr>
    <tr>
    <td>
      <select id='usuario1' name='usuario1' style='width:100%' disabled='true'>
        <option value="ninguno" selected="yes">--- SELECCIONAR ---</option>  
        <?php
        foreach($usuarios as $index => $valor)
          {
          if ($index == $usuario1) $elegido = "selected";
          else $elegido = "";
          echo "  <option value='$index' $elegido>$valor</option>";
        } 
        ?>
      </select>
    </td>
    <td colspan="2">
        <select id="rol1" name="rol1" style="width:100%" disabled="true">
          <option value="ninguno" <?php echo $ninguno1 ?>>--- SELECCIONAR ---</option>  
          <option value="CISO" <?php echo $ciso1 ?> >CISO</option>
          <option value="KM" <?php echo $km1 ?> >KM</option>
          <option value="Testigo" <?php echo $testigo1 ?> >Testigo</option>
        </select>
    </td>
    </tr>
    <tr>
      <td>
        <select id='usuario2' name='usuario2' style='width:100%' disabled='true'>
          <option value="ninguno" selected="yes">--- SELECCIONAR ---</option>  
          <?php
          foreach($usuarios as $index => $valor)
            {
            if ($index == $usuario2) $elegido = "selected";
            else $elegido = "";
            echo "  <option value='$index' $elegido>$valor</option>";
          } 
          ?>
        </select>
      </td>
      <td colspan="2">
          <select id="rol2" name="rol2" style="width:100%" disabled="true">
          <option value="ninguno" <?php echo $ninguno2 ?>>--- SELECCIONAR ---</option>  
          <option value="CISO" <?php echo $ciso2 ?>>CISO</option>
          <option value="KM" <?php echo $km2 ?>>KM</option>
          <option value="Testigo" <?php echo $testigo2 ?>>Testigo</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><input type='button' id='editar' name='editar' value='EDITAR' onclick='cambiarEdicion()' class='boton'></td>
      <td><input type='button' id='actualizar' disabled='true' onclick="validar('actualizar')" value='ACTUALIZAR' class='boton'></td>
      <td><input type='button' id='eliminar' name='eliminar' onclick="validar('eliminar')" value='ELIMINAR' class='boton'></td>
      <td style='display:none'><input type='text' id='flagEditar' name='flagEditar'></td>
      <td style='display:none'><input type='text' id='flagEliminar' name='flagEliminar'></td>
    </tr>
  </table>
  <br>
  <table class="edicion">
    <tr>
      <th colspan='3'>REFERENCIAS</th>
    </tr>
    <?php
    foreach($idrefs as $index => $valor)
      {
      echo "<tr>";
        echo '<td nowrap><a href="referencia.php?idreferencias='.$valor.'&idactividades='.$actividad.'">'.$codigos[$index]."</a></td>";
        echo "<td colspan='2' style='text-align: left'>".$resumenes[$index]."</td>";
      echo "</tr>";
    }
    ?>
    <tr>
      <td colspan="3"><input type='submit' id='agregarReferencia' name='agregarReferencia' value='Nueva Referencia' onclick="this.form.action = 'nuevaReferencia.php'" class='boton'></td>
      <td style='display:none'><input type='text' id='idactividades' name='idactividades' value=<?php echo $actividad ?>></td>
      <td style='display:none'><input type='text' id='fuente' name='fuente' value='actividad'</td>
    </tr>  
  </table>
</form>
<br>
<?php echo '<a href="logbook.php">Volver</a>'; ?>
<br>
<?php
  }
else
  {
  echo $error_msg;
}
?>  

<br>

</div>

</body>

<?php require_once("vistas/pie.php") ?>
