<body onload='mueveReloj()'>

<div id='contenido'>
  <br>
  <form name='nuevaLlave' method='post' action='referencia.php' onsubmit="return validarLlave()">  
        <table class="edicion">
          <tr>
              <th colspan="10">DATOS GENERALES</th>
          </tr>  
          <tr>
              <th style="text-align: left">Nombre:</th>
              <td colspan="2"><input id="nombreLlave" name="nombreLlave" class="negritaRoja" type="text" style="width:100%"></td>
              <th>Owner:</th>
              <td colspan="3"><input id="owner" name="owner" class="negritaRoja" type="text" style="width:100%"></td>
              <th>KCV:</th>
              <td colspan="2"><input id="kcv" name="kcv" class="negritaRoja" type="text" style="width:100%"></td> 
          </tr>
          <tr>
              <th style="text-align: left">Tipo:</th>
              <td colspan="2">
                  <select id="tipo" name="tipo" style="width:100%">
                    <option value="DES2">DES2</option>
                    <option value="RSA">RSA</option>
                  </select>
              </td>
              <th>Tama&ntilde;o:</th>
              <td colspan="3"><input id="bits" name="bits" type="text" style="width:100%"></td>
              <th>Exponente:</th>
              <td colspan="2"><input id="exponente" name="exponente" type="text" style="width:100%"></td>
          </tr>
          <tr>
              <th style="text-align: left">Generaci&oacute;n:</th>
              <td colspan="2">
                <select id="generacion" name="generacion" style="width:100%">
                    <option value="Desde componentes">Desde componentes</option>
                    <option value="En componentes">En componentes</option>
                    <option value="Aleatoria">Aleatoria</option>
                    <option value="Importada">Importada</option>
                </select>
              </td>
              <th>Acci&oacute;n:</th>
              <td colspan="3">
                <select id="accion" name="accion" style="width:100%">
                    <option value="Carga">Carga</option>
                    <option value="Generaci&oacute;n">Generaci&oacute;n</option>
                    <option value="Importaci&oacute;n">Importaci&oacute;n</option>
                    <option value="Exportaci&oacute;n">Exportaci&oacute;n</option>
                    <option value="Borrado">Borrado</option>
                    <option value="Edici&oacute;n">Edici&oacute;n</option>
                </select>
              </td>
              <th>Versi&oacute;n:</th>
              <td colspan="2"><input id="version" name="version" type="text" style="width:100%" value="01"></td>
          </tr>
          <tr>
              <th colspan="2" style="text-align: left">Observaciones:</th>
              <td colspan="8"><textarea id="observaciones" name="observaciones" style="width: 100%;resize: none"></textarea></td>
          </tr>
          <tr>
              <th colspan="10">USOS</th>
          </tr>
          <tr>
              <td colspan="2" nowrap style="text-align: left"><input id="uso_encrypt" name="uso_encrypt" type="checkbox">    Encrypt</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_sign' name="uso_sign" type="checkbox">    Sign</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_wrap' name="uso_wrap"  type="checkbox">    Wrap</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_export' name="uso_export" type="checkbox">    Export</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_derive' name="uso_derive" type="checkbox">    Derive</td>
          </tr>
          <tr>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_decrypt' name="uso_decrypt" type="checkbox">     Decrypt</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_verify' name="uso_verify" type="checkbox">     Verify</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_unwrap' name="uso_unwrap" type="checkbox">     Unwrap</td>
              <td colspan="2" nowrap style="text-align: left"><input id='uso_import' name="uso_import" type="checkbox">     Import</td>
              <td colspan="2" nowrap style="text-align: left"></td>
          </tr>
          <tr>
              <th colspan="10">ATRIBUTOS</th>
          </tr>
          <tr>
              <td colspan="2" nowrap style="text-align: left"><input id='att_sensitive' name="att_sensitive" type="checkbox">    Sensitive</td>
              <td colspan="2" nowrap style="text-align: left"><input id='att_modifiable' name="att_modifiable" type="checkbox">    Modifiable</td>
              <td colspan="2" nowrap style="text-align: left"><input id='att_private' name="att_private" type="checkbox">    Private</td>
              <td colspan="2" nowrap style="text-align: left"><input id='att_extractable' name="att_extractable" type="checkbox">    Extractable</td>
              <td colspan="2" nowrap style="text-align: left"><input id='att_exportable' name="att_exportable" type="checkbox">    Exportable</td>
          </tr>
          <tr>
              <td colspan="2" nowrap width="auto" style="text-align: left"><input id='att_trusted' name="att_trusted" type="checkbox">     Trusted</td>
              <td colspan="2" nowrap width="auto" style="text-align: left"><input id='att_wrapwtrusted' name="att_wrapwtrusted" type="checkbox"> Wrap w/Trusted</td>
              <td colspan="2" nowrap width="auto" style="text-align: left"><input id='att_unwrapmask' name="att_unwrapmask" type="checkbox">     Unwrap Mask</td>
              <td colspan="2" nowrap width="auto" style="text-align: left"><input id='att_derivemask' name="att_derivemask" type="checkbox">     Derive Mask</td>
              <td colspan="2" nowrap width="auto" style="text-align: left"><input id='att_deletable' name="att_deletable" type="checkbox">     Deletable</td>
          </tr>
          <tr>
              <td colspan="10"><input type='submit' id='agregar' name='agregar' value='AGREGAR' class='boton'></td>
          </tr> 
          <tr>
              <td style='display:none'><input type='text' id='idreferencia' name='idreferencia' value=<?php echo $ref ?>></td>
              <td style='display:none'><input type='text' id='codigo' name='codigo' value=<?php echo $codigo ?>></td>
              <td style='display:none'><input type='text' id='idactividades' name='idactividades' value=<?php echo $actividad ?>></td>
              <td style='display:none'><input type='text' id='flagNuevaLlave' name='flagNuevaLlave' value='1'></td>
          </tr>  
        </table>
      </form>
<br>
<?php echo '<a href="referencia.php?idreferencias='.urlencode($ref).'&idactividades='.urlencode($actividad).'">Volver</a>'; ?>
<br>

</div>

</body>

<?php require_once("vistas/pie.php") ?>
