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
	 */
	public function index(){
		
		$this->load->view('index');
	}
	
	public function cadastrar(){
		
		$this->load->helper('form');
		$this->load->view('cadastrar');
	}
	
	public function listar(){
			
		$data['citacoes'] = $this->db->get('citacoes')->result();
		$this->load->view('listar', $data);
	}
	
	public function consultar(){
		
		$this->load->view('consultar');
	}
	
	public function cadastrar_registro(){
		
		$data['nomeArquivo'] = $this->input->post('txt_nome_arquivo');
		$data['titulo'] = $this->input->post('txt_titulo');
		$data['autores'] = $this->input->post('txt_autores');
		$data['citacoes'] = $this->input->post('txt_citacoes');
		$data['palavrasChave'] = $this->input->post('txt_palavras_chave');
		$data['referencias'] = $this->input->post('txt_referencias');
		
		if($this->db->insert('citacoes', $data)){
			
			redirect(base_url());
		}else{
			
			echo "<script type='text/Javascript'> alert('Erro de conexão com o banco de dados!')</script>";
			redirect(base_url('cadastrar'));
		}
	}
}
