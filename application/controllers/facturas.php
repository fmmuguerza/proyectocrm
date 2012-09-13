<?php

class Facturas extends CI_Controller {

    public function index() {
        $this->table->set_empty("&nbsp;");
        $this->table->set_heading('idfactura', 'idcliente', 'fecha', 'concepto', 'importe', 'Editar', 'Borrar');
        $data = $this->db->get('facturas')->result_array();
        foreach ($data as &$value) {
            $value['editar'] = anchor('facturas/edit/' . $value['idfacturas'], 'editar');
            $value['borrar'] = anchor('facturas/del/' . $value['idfacturas'], 'borrar');
        }
        $data['table'] = $this->table->generate($data);
        $data['add'] = anchor('facturas/add/', 'nuevo');
        $data['menu'] = main_menu();
        $this->load->view('facturasgrid', $data);
    }

    public function edit($id) {
        $data['menu'] = main_menu();
        $this->db->where(array('idfacturas' => $id));
        $factura = $this->db->get('facturas');
        $data['factura'] = $factura->result();

        $this->db->where(array('facturas_idfacturas' => $id));
        $facturas_has_productos = $this->db->get('facturas_has_productos')->result_array();
        $data['facturas_has_productos'] = $facturas_has_productos;

        $this->load->view('facturasedit', $data);
    }

    public function del($id) {
        $this->db->where(array('idfacturas' => $id));
        $this->db->delete('facturas');
        redirect('/facturas', 'refresh');
    }

    public function save() {
        $factura = $this->input->post();
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect('/facturas/add');
        } else {
            if (empty($factura['idfacturas'])) {
                $this->db->insert('facturas', $factura);
                echo "nueva factura correcta";
                redirect('/facturas', 'refresh');
            } else {
                $this->db->where('idfacturas', $factura['idfacturas']);
                unset($factura['idfacturas']);
                unset($factura['clientes_idclientes']); //no debemos actualizar una foregein key
                $this->db->update('facturas', $factura);
                echo "actualizacion factura correcta";
                redirect('/facturas', 'refresh');
            }
        }
    }

    public function add() {
        $data['menu'] = main_menu();
        $this->load->view('facturasedit', $data);
    }

    public function save_products() {
        $linea_factura = $this->input->post();
        $id = $linea_factura['facturas_idfacturas'];
        $this->db->where(array('facturas_idfacturas' => $linea_factura['facturas_idfacturas'], 'productos_idarticulos' => $linea_factura['productos_idarticulos']));
        $n = $this->db->get('facturas_has_productos')->result_array();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect('/facturas/edit/' . $id);
            //$this->load->view('myform');
        } else {
            if (count($n) > 0) {
                $linea_factura['cantidad'] = $linea_factura['cantidad'] + $n[0]['cantidad'];
                $this->db->where(array('facturas_idfacturas' => $linea_factura['facturas_idfacturas'], 'productos_idarticulos' => $linea_factura['productos_idarticulos']));
                unset($linea_factura['facturas_idfacturas']);
                unset($linea_factura['productos_idarticulos']);
                $this->db->update('facturas_has_productos', $linea_factura);
            } else {
                $this->db->insert('facturas_has_productos', $linea_factura);
            }
            $this->db->query('CALL totalfactura(' . $id . ',@totalfact)');
            redirect('/facturas/edit/' . $id, 'refresh');
        }
    }

}