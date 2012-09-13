<?php

class Clientes extends CI_Controller {

    public function index() {
        $this->table->set_empty("&nbsp;");
        $this->table->set_heading('id', 'cif / dni', 'Nombre', 'Apellidos ', 'Empresa', 'Direccion', 'Provincia', 'Cod. Postal', 'Telefono', 'Movil', 'email', 'Editar', 'Borrar');
        $data = $this->db->get('clientes')->result_array();
        foreach ($data as &$value) {
            $value['editar'] = anchor('clientes/edit/' . $value['idclientes'], 'editar');
            $value['borrar'] = anchor('clientes/del/' . $value['idclientes'], 'borrar');
        }
        $data['table'] = $this->table->generate($data);
        $data['add'] = anchor('clientes/add/', 'nuevo');

        $data['menu'] = main_menu();
        $this->load->view('clientesgrid', $data);
    }

    public function edit($id) {

        $this->db->where(array('idclientes' => $id));
        $cliente = $this->db->get('clientes');
        $data['cliente'] = $cliente->result();
        $data['menu'] = main_menu();
        $this->load->view('clientesedit', $data);
    }

    public function save() {
	
        $cliente = $this->input->post();
        if ($this->form_validation->run() == FALSE) {
             $data['menu'] = main_menu();
        $this->load->view('clientesedit', $data);
            //$this->load->view('myform');
        } else {

            if (empty($cliente['idclientes'])) {
                $this->db->insert('clientes', $cliente);
				echo "nuevo cliente correcto";
				redirect('/clientes','refresh');
            } else {
                $this->db->where('idclientes', $cliente['idclientes']);
                unset($cliente['idclientes']);
                $this->db->update('clientes', $cliente);
                echo "update cliente correcto";
				redirect('/clientes','refresh');
                //$this->load->view('formsuccess');
            }
        }
    }

    public function add() {
        $data['menu'] = main_menu();
        $this->load->view('clientesedit', $data);
    }
public function del($id){
	$this->db->where(array('idclientes'=>$id));
	$this->db->delete('clientes');
	redirect('/clientes','refresh');
	}
}

?>