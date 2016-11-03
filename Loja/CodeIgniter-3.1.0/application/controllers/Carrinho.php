<?php defined('BASEPATH')OR exit('No direct script access allowed');

	class Carrinho extends CI_Controller {
		
		private $categorias;
		public function __construct(){
			
			parent :: __construct();
			$this->load->model('categorias_model', 'modelcategorias');
			$this->categorias = $this->modelcategorias->listar_categorias();
		}
		
		public function index(){
			
			$data_header['categorias'] = $this->categorias;
			$this->load->view('html - header');
			$this->load->view('header', $data_header);
			$this->load->view('carrinho');
			$this->load->view('footer');
			$this->load->view('html - footer');
		}
		
		public function adicionar(){
			
			$data = array('id'= > $this->input->post('id'),
			'qty'= > $this->input->post('quantidade'),
			'price'= > $this->input->post('preco'),
			'name'= > $this->input->post('nome'),
			'altura'= > $this->input->post('altura'),
			'largura'= > $this->input->post('largura'),
			'comprimento'= > $this->input->post('comprimento'),
			'peso'= > $this->input->post('peso'),
			'options'= > null ,
			'url'= > $this->input->post('url'),
			'foto'= > $this->input->post('foto'));
			$this->cart->insert($data);
			redirect(base_url(" carrinho"));
		}
		
		public function atualizar(){
			
			foreach ($this->input->post() as $item){
				
				if (isset($item['rowid'])){
					
					$data = array('rowid'=>$item['rowid'], 'qty'=>$item['qty']);
					$this->cart->update($data);
				}
			}
			redirect(base_url('carrinho'));
		}
		
		public function remover($rowid){
			
			$data = array('rowid'=>$rowid, 'qty'=>0);
			$this->cart->update($data);
			redirect(base_url('carrinho'));
		}
	}
