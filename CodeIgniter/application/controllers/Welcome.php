<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 
	public function index(){
		//$this->load->view('welcome_message');
		$data['mensagem'] = "Olá mundo!!";
		$this->load->view('ola_mundo', $data);
	}
	*/
	public function index(){
		
		$data['postagens'] = $this->db->get('postagens')->result();
		$this->load->view('postagens', $data);
	}
	
	public function detalhes($id){
		
		$this->db->where('id', $id);
		$data['postagem'] = $this->db->get('postagens')->result();
		$data['postagens'] = $this->db->get('postagens')->result();
		$this->load->view('detalhes_postagem', $data);
	}
	
	public function fale_conosco(){
		
		$this->load->helper('form');
		$this->load->view('fale_conosco');
	}
	
	public function enviar_mensagem (){
	
		$mensagem = "Nome: " . $this->input->post('txt_nome') . br();
		$mensagem .= "E-mail: " . $this->input->post('txt_email') . br();
		$mensagem .= "Mensagem: " . $this->input->post('txt_mensagem') . br();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.live.com';
		$config['smtp_port'] = '587';
		$config['smtp_timeout'] = '30';
		$config['smtp_user'] = 'ccnsassino1998@hotmail.com';
		$config['smtp_pass'] = 'caiaio98.com';
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";
		$config['mailtype'] = 'html';
		$this->load->library('email', $config) ;
		$this->email->from("ccnsassino1998@hotmail.com","Formulário do website") ;
		$this->email->to("ccnsassino1998@hotmail.com");
		$this->email->subject('Assunto do e-mail, enviado pelo CodeIgniter') ;
		$this->email->message($mensagem);
		
		if($this->email->send()){
			
			$this->load->view('sucesso_envia_contato');
		}else{
			
			print_r($this->email->print_debugger());
		}
	}
	
	public function error404(){
		
		$this->load->view('error404');
	}
}
