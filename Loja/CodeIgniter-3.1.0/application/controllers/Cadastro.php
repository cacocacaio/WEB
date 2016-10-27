<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Cadastro extends CI_Controller{
		
		private $categorias;
		
		public function __construct(){
			
			parent :: __construct();
			$this->load->model('categorias_model', 'modelcategorias');
			$this->categorias=$this->modelcategorias->listar_categorias();
		}
		
		public function index() {
			
			$data_header['categorias'] = $this->categorias;
			$this->load->view('html-header');
			$this->load->view('header', $data_header);
			$this->load->view('novo_cadastro');
			$this->load->view('footer');
			$this->load->view('html-footer');
		}
		
		public function adicionar() {
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nome', 'Nome', 'required|min_length [5]');
			$this->form_validation->set_rules('cpf', 'CPF', 'required|min_length [14]');
			$this->form_validation->set_rules('email', 'E-mail',
			'required|valid_email|is_unique[clientes.email]');
			
			if($this->form_validation->run()==FALSE){
				
				$this->index();
			}else{
				
				$dados['nome'] = $this->input->post('nome');
				$dados['sobrenome'] = $this->input->post('sobrenome');
				$dados['rg'] = $this->input->post('rg');
				$dados['cpf'] = $this->input->post('cpf');
				$dados['data_nascimento'] = dataBR_to_dataMySQL($this->input->post('data_nascimento'));
				$dados['sexo'] = $this->input->post('sexo');
				$dados['cep'] = $this->input->post('cep');
				$dados['rua'] = $this->input->post('rua');
				$dados['bairro'] = $this->input->post('bairro');
				$dados['cidade'] = $this->input->post('cidade');
				$dados['estado'] = $this->input->post('estado');
				$dados['numero'] = $this->input->post('numero');
				$dados['telefone'] = $this->input->post('telefone');
				$dados['celular'] = $this->input->post('celular');
				$dados['email'] = $this->input->post('email');
				$dados['senha'] = $this->input->post('senha');
			
				if( $this->db->insert('clientes', $dados)) {
					
					$this->enviar_email_confirmacao( $dados);
				}else{
					
					echo " Houve um erro ao processar seu cadastro";
				}
			}
		}
		
		public function enviar_email_confirmacao ( $dados ){
			
			$mensagem = $this->load->view ('emails/confirmar_cadastro.php', $dados, TRUE) ;
			$this->load->library('email') ;
			$this->email->from ("EMAILVALIDO@gmail.com", "Confirmação de cadastro");
			$this->email->to($dados['email']);
			$this->email->subject('Lojão do Terceirão-confirmação de cadastro');
			$this->email->message($mensagem);
			
			if($this->email->send()){
				
				$data_header['categorias'] = $this->categorias;
				$this->load->view('html-header');
				$this->load->view('header', $data_header);
				$this->load->view('cadastro_enviado');
				$this->load->view('footer');
				$this->load->view('html-footer');
			}else{
				
				print_r($this->email->print_debugger());
			}
		}
		
		public function confirmar( $hashEmail){
			
			$dados ['status'] = 1;
			$this->db->where('md5(email)', $hashEmail);
			
			if($this->db->update('clientes', $dados)){
				
				$data_header['categorias']=$this->categorias;
				$this->load->view('html-header');
				$this->load->view('header', $data_header);
				$this->load->view('cadastro_liberado');
				$this->load->view('footer');
				$this->load->view('html-footer');
			}else{
				
				echo " Houve um erro ao confirmar seu cadastro";
			}
		}
	}
