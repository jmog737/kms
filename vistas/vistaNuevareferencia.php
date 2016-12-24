<body onload='mueveReloj()'>

<div id='contenido'>
<br>
<h1><font class="negritaRoja"><?php //echo $codigo.":" ?></font></h1>
<br>

<form id='nuevaReferencia' name='nuevaReferencia' method='POST' onsubmit="return validarReferencia()" action="referencia.php">
  <table class="edicion">
    <tr>
      <th colspan="6">GENERAL</th>
    </tr>
    <tr>
      <th style="text-align: left">Código:</th>
      <td style="text-align: left"><input id="codigo" name="codigo" class="negritaRoja" type="text" style="width:100%" maxlength="15" size="10"></td>
    </tr>
    <tr>
      <th style="text-align: left">Lugar:</th>
      <td><input id="lugar" name="lugar" type="text" style="width: 100%" value="EMSA CPD"></td>
      <th style="text-align: left">Slot (HSM):</th>
      <td colspan="3">
          <select id="slot" name="slot" style="width:100%">
            <option value="ninguno" selected="yes">--- SELECCIONAR ---</option>
            <?php
            foreach($slots as $index => $valor)
              {
              echo "<option value='$index'>$valor</option>";
            } 
          ?>  
          </select>  
      </td>
    </tr>
    <tr>
      <th style="text-align: left">Plataforma:</th>
      <td>
        <select id="plataforma" name="plataforma" style="width:100%">
          <option value="ninguno" selected="yes">--- SELECCIONAR ---</option>  
          <option value="Advantis41">Advantis 4.1</option>
          <option value="Convego62">Convego 6.2</option>
          <option value="Cosmo5">Cosmo 5</option>
        </select>  
      </td>
      <th style="text-align: left">Aplicaci&oacute;n:</th>
      <td colspan="3"><input id="app" name="app" type="text" style="width: 100%"></td>
    </tr>
    <tr>
      <th style="text-align: left">Resumen:</th>
      <td colspan="5"><textarea id="resumen" name="resumen" style="width: 100%;resize: none"></textarea></td>
    </tr>
    <tr>
      <th style="text-align: left">Detalles:</th>
      <td colspan="5"><textarea id="detalles" name="detalles" style="width: 100%;resize: none"></textarea></td>
    </tr>  
    <tr>
      <td colspan="6"><input type='submit' id='agregar' name='agregar' value='AGREGAR' class='boton'></td> 
      <td style='display:none'><input type='text' id='flagNuevaReferencia' name='flagNuevaReferencia' value='1'></td>
      <td style='display:none'><input type='text' id='idactividades' name='idactividades' value=<?php echo $actividad ?>></td>
    </tr>    
  </table>
</form>

<br>
<?php echo '<a href="actividad.php?idactividades='.$actividad.'">Volver</a>'; ?>
<br>
<br>

</div>

</body>

<?php require_once("vistas/pie.php") ?>
