<body onload='mueveReloj()'>

<div id='contenido'>

<br>
<h1>ACTIVIDADES EN LOS HSM</h1>
<br>
<?php
if ($flagEliminar == 1) 
  {
  echo "<font class='negra'>".$mensajeBorrado."</font><br>";
}

if ($registros >= 1)
  { 
?>
<form name='logbook' method='post' action='nuevaActividad.php'>
    <table class="edicion">
      <tr>
          <th colspan="3">D&Iacute;A</th>
          <th rowspan="2">Motivo</th>          
          <th colspan="3">Usuario 1</th>
          <th colspan="3">Usuario 2</th>
      </tr>
      <tr>
        <th class="subtitulo2">Fecha</th>
        <th class="subtitulo1">Inicio</th>
        <th class="subtitulo1">Fin</th>
        <th class="subtitulo1">Nombre</th>
        <th class="subtitulo1">Rol</th>
        <th class="subtitulo1">Empresa</th>
        <th class="subtitulo2">Nombre</th>
        <th class="subtitulo2">Rol</th>
        <th class="subtitulo2">Empresa</th>
      </tr>
      <?php

      foreach($fechas as $index => $valor)
        {
        echo "<tr>";
          echo '<td nowrap><a href="actividad.php?idactividades='.$idactividades[$index].'">'.$fechas[$index]."<a/></td>";
          echo "<td>".$horaInicios[$index]."</td>";
          echo "<td>".$horaFines[$index]."</td>";
          echo "<td nowrap>".$motivos[$index]."</td>";
          echo '<td nowrap><a href="usuario.php?idusuarios='.$usuarios1[$index].'">'.$nombres1[$index].' '.$apellidos1[$index].'</a></td>';
          echo "<td>".$roles1[$index]."</td>";
          echo "<td>".$empresas1[$index]."</td>";
          echo '<td nowrap><a href="usuario.php?idusuarios='.$usuarios2[$index].'">'.$nombres2[$index].' '.$apellidos2[$index].'</a></td>';
          echo "<td>".$roles2[$index]."</td>";
          echo "<td nowrap>".$empresas2[$index]."</td>";
        echo "</tr>";
      }
      ?>
    <tr>
      <td colspan="13"><input type='submit' id='agregarActividad' name='agregarActividad' value='Nueva Actividad' class='boton'></td>
    </tr>  
  </table>
</form>
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
