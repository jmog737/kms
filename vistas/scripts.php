<script language='javascript'>

function mueveReloj()
  {
  momentoActual = new Date();
  hora = momentoActual.getHours();
  minuto = momentoActual.getMinutes();
  segundo = momentoActual.getSeconds();
  dia = momentoActual.getDate();
  mes = momentoActual.getMonth()+1;
  anio = momentoActual.getFullYear();

  str_segundo = new String (segundo);
  if (str_segundo.length == 1)
      segundo = "0" + segundo;

  str_minuto = new String (minuto);
  if (str_minuto.length == 1)
      minuto = "0" + minuto;

  str_hora = new String (hora);
  if (str_hora.length == 1)
      hora = "0" + hora

  horaImprimible = hora + ":" + minuto + ":" + segundo;
  fecha = dia + "/" + mes + "/" + anio;

  document.form_reloj.reloj.value = horaImprimible;
  document.form_reloj.fecha.value = fecha;

  setTimeout("mueveReloj()",1000);
}
                
function cambiarEdicion()
  {
  var fuente = document.getElementById("fuente").value;
  var editar = document.getElementById("editar").value;
  
  switch (fuente)
    {
    case "llave":
                 if (editar == "EDITAR")
                    {
                    document.getElementById("nombreLlave").disabled = false;
                    document.getElementById("owner").disabled = false;
                    document.getElementById("version").disabled = false;
                    document.getElementById("tipo").disabled = false;
                    document.getElementById("bits").disabled = false;
                    document.getElementById("exponente").disabled = false;
                    document.getElementById("uso_encrypt").disabled = false;
                    document.getElementById("uso_sign").disabled = false;
                    document.getElementById("uso_wrap").disabled = false;
                    document.getElementById("uso_export").disabled = false;
                    document.getElementById("uso_derive").disabled = false;
                    document.getElementById("uso_decrypt").disabled = false;
                    document.getElementById("uso_verify").disabled = false;
                    document.getElementById("uso_unwrap").disabled = false;
                    document.getElementById("uso_import").disabled = false;
                    document.getElementById("att_sensitive").disabled = false;
                    document.getElementById("att_modifiable").disabled = false;
                    document.getElementById("att_private").disabled = false;
                    document.getElementById("att_extractable").disabled = false;
                    document.getElementById("att_exportable").disabled = false;
                    document.getElementById("att_trusted").disabled = false;
                    document.getElementById("att_wrapwtrusted").disabled = false;
                    document.getElementById("att_unwrapmask").disabled = false;
                    document.getElementById("att_derivemask").disabled = false;
                    document.getElementById("att_deletable").disabled = false;
                    document.getElementById("editar").value = "INHABILITAR";
                    document.getElementById("actualizar").disabled = false;
                    document.getElementById("kcv").disabled = false;
                    document.getElementById("observaciones").disabled = false;
                    document.getElementById("generacion").disabled = false;
                    document.getElementById("accion").disabled = false;
                  }
                 else
                    {
                    document.getElementById("nombreLlave").disabled = true;
                    document.getElementById("owner").disabled = true;
                    document.getElementById("version").disabled = true;
                    document.getElementById("tipo").disabled = true;
                    document.getElementById("bits").disabled = true;
                    document.getElementById("exponente").disabled = true;
                    document.getElementById("uso_encrypt").disabled = true;
                    document.getElementById("uso_sign").disabled = true;
                    document.getElementById("uso_wrap").disabled = true;
                    document.getElementById("uso_export").disabled = true;
                    document.getElementById("uso_derive").disabled = true;
                    document.getElementById("uso_decrypt").disabled = true;
                    document.getElementById("uso_verify").disabled = true;
                    document.getElementById("uso_unwrap").disabled = true;
                    document.getElementById("uso_import").disabled = true;
                    document.getElementById("att_sensitive").disabled = true;
                    document.getElementById("att_modifiable").disabled = true;
                    document.getElementById("att_private").disabled = true;
                    document.getElementById("att_extractable").disabled = true;
                    document.getElementById("att_exportable").disabled = true;
                    document.getElementById("att_trusted").disabled = true;
                    document.getElementById("att_wrapwtrusted").disabled = true;
                    document.getElementById("att_unwrapmask").disabled = true;
                    document.getElementById("att_derivemask").disabled = true;
                    document.getElementById("att_deletable").disabled = true;
                    document.getElementById("editar").value = "EDITAR";
                    document.getElementById("actualizar").disabled = true;
                    document.getElementById("kcv").disabled = true;
                    document.getElementById("observaciones").disabled = true;
                    document.getElementById("generacion").disabled = true;
                    document.getElementById("accion").disabled = true;
                  }
                 break;
    case "certificado":
                      if (editar == "EDITAR")
                        {
                        document.getElementById("nombreCertificado").disabled = false;
                        document.getElementById("owner").disabled = false;
                        document.getElementById("version").disabled = false;
                        document.getElementById("bandera").disabled = false;
                        document.getElementById("accion").disabled = false;
                        document.getElementById("vencimiento").disabled = false; 
                        document.getElementById("observaciones").disabled = false;
                        document.getElementById("editar").value = "INHABILITAR";
                        document.getElementById("actualizar").disabled = false;
                      }
                      else
                        {
                        document.getElementById("nombreCertificado").disabled = true;
                        document.getElementById("owner").disabled = true;
                        document.getElementById("version").disabled = true;
                        document.getElementById("bandera").disabled = true;
                        document.getElementById("accion").disabled = true;
                        document.getElementById("vencimiento").disabled = true;
                        document.getElementById("observaciones").disabled = true;
                        document.getElementById("editar").value = "EDITAR";
                        document.getElementById("actualizar").disabled = true;
                      }
                      break;
    case "actividad":
                    if (editar == "EDITAR")
                      {
                      document.getElementById("fecha").disabled = false;
                      document.getElementById("horaInicio").disabled = false;
                      document.getElementById("horaFin").disabled = false;
                      document.getElementById("motivo").disabled = false;
                      document.getElementById("usuario1").disabled = false;
                      document.getElementById("rol1").disabled = false; 
                      document.getElementById("usuario2").disabled = false;
                      document.getElementById("rol2").disabled = false; 
                      document.getElementById("editar").value = "INHABILITAR";
                      document.getElementById("actualizar").disabled = false;
                    }
                    else
                      {
                      document.getElementById("fecha").disabled = true;
                      document.getElementById("horaInicio").disabled = true;
                      document.getElementById("horaFin").disabled = true;
                      document.getElementById("motivo").disabled = true;
                      document.getElementById("usuario1").disabled = true;
                      document.getElementById("rol1").disabled = true; 
                      document.getElementById("usuario2").disabled = true;
                      document.getElementById("rol2").disabled = true; 
                      document.getElementById("editar").value = "EDITAR";
                      document.getElementById("actualizar").disabled = true;
                    }
                    break;
    default: break;                  
  }  
}

