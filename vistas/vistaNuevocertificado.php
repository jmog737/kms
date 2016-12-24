<body onload='mueveReloj()'>

<div id='contenido'>
  <br>
  <form name='nuevoCertificado' method='post' action='referencia.php' onsubmit="return validarCertificado()">  
        <table class="edicion">
          <tr>
              <th colspan="10">DATOS GENERALES</th>
          </tr>  
          <tr>
              <th style="text-align: left">Nombre:</th>
              <td colspan="2"><input id="nombreCertificado" name="nombreCertificado" class="negritaRoja" type="text" style="width:100%"></td>
              <th>Owner:</th>
              <td colspan="3"><input id="owner" name="owner" class="negritaRoja" type="text" style="width:100%"></td>
              <th>Versi&oacute;n:</th>
              <td colspan="2"><input id="version" name="version" class="negritaRoja" type="text" style="width:100%"></td> 
          </tr>
          <tr>
              <th style="text-align: left">Bandera:</th>
              <td colspan="2">
                  <select id="bandera" name="bandera" style="width:100%">
                    <option value="VISA">VISA</option>
                    <option value="MASTER">MASTER</option>
                    <option value="AMEX">AMEX</option>
                  </select>
              </td>
              <th style="text-align: left">Acci&oacute;n:</th>
              <td colspan="3">
                <select id="accion" name="accion" style="width:100%">
                    <option value="Importaci&oacute;n">Importaci&oacute;n</option>
                    <option value="Solicitud">Solicitud</option>
                    <option value="Exportaci&oacute;n">Exportaci&oacute;n</option>
                    <option value="Borrado">Borrado</option>
                </select>
              </td>
              <th style="text-align: left">Vencimiento:</th>
              <td colspan="2"><input id="vencimiento" name="vencimiento" type="date" style="width:100%"></td>
          </tr>
          <tr>
              <th colspan="2" style="text-align: left">Observaciones:</th>
              <td colspan="8"><textarea id="observaciones" name="observaciones" style="width: 100%;resize: none"></textarea></td>
          </tr>
          <tr>
              <td colspan="10"><input type='submit' id='agregar' name='agregar' value='AGREGAR' class='boton'></td>
          </tr> 
          <tr>
              <td style='display:none'><input type='text' id='idreferencia' name='idreferencia' value=<?php echo $ref ?>></td>
              <td style='display:none'><input type='text' id='codigo' name='codigo' value=<?php echo $codigo ?>></td>
              <td style='display:none'><input type='text' id='idactividades' name='idactividades' value=<?php echo $actividad ?>></td>
              <td style='display:none'><input type='text' id='flagNuevaLlave' name='flagNuevoCertificado' value='1'></td>
          </tr>  
        </table>
      </form>
<br>
<?php echo '<a href="referencia.php?idreferencias='.urlencode($ref).'&idactividades='.urlencode($actividad).'">Volver</a>'; ?>
<br>

</div>

</body>

<?php require_once("vistas/pie.php") ?>
