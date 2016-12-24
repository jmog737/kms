<body onload='mueveReloj()'>

<div id='contenido'>
  <br>
  <?php if ($_POST['flagEditar'] == 1) echo "<font class='negritaRoja'>$mensajeActualizacion</font>"; 
    if ($registro == 0) 
      { 
  ?>
      <font class='negritaRoja'><?php echo $llaveInactiva ?></font>
    <?php 
    }
    else
      {
    ?>  
      <form name='detalleLlave' method='post' action='llave.php'>  
        <table class="edicion">
          <tr>
              <th colspan="10">DATOS GENERALES</th>
          </tr>
          <tr>
              <th style="text-align: left">Nombre:</th>
              <td colspan="2"><input id="nombreLlave" name="nombreLlave" class="negritaRoja" disabled='true' type="text"  style="width:100%" value="<?php echo $nombreLlave ?>"></td>
              <th>Owner:</th>
              <td colspan="3"><input id="owner" name="owner" class="negritaRoja" disabled='true' type="text"  style="width:100%" value="<?php echo $owner ?>"></td>
              <th>KCV:</th>
              <td colspan="2"><input id="kcv" name="kcv" class="negritaRoja" disabled='true' type="text" style="width:100%" value="<?php echo $kcv ?>"></td> 
          </tr>          
          <tr>
              <th style="text-align: left">Tipo:</th>
              <td colspan="2">
                  <select id="tipo" name="tipo" disabled='true' style="width:100%">
                    <option value="DES2" <?php echo $des2 ?>>DES2</option>
                    <option value="RSA" <?php echo $rsa ?>>RSA</option>
                  </select>
              </td>
              <th>Tama&ntilde;o:</th>
              <td colspan="3"><input id="bits" name="bits" disabled='true' type="text"  style="width:100%" value="<?php echo $bits ?>"></td>
              <th>Exponente:</th>
              <td colspan="2"><input id="exponente" name="exponente" disabled='true'  style="width:100%" type="text" value="<?php echo $exponente ?>"></td>
          </tr>
          <!--   
          -->
          <tr>
              <th style="text-align: left">Generaci&oacute;n:</th>
              <td colspan="2">
                <select id="generacion" name="generacion" disabled='true' style="width:100%">
                    <option value="Desde componentes" <?php echo $desdeComponentes ?>>Desde componentes</option>
                    <option value="En componentes" <?php echo $componentes ?>>En componentes</option>
                    <option value="Aleatoria"<?php echo $aleatoria ?>>Aleatoria</option>
                    <option value="Importada" <?php echo $importada ?>>Importada</option>
                </select>
              </td>
              <th>Acci&oacute;n:</th>
              <td colspan="3">
                <select id="accion" name="accion" disabled='true' style="width:100%">
                    <option value="Carga" <?php echo $carga ?>>Carga</option>
                    <option value="Generaci&oacute;n" <?php echo $genSelected ?>>Generaci&oacute;n</option>
                    <option value="Importaci&oacute;n" <?php echo $importacion ?>>Importaci&oacute;n</option>
                    <option value="Exportaci&oacute;n" <?php echo $exportacion ?>>Exportaci&oacute;n</option>
                    <option value="Borrado" <?php echo $borrado ?>>Borrado</option>
                    <option value="Edici&oacute;n" <?php echo $edicion ?>>Edici&oacute;n</option>
                </select>
              </td>
              <th>Versi&oacute;n:</th>
              <td colspan="2"><input id="version" name="version" type="text" disabled='true' style="width:100%" value="<?php echo $version ?>"></td>
          </tr>
          <tr>
              <th colspan="2" style="text-align: left">Observaciones:</th>
              <td colspan="8"><textarea id="observaciones" name="observaciones" disabled='true' style="width: 100%;resize: none"><?php echo $observaciones ?></textarea></td>
          </tr>
          <tr>
              <th colspan="10">USOS</th>
          </tr>
          <tr>
              <td colspan="2" nowrap style="text-align: left"><input id="uso_encrypt" name="uso_encrypt" disabled='true' type="checkbox" <?php echo $uso_encrypt ?>>    Encrypt</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_sign' name="uso_sign" disabled='true' type="checkbox" <?php echo $uso_sign ?>>    Sign</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_wrap' name="uso_wrap"  disabled='true' type="checkbox" <?php echo $uso_wrap ?>>    Wrap</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_export' name="uso_export" disabled='true' type="checkbox" <?php echo $uso_export ?>>    Export</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_derive' name="uso_derive" disabled='true' type="checkbox" <?php echo $uso_derive ?>>    Derive</td>
          </tr>
          <tr>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_decrypt' name="uso_decrypt" disabled='true' type="checkbox" <?php echo $uso_decrypt ?>>     Decrypt</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_verify' name="uso_verify" disabled='true' type="checkbox" <?php echo $uso_verify ?>>     Verify</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_unwrap' name="uso_unwrap" disabled='true' type="checkbox" <?php echo $uso_unwrap ?>>     Unwrap</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_import' name="uso_import" disabled='true' type="checkbox" <?php echo $uso_import ?>>     Import</td>
              <td colspan="2" nowrap style="text-align: left"></td>
          </tr>
          <tr>
              <th colspan="10">ATRIBUTOS</th>
          </tr>
          <tr>
              <td colspan="2" nowrap style="text-align: left"><input id='att_sensitive' name="att_sensitive" disabled='true' type="checkbox" <?php echo $att_sensitive ?>>    Sensitive</td>
              <td colspan="2" nowrap style="text-align: left"><input id='att_modifiable' name="att_modifiable" disabled='true' type="checkbox" <?php echo $att_modifiable ?>>    Modifiable</td>
              <td colspan="2" nowrap style="text-align: left"><input id='att_private' name="att_private" disabled='true' type="checkbox" <?php echo $att_private ?>>    Private</td>
              <td colspan="2" nowrap style="text-align: left"><input id='att_extractable' name="att_extractable" disabled='true' type="checkbox" <?php echo $att_extractable ?>>    Extractable</td>
              <td colspan="2" nowrap style="text-align: left"><input id='att_exportable' name="att_exportable" disabled='true' type="checkbox" <?php echo $att_exportable ?>>    Exportable</td>
          </tr>
          <tr>
              <td colspan="2" nowrap style="text-align: left"><input id='att_trusted' name="att_trusted" disabled='true' type="checkbox" <?php echo $att_trusted ?>>     Trusted</td>
              <td colspan="2" nowrap style="text-align: left"><input id='att_wrapwtrusted' name="att_wrapwtrusted" disabled='true' type="checkbox" <?php echo $att_wrapwtrusted ?>>     Wrap w/Trusted</td>
              <td colspan="2" nowrap style="text-align: left"><input id='att_unwrapmask' name="att_unwrapmask" disabled='true' type="checkbox" <?php echo $att_unwrapmask ?>>     Unwrap Mask</td>
              <td colspan="2" nowrap style="text-align: left"><input id='att_derivemask' name="att_derivemask" disabled='true' type="checkbox" <?php echo $att_derivemask ?>>     Derive Mask</td>
              <td colspan="2" nowrap style="text-align: left"><input id='att_deletable' name="att_deletable" disabled='true' type="checkbox" <?php echo $att_deletable ?>>     Deletable</td>
          </tr>
          <tr>
              <td colspan="4"><input type='button' id='editar' name='editar' value='EDITAR' onclick='cambiarEdicion()' class='boton'></td>
              <td colspan="3"><input type='button' id='actualizar' disabled='true' onclick="validar('actualizar')" value='ACTUALIZAR' class='boton'></td>
              <td colspan="3"><input type='button' id='eliminar' name='eliminar' onclick="validar('eliminar')" value='ELIMINAR' class='boton'></td>
          </tr> 
          <tr>
              <td style='display:none'><input type='text' id='fuente' name='fuente' value='llave'</td>
              <td style='display:none'><input type='text' id='idreferencia' name='idreferencia' value=<?php echo $ref ?>></td>
              <td style='display:none'><input type='text' id='idllave' name='idllave' value=<?php echo $idllave ?>></td>
              <td style='display:none'><input type='text' id='codigo' name='codigo' value=<?php echo $codigo ?>></td>
              <td style='display:none'><input type='text' id='idactividades' name='idactividades' value=<?php echo $actividad ?>></td>
              <td style='display:none'><input type='text' id='nombreBorrar' name='nombreBorrar' value=<?php echo $nombreLlave ?>></td>
              <td style='display:none'><input type='text' id='ownerBorrar' name='ownerBorrar' value=<?php echo $owner ?>></td>
              <td style='display:none'><input type='text' id='tarea' name='tarea' value=<?php echo $tarea ?>></td>
              <td style='display:none'><input type='text' id='flagEditar' name='flagEditar'></td>
              <td style='display:none'><input type='text' id='flagEliminar' name='flagEliminar'></td>
          </tr>  
        </table>
      </form>
<?php
    }
?>
      <br>
<?php 
?>
<?php echo '<hr>'
          .'<a style="display:inline" href="llave.php?idkeys='.$primera.'&idreferencia='.$ref.'&codigo='.$codigo.'&idactividades='.$actividad.'"><< </a>'
          .'<a style="display:inline" href="llave.php?idkeys='.$anterior.'&idreferencia='.$ref.'&codigo='.$codigo.'&idactividades='.$actividad.'"> < </a>'
          .'<a style="display:inline" href="llave.php?idkeys='.$siguiente.'&idreferencia='.$ref.'&codigo='.$codigo.'&idactividades='.$actividad.'"> > </a>'
          .'<a style="display:inline" href="llave.php?idkeys='.$ultima.'&idreferencia='.$ref.'&codigo='.$codigo.'&idactividades='.$actividad.'">  >></a>'
          .'<hr>';
?>
<br>
<?php echo '<a href="referencia.php?idreferencias='.urlencode($ref).'&idactividades='.urlencode($actividad).'">Volver</a>'; ?>
<br>

</div>

</body>

<?php require_once("vistas/pie.php") ?>