function validarEntero(valor)
  {
  valor = parseInt(valor)
  //Compruebo si es un valor num�rico
  if (isNaN(valor)) {
      //entonces (no es numero) devuelvo el valor cadena vacia
      return false;
      }
  else{
      //En caso contrario (Si era un n�mero) devuelvo el valor
      return true;
  }
}
    
function validar(valor)
  {
  var seguir = true;
  var nombre, owner, version, observaciones, formu, pregunta, referencia;
  var fuente = document.getElementById("fuente").value;
  
  // validación conjunta para llaves y certificados:
  if (fuente == 'llave') 
    {
    formu = detalleLlave;
    nombre = detalleLlave.nombreLlave;
    owner = detalleLlave.owner;
    version = detalleLlave.version;
    observaciones = detalleLlave.observaciones;
    pregunta = "de la llave ";
  }
  if (fuente == 'certificado')
    {
    formu = detalleCertificado;
    nombre = detalleCertificado.nombreCertificado;
    owner = detalleCertificado.owner;
    version = detalleCertificado.version;
    observaciones = detalleCertificado.observaciones;
    pregunta = "del certificado ";
  }
  if (fuente == 'actividad')
    {
    var inicio = document.getElementById("horaInicio").value;
    var fin = document.getElementById("horaFin").value;
    var motivo = document.getElementById("motivo").value;
    var actividad = document.getElementById("idactividades").value;
    var margen = 40;
    formu = activity;

    var indiceUser1 = document.getElementById("usuario1").selectedIndex;
    var indiceUser2 = document.getElementById("usuario2").selectedIndex;
    var indiceRol1 = document.getElementById("rol1").selectedIndex;
    var indiceRol2 = document.getElementById("rol2").selectedIndex;

    // Fecha pasada como parámetro y variables para manejo de fechas:
    var fecha = document.getElementById("fecha").value;
    var days = ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"];
    var d = new Date(fecha);
    var diaSemana = days[d.getUTCDay()];
    var dia = d.getUTCDate();  
    var mes = d.getUTCMonth() + 1;
    var fechaInterpretada = dia + '/' + mes + '/' + d.getFullYear();
    var actual = new Date();

    // Variables para el manejo de las horas:
    var h1 = inicio.substring(0,2);
    var m1 = inicio.substring(3,5);
    var h2 = fin.substring(0,2);
    var m2 = fin.substring(3,5);
    var tiempo1 = Number(h1)*60 + Number(m1);
    var tiempo2 = Number(h2)*60 + Number(m2);
  }
  
  // chequeo si se quiere actualizar o eliminar:
  if (valor === 'actualizar')
    {  
    document.getElementById("flagEditar").value = 1;
    switch (fuente)
      {
      case "actividad":
                      if (fecha.length === 0)
                        {
                        alert('Debe ingresar la FECHA en que se realizó la actividad.');
                        document.getElementById("fecha").focus();
                        seguir = false;
                      } 
                      else
                        {
                        if (d > actual)
                          {
                          alert('La fecha ingresada NO puede ser POSTERIOR a la fecha ACTUAL!.');
                          document.getElementById("fecha").focus();
                          seguir = false;
                        }
                        else
                          {
                          if (diaSemana === "Domingo")
                            {
                            alert('La fecha ingresada: ' + fechaInterpretada + ' es un Domingo!.');
                            document.getElementById("fecha").focus();
                            seguir = false;
                          }  
                          else
                            {
                            if (diaSemana === "Sábado")
                              {
                              alert('La fecha ingresada: ' + fechaInterpretada + ' es un Sábado!.');
                              document.getElementById("fecha").focus();
                              seguir = false;
                            }
                            else
                              { 
                              if (inicio.length === 0)
                                {
                                alert('Debe ingresar la hora de INICIO de la actividad.');
                                document.getElementById("inicio").focus();
                                seguir = false;
                              }
                              else
                                {
                                if (fin.length === 0)
                                  {
                                  alert('Debe ingresar la hora de FINALIZACIÓN de la actividad.');
                                  document.getElementById("fin").focus();
                                  seguir = false;
                                }           
                                else
                                  {
                                  if (inicio >= fin)
                                    {
                                    alert('La hora de INICIO debe ser ANTERIOR a la hora de FINALIZACIÓN.');
                                    document.getElementById("fin").focus();
                                    seguir = false;
                                  }
                                  else
                                    {
                                    if ((tiempo1 + margen) > tiempo2)
                                      {
                                      alert('La ceremonia debió haber demorado al menos ' + margen + ' minutos!.');
                                      document.getElementById("fin").focus();
                                      seguir = false;
                                    }
                                    else
                                      {
                                      if (motivo.length === 0)
                                        {
                                        alert('Debe ingresar el MOTIVO de la actividad.');
                                        document.getElementById("motivo").focus();
                                        seguir = false;
                                      }
                                      else
                                        {
                                        if (document.getElementById("usuario1").options[indiceUser1].value === 'ninguno')
                                          {
                                          alert('Debe seleccionar un USUARIO 1.');
                                          document.getElementById("usuario1").focus();
                                          seguir = false;
                                        }
                                        else
                                          {
                                          if (document.getElementById("rol1").options[indiceRol1].value === 'ninguno')
                                            {
                                            alert('Debe seleccionar un ROL para el USUARIO 1.');
                                            document.getElementById("rol1").focus();
                                            seguir = false;
                                          }
                                          else
                                            {
                                            if (document.getElementById("usuario2").options[indiceUser2].value === 'ninguno')
                                              {
                                              alert('Debe seleccionar un USUARIO 2.');
                                              document.getElementById("usuario2").focus();
                                              seguir = false;
                                            }
                                            else
                                              {
                                              if (indiceUser1 === indiceUser2)
                                                {
                                                alert('El mismo USUARIO no puede estar las dos veces.');
                                                document.getElementById("usuario2").focus();
                                                seguir = false;
                                              }
                                              else
                                                {
                                                if (document.getElementById("rol2").options[indiceRol2].value === 'ninguno')
                                                  {
                                                  alert('Debe seleccionar un ROL para el USUARIO 2.');
                                                  document.getElementById("rol2").focus();
                                                  seguir = false;
                                                }
                                                else
                                                  {
                                                  if ((indiceRol1 === indiceRol2) && (indiceRol1 !== 3))
                                                    {
                                                    alert('NO puede haber dos Usuarios con el mismo ROL.');
                                                    document.getElementById("rol2").focus();
                                                    seguir = false;
                                                  }
                                                  else  
                                                    {
                                                    seguir = true;
                                                  }
                                                } // if roles deben ser distintos
                                              } // if seleccionar rol 2
                                            } // if usuarios deben ser disintos
                                          } // if seleccionar usuario 2
                                        } //if seleccionar rol 1
                                      } // if seleccionar usuario 1  
                                    } // if ingresar motivo
                                  } // if no hay margen suficiente
                                } // if fin posterior a inicio
                              }  // if ingresar fin
                            } // if ingresar inicio
                          } // if día sabado
                        } // if dia domingo
                      } // if fecha posterior a la actual     
                      break;
      case "referencia":
                        break;
      // el default lo dejo para lo habitual de llaves y certificados:                 
      default: if ((nombre.value.length==0) || (nombre.value == ' '))
                 {
                 alert('Debe escribir el nombre.');
                 nombre.focus();
                 seguir = false;
               }
               else
                 {
                 if ((owner.value.length==0) || (owner.value == ' '))
                   {
                   alert('Debe escribir el owner.');
                   owner.focus();
                   seguir = false;
                 }
                 else
                   {
                   if ((version.value.length==0) || (version.value == ' '))
                     {
                     alert('Debe ingresar la versión.');
                     version.focus();
                     seguir = false;
                   }
                   else
                     {
                     seguir = true;
                   }  
                 }
               }
    } 
  }
  else
    {
    // si no se quiere actualizar implica que se quiere eliminar (pasar a estado inactivo).
    // chequeo si se quiere eliminar una actividad o si es una llave/certificado:
    if (fuente == 'actividad')
      {
      if (confirm('¿Confirma la eliminación de la actividad?'))
        {  
        document.getElementById("flagEliminar").value = 1;
        formu.action = 'logbook.php?idactividades=' + actividad;
        seguir = true;
      }
      else seguir = false;
    }
    else
      {
      // si no se quiere actualizar implica que se quiere eliminar (pasar a estado inactivo):  
      if (confirm('¿Confirma la eliminación ' + pregunta + nombre.value + ' con owner ' + owner.value + ' de la referencia: ' + document.getElementById("codigo").value + '?'))
        {  
        document.getElementById("flagEliminar").value = 1;
        formu.action = 'referencia.php?idreferencias=' + referencia;
        seguir = true;
      }
      else seguir = false;
    }
  }
  
  if (seguir) formu.submit();
}

