<body onload='mueveReloj()'>

<div id='contenido'>
<br>
<h1><font class="negritaRoja"><?php echo $codigo.":" ?></font></h1>
<br>
<?php
if ($flagNuevaLlave == 1) 
  {
  echo "<font class='negra'>".$confirmacionLLave."</font><br>";
}
if ($flagNuevoCertificado == 1) 
  {
  echo "<font class='negra'>".$confirmacionCertificado."</font><br>";
}
if ($flagEliminar == 1) 
  {
  echo "<font class='negra'>".$mensajeBorrado."</font><br>";
}
if ($flagNuevaReferencia == 1) 
  {
  echo "<font class='negra'>".$msgNuevaRef."</font><br>";
}
/*
if ($num_llaves || $num_certificados >= 1)
  {*/
?>  
<form id='referencia' name='referencia' method='POST'>
  <table class="edicion">
      <tr>
          <th colspan="6">GENERAL</th>
      </tr>
      <tr>
          <th style="text-align: left">Lugar</th>
          <td><input id="lugar" name="lugar" type="text" disabled='true' class="test" value="<?php echo $lugar ?>" maxlength="10" size="10"></td>
          <th style="text-align: left">HSM</th>
          <td><?php echo $hsm ?></td>
          <th style="text-align: left">Slot</th>
          <td><?php echo $slot ?></td>
      </tr>
      <tr>
          <th style="text-align: left">Plataforma</th>
          <td><?php echo $plataforma ?></td>
          <td colspan="2"></td>
          <th style="text-align: left">Aplicaci&oacute;n</th>
          <td><input id="aplicacion" name="aplicacion" disabled='true' type="text" style="width:100%; text-align: left" value="<?php echo $aplicacion ?>"></td>
      </tr>
      <tr>
          <th colspan="6">RESUMEN</th>
      </tr>
      <tr>
          <td colspan="6"><input id="resumen" name="resumen" disabled='true' size="15" maxlength="10" type="text" style="width:100%; text-align: center" value="<?php echo $resumen ?>"></td>
      </tr>
      <tr>
          <th colspan="6">DETALLES</th>
      </tr>
      <tr>
          <td colspan="6"><input id="detalles" name="detalles" disabled='true' type="text" size="5" maxlength="10" style="width:70%; text-align: center;" value="<?php echo $detalles ?>"></td>
      </tr>
      
      <tr>
          <td style='display:none'><input type='text' id='idreferencia' name='idreferencia' value=<?php echo $ref ?>></td>
          <td style='display:none'><input type='text' id='idllave' name='codigo' value=<?php echo $codigo ?>></td>
          <td style='display:none'><input type='text' id='idactividades' name='idactividades' value=<?php echo $actividad ?>></td>
      </tr>
      <tr>
          <th colspan="6">OBJETOS</th>
      </tr>
      <tr>
          <th colspan='6'>LLAVES</th>
      </tr>
      <tr>
          <th>Item</th>
          <th>Acci&oacute;n</th>
          <th colspan='2'>Nombre</th>
          <th colspan='1'>Owner</th>
          <th colspan='1'>KCV</th>
      </tr>
      <?php /*
      if ($num_llaves >= 1)
        { 
        foreach($idkey as $index => $valor)
          {
          $indice = $index + 1;
          echo "<tr>";
            echo "<td>".$indice."</td>";
            echo "<td>".$accionLlave[$index]."</td>";
            echo '<td colspan="2"><a href="llave.php?idkeys='.$valor.'&idreferencia='.$ref.'&codigo='.$codigo.'&idactividades='.$actividad.'">'.$nombreLlave[$index].'</a></td>';
            echo "<td colspan='1'>".$ownerLlave[$index]."</td>";
            echo "<td colspan='1'>".$kcvs[$index]."</td>";
          echo "</tr>";
        }
      }  */
      ?>  <!--
      <tr>
        <td colspan='6'><input type='submit' id='agregarLlave' name='agregarLlave' value='Nueva Llave' onclick="this.form.action = 'nuevaLlave.php'" class='boton'></td>
      </tr>         
      <tr>
        <th colspan='6'>CERTIFICADOS</th>
      </tr>
      <tr>
        <th>Item</th>  
        <th>Acci&oacute;n</th>
        <th colspan='2'>Nombre</th>
        <th colspan='2'>Owner</th>
      </tr> -->
      <?php /*
      if ($num_certificados >= 1)
        {
        foreach($idscertificado as $index => $valor)
          {
          $indice = $index + 1;
          echo "<tr>";
            echo "<td>".$indice."</td>";
            echo "<td>".$accionCertificado[$index]."</td>";
            echo '<td colspan="2"><a href="certificado.php?idcertificados='.$valor.'&idreferencia='.$ref.'&codigo='.$codigo.'&idactividades='.$actividad.'">'.$nombresCertificado[$index].'</a></td>';
            echo "<td colspan='2'>".$ownersCertificado[$index]."</td>";
          echo "</tr>";
        }
      } */
      ?> <!--
      <tr>
        <td colspan='6'><input type='submit' id='agregarCertificado' name='agregarCertificado' value='Nuevo Certificado' onclick="this.form.action = 'nuevoCertificado.php'" class='boton'></td>
      </tr> -->
      <?php /*
      if ($num_involucrados >= 1)
        { */
      ?> <!--
        <tr>
            <th colspan="6">INVOLUCRADOS</th>
        </tr>
        <tr>
            <th colspan="2">Nombre</th>
            <th colspan="2">Empresa</th>
            <th colspan="2">Rol</th>
        </tr> -->
      <?php /*
        foreach($idusuarios as $index => $valor)
          {
          echo '<tr>';
            echo '<td colspan="2"><a href="usuario.php?idusuarios='.$idusuarios[$index].'&idreferencia='.$ref.'">'.$nombreInvolucrado[$index]." ".$apellidoInvolucrado[$index].'</a></td>';
            echo '<td colspan="2">'.$empresaInvolucrado[$index].'</td>';
            echo '<td colspan="2">'.$rolInvolucrado[$index].'</td>';
          echo '</tr>';
        }
      }*/
      ?>
  </table>
</form>

<br>
<?php echo '<a href="actividad.php?idactividades='.$actividad.'">Volver</a>'; ?>
<br>

<?php
/*
  }
else
  {
  echo "NO existen objetos asociados a esta referencia. Por favor verifique o agregue el primero.<br><br>"
  . "<a href='logbook.php'>Volver</a>";
}*/
?>  

<br>

</div>

</body>

<?php require_once("vistas/pie.php") ?>
