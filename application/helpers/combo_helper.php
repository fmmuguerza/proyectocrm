<?php

function combo_categorias($selected = NULL) {
    $CI = &get_instance();
    $categorias = $CI->db->get('categoria')->result_array();
    $combo = '<select name="categoria_idcategoria" id="categoria_idcategoria">';
    foreach ($categorias as $value) {

        $combo.='<option value="';
        $combo.=$value['idcategoria'] . '"';
        if (!is_null($selected) && $selected == $value['idcategoria']) {
            $combo.=' selected="selected" ';
        }
          $combo.='>'.$value['nombre'] . '</option>';
    }
  
     $combo.='</select>';
    return $combo;
}

function combo_proveedores($selected = NULL) {
    $CI = &get_instance();
    $proveedores = $CI->db->get('proveedores')->result_array();
    $combo = '<select name="proveedores_idproveedores" id="proveedores_idproveedores">';
    foreach ($proveedores as $value) {
        $combo.='<option value="';
        $combo.=$value['idproveedores'] . '"';
        if (!is_null($selected) && $selected == $value['idproveedores']) {
            $combo.=' selected="selected" ';
        }
        $combo.='>'.$value['nombre'] . '</option>';
    }
     $combo.='</select>';
   
    return $combo;
}

function combo_clientes($selected = NULL) {
    $CI = &get_instance();
    $clientes = $CI->db->get('clientes')->result_array();
    $combo = '<select name="clientes_idclientes" id="clientes_idclientes">';
    foreach ($clientes as $value) {
        $combo.='<option value="';
        $combo.=$value['idclientes'] . '"';
        if (!is_null($selected) && $selected == $value['idclientes']) {
            $combo.=' selected="selected" ';
        }
        $combo.='>'.$value['empresa'] . '</option>';
    }

    
   $combo.='</select>';
    return $combo;
}

function combo_productos($selected = NULL, $name = NULL) {
    $CI = &get_instance();
    $productos = $CI->db->get('productos')->result_array();
    $combo = '<select name="';
    if (is_null($name)) {
        $combo.='idarticulos" id="idarticulos">';
    } else {
        $combo.=$name . '" id="' . $name . '"';
    }
    foreach ($productos as $value) {
        $combo.='<option value="';
        $combo.=$value['idarticulos'] . '"';
        if (!is_null($selected) && $selected == $value['idarticulos']) {
            $combo.=' selected="selected" ';
        }
        $combo.='>' . $value['nombre'] . '</option>';
    }

    $combo.='</select>';
    return $combo;
}

?>