function validarLlave()
  {
  var seguir = false;
  var indice = document.getElementById("tipo").selectedIndex;
  
  if (document.getElementById("nombreLlave").value.length === 0)
    {
    alert('Debe ingresar el nombre de la llave.');
    document.getElementById("nombreLlave").focus();
    seguir = false;
  }
  else
    {
    if (document.getElementById("owner").value.length === 0)
      {
      alert('Debe ingresar el owner de la llave.');
      document.getElementById("owner").focus();
      seguir = false;
    } 
    else
      {
      if (document.getElementById("bits").value.length === 0)
        {
        alert('Debe ingresar el tamaño de la llave.');
        document.getElementById("bits").focus();
        seguir = false;
      }
      else
        {
        if ((validarEntero(document.getElementById("bits").value)) && (document.getElementById("bits").value > 0))
          {  
          if (document.getElementById("version").value.length === 0)
            {
            alert('Debe ingresar la versión de la llave.');
            document.getElementById("version").focus();
            seguir = false;
          }
          else
            {
            if (document.getElementById("tipo").options[indice].value === 'RSA')
              {
              if (document.getElementById("exponente").value.length === 0)
                {
                alert('Debe especificar un exponente dado que la llave es del tipo RSA.');
                document.getElementById("exponente").focus();
                seguir = false;
              }
              else
                {
                if ((validarEntero(document.getElementById("exponente").value)) && (document.getElementById("exponente").value > 0))
                  {
                  seguir = true;
                }
                else
                  {
                  alert('El exponente debe ser un número entero positivo.');
                  document.getElementById("exponente").value = '';
                  document.getElementById("exponente").focus();
                  seguir = false;
                }
              }
            }  
            else
              {
              seguir = true;
            }
          }
        }
        else
          {
          alert('El tamaño debe ser un número entero positivo.');
          document.getElementById("bits").value = '';
          document.getElementById("bits").focus();
          seguir = false;
        }
      }
    }  
  }
  
  if (seguir) return true;
  else return false;
}

