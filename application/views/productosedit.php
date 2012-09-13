<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Producto</title>
  <?php carga_css('styles.css');?>
</head>
<body>
	<?php
			echo $menu;
                        echo validation_errors();
                          echo"<br>";
		echo form_open('productos/save');
		echo form_hidden('idarticulos', $idproducto=(!empty($producto[0]->idarticulos) ? $producto[0]->idarticulos:''));
		  echo"<br>";
                echo form_label('NOMBRE','nombre');
		echo form_input('nombre', $nombre=(!empty($producto[0]->nombre) ? $producto[0]->nombre:''));
		  echo"<br>";
                echo form_label('descripcion','descripcion');
		echo form_input('descripcion', $descripcion=(!empty($producto[0]->descripcion) ? $producto[0]->descripcion:''));
		  echo"<br>";
                echo form_label('stock','stock');
		echo form_input('stock', $stock=(!empty($producto[0]->stock) ? $producto[0]->stock:''));
		  echo"<br>";
                echo form_label('precio','precio');
		echo form_input('precio', $precio=(!empty($producto[0]->precio) ? $producto[0]->precio:''));
		  echo"<br>";
                echo form_label('categoria_idcategoria','categoria_idcategoria');
		echo combo_categorias($categoria_idcategoria=(!empty($producto[0]->categoria_idcategoria) ? $producto[0]->categoria_idcategoria:''));
		  echo"<br>";
                echo form_label('proveedores_idproveedores','proveedores_idproveedores');
		echo combo_proveedores($proveedores_idproveedores=(!empty($producto[0]->proveedores_idproveedores) ? $producto[0]->proveedores_idproveedores:''));
		  echo"<br>";
                echo form_submit('', 'Submit!');
		echo form_close();
		
	?>
</body>
</html>