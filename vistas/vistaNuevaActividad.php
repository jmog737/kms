<body onload='mueveReloj()'>

<div id='contenido'>
<br>
<h1><font class="negritaRoja"><?php //echo $codigo.":" ?></font></h1>
<br>

<form id='nuevaReferencia' name='nuevaActividad' method='POST' onsubmit="return validarActividad()" action="actividad.php">
  <table class="edicion">
    <tr>
      <th colspan="6">GENERAL</th>
    </tr>
    <tr>
      <th style="text-align: left">Fecha:</th>
      <td><input id="fecha" name="fecha" type="date" style="width:100%" min="2016-10-01"></td>
      <th style="text-align: left">Inicio:</th>
      <td><input id="inicio" name="inicio" type="time" style="width:100%" min="09:00" max="18:00" step="600"></td>
      <th style="text-align: left">Fin:</th>
      <td><input id="fin" name="fin" type="time" style="width:100%" min="09:00" max="18:00" step="600"></td>
    </tr>
    <tr>
      <th style="text-align: left">Motivo:</th>
      <td colspan="5"><textarea id="motivo" name="motivo" style="width: 100%;resize: none"></textarea></td>
    </tr>
    <tr>
      <th colspan="6">USUARIOS</th>
    </tr>
    <tr>
      <th style="text-align: left">Usuario 1:</th>
      <td>
        <select id='usuario1' name='usuario1' style='width:100%'>
          <option value="ninguno" selected="yes">--- SELECCIONAR ---</option>  
          <?php
          foreach($usuarios as $index => $valor)
            {
            echo "  <option value='$index'>$valor</option>";
          } 
          ?>
        </select>
      </td>
      <td>
      </td>
      <th style="text-align: left">Rol 1:</th>
      <td colspan="2">
        <select id="rol1" name="rol1" style="width:100%">
          <option value="ninguno" selected="yes">--- SELECCIONAR ---</option>  
          <option value="CISO">CISO</option>
          <option value="KM">KM</option>
          <option value="Testigo">Testigo</option>
        </select>
      </td>
    </tr>
    <tr>
      <th style="text-align: left">Usuario 2:</th>
      <td>
        <select id='usuario2' name='usuario2' style='width:100%'>
          <option value="ninguno" selected="yes">--- SELECCIONAR ---</option>  
          <?php
          foreach($usuarios as $index => $valor)
            {
            echo "  <option value='$index'>$valor</option>";
          } 
          ?>
        </select>
      </td>
      <td>
      </td>
      <th style="text-align: left">Rol 2:</th>
      <td colspan="2">
        <select id="rol2" name="rol2" style="width:100%">
          <option value="ninguno" selected="yes">--- SELECCIONAR ---</option>  
          <option value="CISO">CISO</option>
          <option value="KM">KM</option>
          <option value="Testigo">Testigo</option>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="6"><input type='submit' id='agregar' name='agregar' value='AGREGAR' class='boton'></td> 
      <td style='display:none'><input type='text' id='flagNuevaActividad' name='flagNuevaActividad' value='1'></td>
    </tr>    
  </table>
</form>

<br>
<?php echo '<a href="logbook.php">Volver</a>'; ?>
<br>
<br>

</div>

</body>

<?php require_once("vistas/pie.php") ?>