function validarCertificado()
  {
  var seguir = false;
  var indice = document.getElementById("bandera").selectedIndex;
  
  if (document.getElementById("nombreCertificado").value.length === 0)
    {
    alert('Debe ingresar el nombre del certificado.');
    document.getElementById("nombreCertificado").focus();
    seguir = false;
  }
  else
    {
    if (document.getElementById("owner").value.length === 0)
      {
      alert('Debe ingresar el owner del certificado.');
      document.getElementById("owner").focus();
      seguir = false;
    } 
    else
      {
      if (document.getElementById("version").value.length === 0)
        {
        alert('Debe ingresar la versión del certificado.');
        document.getElementById("version").focus();
        seguir = false;
      }
      else
        {
        if (document.getElementById("vencimiento").value.length === 0)
          {
          alert('Debe ingresar el vencimiento del certificado.');
          document.getElementById("vencimiento").focus();
          seguir = false;
        }  
        else
          {
          seguir = true;
        }      
      }
    }  
  }
  
  if (seguir) return true;
  else return false;
}

function validarReferencia()
  {
  var seguir = true;
  var indicePlataforma = document.getElementById("plataforma").selectedIndex;
  var indiceSlot = document.getElementById("slot").selectedIndex;
  
  if (document.getElementById("codigo").value.length === 0)
    {
    alert('Debe ingresar el CÓDIGO para la referencia.');
    document.getElementById("codigo").focus();
    seguir = false;
  }
  else
    {
    if (document.getElementById("slot").options[indiceSlot].value === 'ninguno')
      {
      alert('Debe seleccionar un SLOT (HSM).');
      document.getElementById("slot").focus();
      seguir = false;
    }
    else
      {
      if (document.getElementById("plataforma").options[indicePlataforma].value === 'ninguno')
        {
        alert('Debe seleccionar una PLATAFORMA.');
        document.getElementById("plataforma").focus();
        seguir = false;
      }
      else
        {
        if (document.getElementById("resumen").value.length === 0)
          {
          alert('Debe ingresar el RESUMEN de la referencia.');
          document.getElementById("resumen").focus();
          seguir = false;
        }
        else
          {
          if (document.getElementById("detalles").value.length === 0)
            {
            alert('Deben ingresarse los DETALLES de la referencia.');
            document.getElementById("detalles").focus();
            seguir = false;
          }
          else
            {
            seguir = true;            
          }
        } // if detalles
      } // if resumen
    } // if plataforma
  } // if slot

  if (seguir) return true;
  else return false;
}

