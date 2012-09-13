<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Editar Factura</title>
          <?php carga_css('styles.css');?>
    </head>
    <body>
        <?php echo $menu;   echo"<br>";?>
  <?php
    if ($this->session->flashdata('errors')){ 
    echo "<div class='error'>";
    echo $this->session->flashdata('errors');
    echo "</div>";
    }
    ?><br>
        <?php echo form_open('facturas/save'); ?>
        <?php echo form_hidden('idfacturas', $idfactura = (!empty($factura[0]->idfacturas) ? $factura[0]->idfacturas : '')); ?>
        <br>
        <?php echo form_label('clientes_idclientes', 'clientes_idclientes	'); ?>
        <?php echo combo_clientes($clientes_idclientes = (!empty($factura[0]->clientes_idclientes) ? $factura[0]->clientes_idclientes : '')); ?>
            <br>
        <?php echo form_label('fecha', 'fecha'); ?>
        <?php echo form_input('fecha', $fecha = (!empty($factura[0]->fecha) ? $factura[0]->fecha : '')); ?>
                <br>
        <?php echo form_label('concepto', 'concepto'); ?>
        <?php echo form_input('concepto', $concepto = (!empty($factura[0]->concepto) ? $factura[0]->concepto : '')); ?>
                    <br>
        <?php echo form_label('importe', 'importe'); ?>
        <?php echo (!empty($factura[0]->importe) ? $factura[0]->importe : ''); ?>
                        <br>
        <?php echo form_submit('', 'Submit!'); ?>
        <?php echo form_close(); ?>
        <?php if (!empty($facturas_has_productos)) : ?>
            <?php foreach ($facturas_has_productos as $value) : ?>
                <?php $query = $this->db->get_where('productos', array('idarticulos' => $value['productos_idarticulos'])); ?>
                <?php echo $value['productos_idarticulos']; ?>
                <?php if ($query->num_rows() > 0) : ?>
                    <?php $row = $query->row(); ?>
                    <?php echo $row->nombre; ?>
                <?php endif; ?>
                <?php echo $value['cantidad'] . '<br>';?>
            <?php endforeach; ?>
        <?php else : ?>
            <?php echo "No hay productos"; ?>
        <?php endif; ?>
        <?php if (!empty($factura[0]->idfacturas)) : ?>
        <?php echo form_open('facturas/save_products'); ?>
        <?php echo form_hidden('facturas_idfacturas', $idfactura = (!empty($factura[0]->idfacturas) ? $factura[0]->idfacturas : '')); ?>
                            <br>
        <?php echo combo_productos(null, 'productos_idarticulos'); ?>
                            <br>       
 <?php echo form_label('Cantidad', 'cantidad'); ?>
        <?php echo form_input('cantidad'); ?><br>
        <?php echo form_submit('', 'Submit!'); ?>
        <?php echo form_close(); ?>
         <?php endif; ?>

    </body>
</html>
