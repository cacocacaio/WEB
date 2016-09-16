<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller{
		
		public function __construct () {
			
			parent::__construct();
			$this->load->library('session');
		}
		
		public function index(){
			
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->view('administracao/login');
		}
		
		public function efetuar_login() {
			
			$this->load->library('session');
			$usuario = $this->input->post('txt_usuario');
			$senha = $this->input->post('txt_senha') ;
			if($usuario == "administrador" && $senha == "12345"){
				
				$array = array("logado"=>TRUE);
				$this->session->set_userdata($array);
				redirect("administracao/postagens");
			}else{
				
				$this->session->sess_destroy();
				redirect("administracao/login");
			}
		}
		
		public function logout(){
			$this->load->library('session');
			$this->session->sess_destroy();
			redirect("administracao/login");
		}
	}
