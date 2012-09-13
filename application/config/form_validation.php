<?php

$config = array(
'clientes/save' => array(
        array(
            'field' => 'cif',
            'label' => 'cif',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'nombre',
            'label' => 'nombre',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'apellido',
            'label' => 'apellidos',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'empresa',
            'label' => 'Empresa',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'cod_postal',
            'label' => 'Codigo Postal',
            'rules' => 'trim|numeric'
        ),
        array(
            'field' => 'telefono',
            'label' => 'Telefono',
            'rules' => 'trim|numeric'
        ),
        array(
            'field' => 'movil',
            'label' => 'Movil',
            'rules' => 'trim|numeric'
        )
    ),
'proveedores/save'=> array(
array(
            'field' => 'cif',
            'label' => 'cif',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'nombre',
            'label' => 'nombre',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'apellido',
            'label' => 'apellidos',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'empresa',
            'label' => 'Empresa',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'cod_postal',
            'label' => 'Codigo Postal',
            'rules' => 'trim|numeric'
        ),
        array(
            'field' => 'telefono',
            'label' => 'Telefono',
            'rules' => 'trim|numeric'
        ),
        array(
            'field' => 'movil',
            'label' => 'Movil',
            'rules' => 'trim|numeric'
        )
		),
'facturas/save'=>array(
array(
            'field' => 'fecha',
            'label' => 'Fecha',
            'rules' => 'trim|required'
        ),
		array(
            'field' => 'concepto',
            'label' => 'Concepto',
            'rules' => 'max_length[30]'
        )
		
		),
'facturas/save_products'=>array(
array(
			'field' => 'cantidad',
            'label' => 'Cantidad',
            'rules' => 'trim|required|numeric'
)
),
'productos/save'=>array(
array(
            'field' => 'nombre',
            'label' => 'Nombre',
            'rules' => 'trim|required'
        ),
		
		array(
            'field' => 'precio',
            'label' => 'Precio',
            'rules' => 'trim|required|numeric'
        )
		
));
?>