function validarActividad()
  {
  var indiceUser1 = document.getElementById("usuario1").selectedIndex;
  var indiceUser2 = document.getElementById("usuario2").selectedIndex;
  var indiceRol1 = document.getElementById("rol1").selectedIndex;
  var indiceRol2 = document.getElementById("rol2").selectedIndex; 
  var inicio = document.getElementById("inicio").value;
  var fin = document.getElementById("fin").value;
  var motivo = document.getElementById("motivo").value;
  var margen = 40;
  
  // Fecha pasada como parámetro y variables para manejo de fechas:
  var fecha = document.getElementById("fecha").value;
  var days = ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"];
  var d = new Date(fecha);
  var diaSemana = days[d.getUTCDay()];
  var dia = d.getUTCDate();  
  var mes = d.getUTCMonth() + 1;
  var fechaInterpretada = dia + '/' + mes + '/' + d.getFullYear();
  var actual = new Date();
  
  // Variables para el manejo de las horas:
  var h1 = inicio.substring(0,2);
  var m1 = inicio.substring(3,5);
  var h2 = fin.substring(0,2);
  var m2 = fin.substring(3,5);
  var tiempo1 = Number(h1)*60 + Number(m1);
  var tiempo2 = Number(h2)*60 + Number(m2);
  
  if (fecha.length === 0)
    {
    alert('Debe ingresar la FECHA en que se realizó la actividad.');
    document.getElementById("fecha").focus();
    seguir = false;
  } 
  else
    {
    if (d > actual)
      {
      alert('La fecha ingresada NO puede ser POSTERIOR a la fecha ACTUAL!.');
      document.getElementById("fecha").focus();
      seguir = false;
    }
    else
      {
      if (diaSemana === "Domingo")
        {
        alert('La fecha ingresada: ' + fechaInterpretada + ' es un Domingo!.');
        document.getElementById("fecha").focus();
        seguir = false;
      }  
      else
        {
        if (diaSemana === "Sábado")
          {
          alert('La fecha ingresada: ' + fechaInterpretada + ' es un Sábado!.');
          document.getElementById("fecha").focus();
          seguir = false;
        }
        else
          { 
          if (inicio.length === 0)
            {
            alert('Debe ingresar la hora de INICIO de la actividad.');
            document.getElementById("inicio").focus();
            seguir = false;
          }
          else
            {
            if (fin.length === 0)
              {
              alert('Debe ingresar la hora de FINALIZACIÓN de la actividad.');
              document.getElementById("fin").focus();
              seguir = false;
            }           
            else
              {
              if (inicio >= fin)
                {
                alert('La hora de INICIO debe ser ANTERIOR a la hora de FINALIZACIÓN.');
                document.getElementById("fin").focus();
                seguir = false;
              }
              else
                {
                if ((tiempo1 + margen) > tiempo2)
                  {
                  alert('La ceremonia debió haber demorado al menos ' + margen + ' minutos!.');
                  document.getElementById("fin").focus();
                  seguir = false;
                }
                else
                  {
                  if (motivo.length === 0)
                    {
                    alert('Debe ingresar el MOTIVO de la actividad.');
                    document.getElementById("motivo").focus();
                    seguir = false;
                  }
                  else
                    {
                    if (document.getElementById("usuario1").options[indiceUser1].value === 'ninguno')
                      {
                      alert('Debe seleccionar un USUARIO 1.');
                      document.getElementById("usuario1").focus();
                      seguir = false;
                    }
                    else
                      {
                      if (document.getElementById("rol1").options[indiceRol1].value === 'ninguno')
                        {
                        alert('Debe seleccionar un ROL para el USUARIO 1.');
                        document.getElementById("rol1").focus();
                        seguir = false;
                      }
                      else
                        {
                        if (document.getElementById("usuario2").options[indiceUser2].value === 'ninguno')
                          {
                          alert('Debe seleccionar un USUARIO 2.');
                          document.getElementById("usuario2").focus();
                          seguir = false;
                        }
                        else
                          {
                          if (indiceUser1 === indiceUser2)
                            {
                            alert('El mismo USUARIO no puede estar las dos veces.');
                            document.getElementById("usuario2").focus();
                            seguir = false;
                          }
                          else
                            {
                            if (document.getElementById("rol2").options[indiceRol2].value === 'ninguno')
                              {
                              alert('Debe seleccionar un ROL para el USUARIO 2.');
                              document.getElementById("rol2").focus();
                              seguir = false;
                            }
                            else
                              {
                              if ((indiceRol1 === indiceRol2) && (indiceRol1 !== 3))
                                {
                                alert('NO puede haber dos Usuarios con el mismo ROL.');
                                document.getElementById("rol2").focus();
                                seguir = false;
                              }
                              else  
                                {
                                seguir = true;
                              }
                            } // if roles deben ser distintos
                          } // if seleccionar rol 2
                        } // if usuarios deben ser disintos
                      } // if seleccionar usuario 2
                    } //if seleccionar rol 1
                  } // if seleccionar usuario 1
                } // if ingresar motivo 
              } // if NO cumple margen previsto
            } // if hora de inicio debe ser posterior a hora final
          } // if ingresar hora de finalización
        } // if ingresar hora de inicio
      } // if fecha elegida es sábado
    } // if fecha elegida es domingo
  } // if fecha elegida es posterior a la actual

  if (seguir) return true;
  else return false;
}
   
</script>



