<?php
function main_menu(){
   
	$list = array(
            anchor('clientes','Clientes'), 
            anchor('productos','Productos'), 
            anchor('proveedores','Proveedores'),
            anchor('facturas','facturas')
            );

			
		$attributes = array(
                    'class' => 'boldlist',
                    'id'    => 'mylist'
                    );
	return ul($list, $attributes);
}

?>