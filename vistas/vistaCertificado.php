<body onload='mueveReloj()'>

<div id='contenido'>
  <br>
  <?php if ($_POST['flagEditar'] == 1) echo "<font class='negritaRoja'>$mensajeActualizacion</font>"; 
  if ($_POST['flagEliminar'] == 1) echo "<font class='negritaRoja'>$mensajeBorrado</font>";
  else 
    {
    if ($registro == 0) 
      { 
  ?>
      <font class='negritaRoja'><?php echo $certificadoInactivo ?></font>
    <?php 
    }
    else
      {
    ?>  
      <form name='detalleCertificado' method='post' action='certificado.php'>  
        <table class="edicion">
          <tr>
              <th colspan="10">DATOS GENERALES</th>
          </tr>
          <tr>
              <th style="text-align: left">Nombre:</th>
              <td colspan="2"><input id="nombreCertificado" name="nombreCertificado" class="negritaRoja" disabled="true" type="text"  style="width:100%" value="<?php echo $nombreCertificado ?>"></td>
              <th>Owner:</th>
              <td colspan="3"><input id="owner" name="owner" class="negritaRoja" disabled='true' type="text"  style="width:100%" value="<?php echo $owner ?>"></td>
              <th>Versi&oacute;n:</th>
              <td colspan="2"><input id="version" name="version" class="negritaRoja" disabled='true' type="text" style="width:100%" value="<?php echo $version ?>"></td> 
          </tr>          
          <tr>
              <th style="text-align: left">Bandera:</th>
              <td colspan="2">
                  <select id="bandera" name="bandera" disabled='true' style="width:100%">
                    <option value="VISA" <?php echo $visa ?>>VISA</option>
                    <option value="MASTER" <?php echo $master ?>>MASTER</option>
                    <option value="AMEX" <?php echo $amex ?>>AMEX</option>
                  </select>
              </td>
              <th>Acci&oacute;n:</th>
              <td colspan="3">
                <select id="accion" name="accion" disabled='true' style="width:100%">
                    <option value="Solicitud" <?php echo $solicitud ?>>Solicitud</option>
                    <option value="Importaci&oacute;n" <?php echo $importacion ?>>Importaci&oacute;n</option>
                    <option value="Exportaci&oacute;n" <?php echo $exportacion ?>>Exportaci&oacute;n</option>
                    <option value="Borrado" <?php echo $borrado ?>>Borrado</option>
                    <option value="Edici&oacute;n" <?php echo $edicion ?>>Edici&oacute;n</option>
                </select>
              </td>
              <td colspan="2"><input id="vencimiento" name="vencimiento" disabled='true'  style="width:100%" type="date" value="<?php echo $vencimiento ?>"></td>
          </tr>
          <tr>
              <th colspan="2" style="text-align: left">Observaciones:</th>
              <td colspan="8"><textarea id="observaciones" name="observaciones" disabled='true' style="width: 100%;resize: none"><?php echo $observaciones ?></textarea></td>
          </tr>
          <tr>
              <td colspan="4"><input type='button' id='editar' name='editar' value='EDITAR' onclick='cambiarEdicion()' class='boton'></td>
              <td colspan="3"><input type='button' id='actualizar' disabled='true' onclick="validar('actualizar')" value='ACTUALIZAR' class='boton'></td>
              <td colspan="3"><input type='button' id='eliminar' name='eliminar' onclick="validar('eliminar')" value='ELIMINAR' class='boton'></td>
          </tr> 
          <tr>
              <td style='display:none'><input type='text' id='fuente' name='fuente' value='certificado'</td>
              <td style='display:none'><input type='text' id='idreferencia' name='idreferencia' value=<?php echo $ref ?>></td>
              <td style='display:none'><input type='text' id='idcertificado' name='idcertificado' value=<?php echo $idcertificado ?>></td>
              <td style='display:none'><input type='text' id='codigo' name='codigo' value=<?php echo $codigo ?>></td>
              <td style='display:none'><input type='text' id='idactividades' name='idactividades' value=<?php echo $actividad ?>></td>
              <td style='display:none'><input type='text' id='nombreBorrar' name='nombreBorrar' value=<?php echo $nombreCertificado ?>></td>
              <td style='display:none'><input type='text' id='ownerBorrar' name='ownerBorrar' value=<?php echo $owner ?>></td>
              <td style='display:none'><input type='text' id='tarea' name='tarea' value=<?php echo $tarea ?>></td>
              <td style='display:none'><input type='text' id='flagEditar' name='flagEditar'></td>
              <td style='display:none'><input type='text' id='flagEliminar' name='flagEliminar'></td>
          </tr>  
        </table>
      </form>
<?php
    }
  }
?>
      <br>
<?php 
?>
<?php echo '<hr>'
          .'<a style="display:inline" href="certificado.php?idcertificados='.$primero.'&idreferencia='.$ref.'&codigo='.$codigo.'&idactividades='.$actividad.'"><< </a>'
          .'<a style="display:inline" href="certificado.php?idcertificados='.$anterior.'&idreferencia='.$ref.'&codigo='.$codigo.'&idactividades='.$actividad.'"> < </a>'
          .'<a style="display:inline" href="certificado.php?idcertificados='.$siguiente.'&idreferencia='.$ref.'&codigo='.$codigo.'&idactividades='.$actividad.'"> > </a>'
          .'<a style="display:inline" href="certificado.php?idcertificados='.$ultimo.'&idreferencia='.$ref.'&codigo='.$codigo.'&idactividades='.$actividad.'">  >></a>'
          .'<hr>';
?>
<br>
<?php echo '<a href="referencia.php?idreferencias='.urlencode($ref).'&idactividades='.urlencode($actividad).'">Volver</a>'; ?>
<br>

</div>

</body>

<?php require_once("vistas/pie.php") ?>
