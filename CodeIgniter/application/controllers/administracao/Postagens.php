<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Postagens extends CI_Controller{
		
		public function __construct(){
			
			parent::__construct();
			
			$this->load->library('session');
			if (!$this->session->userdata('logado')){
				
				redirect("administracao/login");
			}
		}
		
		public function index(){
			
			$this->load->helper('form');
			$this->load->view('administracao/nova_postagem');
		}
	
		public function adicionar(){
			
			$data['titulo']=$this->input->post('txt_titulo') ;
			$data ['texto']=$this->input->post('txt_texto');
			if($this->db->insert('postagens',$data)){
				
				redirect(base_url('administracao/postagens'));
			}else{
				
				echo "Não foi possível gravar a postagem no banco de dados";
			}
		}
}
