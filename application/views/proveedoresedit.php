<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Proveedor</title>
  <?php carga_css('styles.css');?>
</head>
<body>
	<?php
			echo $menu;
                        echo validation_errors();
                          echo"<br>";
		echo form_open('proveedores/save');
		echo form_hidden('idproveedores', $idproveedor=(!empty($proveedor[0]->idproveedores) ? $proveedor[0]->idproveedores:''));
		  echo"<br>";
                echo form_label('CIF','cif');
		echo form_input('cif', $cif=(!empty($proveedor[0]->cif) ? $proveedor[0]->cif:''));
		  echo"<br>";
                echo form_label('NOMBRE','nombre');
		echo form_input('nombre', $nombre=(!empty($proveedor[0]->nombre) ? $proveedor[0]->nombre:''));
		  echo"<br>";
                echo form_label('APELLIDO','apellido');
		echo form_input('apellido', $apellido=(!empty($proveedor[0]->apellido) ? $proveedor[0]->apellido:''));
		  echo"<br>";
                echo form_label('EMPRESA','empresa');
		echo form_input('empresa', $empresa=(!empty($proveedor[0]->empresa) ? $proveedor[0]->empresa:''));
		  echo"<br>";
                echo form_label('DIRECCI�N','direccion');
		echo form_input('direccion', $direccion=(!empty($proveedor[0]->direccion) ? $proveedor[0]->direccion:''));
		  echo"<br>";
                echo form_label('PROVINCIA','provincia');
		echo form_input('provincia', $provincia=(!empty($proveedor[0]->provincia) ? $proveedor[0]->provincia:''));
		  echo"<br>";
                echo form_label('C�DIGO POSTAL','cod_postal');
		echo form_input('cod_postal', $cod_postal=(!empty($proveedor[0]->cod_postal) ? $proveedor[0]->cod_postal:''));
		  echo"<br>";
                echo form_label('TEL�FONO','telefono');
		echo form_input('telefono', $telefono=(!empty($proveedor[0]->telefono) ? $proveedor[0]->telefono:''));
		  echo"<br>";
                echo form_label('M�VIL','movil');
		echo form_input('movil', $movil=(!empty($proveedor[0]->movil) ? $proveedor[0]->movil:''));
		  echo"<br>";
                echo form_label('EMAIL','email');
		echo form_input('email', $email=(!empty($proveedor[0]->email) ? $proveedor[0]->email:''));
		  echo"<br>";
                echo form_submit('', 'Submit!');
		echo form_close();
		
	?>
</body>
</html>