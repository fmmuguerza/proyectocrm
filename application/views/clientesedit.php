<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Editar Cliente</title>
        <?php carga_css('styles.css');?>
    </head>
    <body>
        <?php
        echo $menu;
        echo validation_errors();
        echo"<br>";
        echo form_open('clientes/save');
        echo form_hidden('idclientes', $idcliente = (!empty($cliente[0]->idclientes) ? $cliente[0]->idclientes : ''));
        echo"<br>";
        echo form_label('CIF', 'cif');
        echo form_input('cif', $cif = (!empty($cliente[0]->cif) ? $cliente[0]->cif : ''));
        echo"<br>";
        echo form_label('NOMBRE', 'nombre');
        echo form_input('nombre', $nombre = (!empty($cliente[0]->nombre) ? $cliente[0]->nombre : ''));
        echo"<br>";
        echo form_label('APELLIDO', 'apellido');
        echo form_input('apellido', $apellido = (!empty($cliente[0]->apellido) ? $cliente[0]->apellido : ''));
        echo"<br>";
        echo form_label('EMPRESA', 'empresa');
        echo form_input('empresa', $empresa = (!empty($cliente[0]->empresa) ? $cliente[0]->empresa : ''));
        echo"<br>";
        echo form_label('DIRECCIÓN', 'direccion');
        echo form_input('direccion', $direccion = (!empty($cliente[0]->direccion) ? $cliente[0]->direccion : ''));
        echo"<br>";
        echo form_label('PROVINCIA', 'provincia');
        echo form_input('provincia', $provincia = (!empty($cliente[0]->provincia) ? $cliente[0]->provincia : ''));
        echo"<br>";
        echo form_label('CÓDIGO POSTAL', 'cod_postal');
        echo form_input('cod_postal', $cod_postal = (!empty($cliente[0]->cod_postal) ? $cliente[0]->cod_postal : ''));
        echo"<br>";
        echo form_label('TELÉFONO', 'telefono');
        echo form_input('telefono', $telefono = (!empty($cliente[0]->telefono) ? $cliente[0]->telefono : ''));
        echo"<br>";
        echo form_label('MÓVIL', 'movil');
        echo form_input('movil', $movil = (!empty($cliente[0]->movil) ? $cliente[0]->movil : ''));
        echo"<br>";
        echo form_label('EMAIL', 'email');
        echo form_input('email', $email = (!empty($cliente[0]->email) ? $cliente[0]->email : ''));
        echo"<br>";
        echo form_submit('', 'Submit!');
        echo form_close();
        ?>
    </body>
</html>