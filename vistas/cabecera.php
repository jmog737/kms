<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
  <div id="global">
    <head>  
        <link rel='stylesheet' href='estilos/estilo.css' type='text/css' media='all'>
        <?php
        header('Content-Type: text/html; charset=utf-8');
        require_once("scripts.php") ?>
        <title><?php echo $pageTitle; ?></title>

        <div id="cabecera">
            <form name='form_reloj' class='centrar'>
                <table class='tabla' cellspacing='0px'>
                    <tr>
                        <td class='logo'>
                            <a href='index.php'>
                                <img src='imagenes/logotipo.jpg'>
                            </a>
                        </td>
                        <td class="tituloTabla">
                            <?php echo $pageTitle; ?>
                        </td>
                        <td class='margen'>
                            <input type='text' name='fecha' class='fecha' onfocus='window.document.form_reloj.fecha.blur()'>
                        </td>
                        <td class='hora'>
                            <input type='text' name='reloj' class='reloj' onfocus='window.document.form_reloj.reloj.blur()'>
                        </td>
                    </tr>
                </table>
            </form>
        </div> <!-- fin del div cabecera -->
    </head>
