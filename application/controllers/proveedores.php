<?php
class Proveedores extends CI_Controller {

	public function index()
	{
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('id','cif / dni','Nombre', 'Apellidos ' , 'Empresa', 'Direccion', 'Provincia', 'Cod. Postal','Telefono', 'Movil','email','Editar','Borrar');
		$data=$this->db->get('proveedores')->result_array();
		foreach ($data as &$value){
           
		$value['editar']=anchor('proveedores/edit/'.$value['idproveedores'],'editar');
		$value['borrar']=anchor('proveedores/del/'.$value['idproveedores'],'borrar');
		}
		$data['table']= $this->table->generate($data);
		$data['add']=anchor('proveedores/add/','nuevo');
		$data['menu']=main_menu();
		$this->load->view('proveedoresgrid',$data);
	}
	
	public function edit($id){
	
		$this->db->where(array('idproveedores'=>$id));
		$proveedor=$this->db->get('proveedores');
		$data['proveedor']=$proveedor->result();
		$data['menu']=main_menu();
		$this->load->view('proveedoresedit',$data);
	}
	public function save(){
	
		$proveedor=$this->input->post();
		if ($this->form_validation->run() == FALSE) {
             $data['menu'] = main_menu();
        $this->load->view('proveedoresedit', $data);
            //$this->load->view('myform');
        } else {
		if(empty($proveedor['idproveedores'])){
		$this->db->insert('proveedores',$proveedor);
		echo "nuevo proveedor correcto";
		redirect('/proveedores','refresh');
		}
		else{
		$this->db->where('idproveedores', $proveedor['idproveedores']);
		unset($proveedor['idproveedores']);
		$this->db->update('proveedores', $proveedor); 
		echo "update proveedor correcto";
		redirect('/proveedores','refresh');
		}
		}
		
	}
	public function add(){
		$data['menu']=main_menu();
	$this->load->view('proveedoresedit',$data);
	}
	public function del($id){
	$this->db->where(array('idproveedores'=>$id));
	$this->db->delete('proveedores');
	redirect('/proveedores','refresh');
	}
	}