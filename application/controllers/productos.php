<?php
class Productos extends CI_Controller {

	public function index()
	{
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('id','Nombre', 'Descripcion' , 'Stock', 'Precio Unidad', 'Categoria', 'Proveedor','Editar','Borrar');
		$data=$this->db->get('productos')->result_array();
		foreach ($data as &$value){
                             $query = $this->db->get_where('categoria', array('idcategoria' => $value['categoria_idcategoria'])); 
                 
                 if ($query->num_rows() > 0) {
                     $row = $query->row();
                     $value['categoria_idcategoria']=$row->nombre;
                 
                }else{
                    $value['categoria_idcategoria']='';
                    
                }
                $query = $this->db->get_where('proveedores', array('idproveedores' => $value['proveedores_idproveedores'])); 
                 
                 if ($query->num_rows() > 0) {
                     $row = $query->row();
                     $value['proveedores_idproveedores']=$row->nombre;
                 
                }else{
                    $value['proveedores_idproveedores']='';
                    
                }
		$value['editar']=anchor('productos/edit/'.$value['idarticulos'],'editar');
		$value['borrar']=anchor('productos/del/'.$value['idarticulos'],'borrar');
		}
		$data['table']= $this->table->generate($data);
		$data['add']=anchor('productos/add/','nuevo');
		$data['menu']=main_menu();
		$this->load->view('productosgrid',$data);
	}
	
	public function edit($id){
	
		$this->db->where(array('idarticulos'=>$id));
		$producto=$this->db->get('productos');
		$data['producto']=$producto->result();
		$data['menu']=main_menu();
		$this->load->view('productosedit',$data);
	}
	public function save(){
	
		$producto=$this->input->post();
		if ($this->form_validation->run() == FALSE) {
             $data['menu'] = main_menu();
        $this->load->view('productosedit', $data);
            //$this->load->view('myform');
        } else {
		if(empty($producto['idarticulos'])){
		$this->db->insert('productos',$producto);
		echo "nuevo producto correcto";
		redirect('/productos','refresh');
		}
		else{
		$this->db->where('idarticulos', $producto['idarticulos']);
		unset($producto['idarticulos']);
		$this->db->update('productos', $producto); 
		echo "update producto correcto";
		redirect('/productos','refresh');
		}
		}
		
	}
	public function add(){
		$data['menu']=main_menu();
	$this->load->view('productosedit',$data);
	}
	public function del($id){
	$this->db->where(array('idarticulos'=>$id));
	$this->db->delete('productos');
	redirect('/productos','refresh');
	}
	}