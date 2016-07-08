<?php
	class Cliente{
		
		private $nome;
		private $email;
		private $dataCad;
		
		public function __construct($nome, $email, $dataCad){
			
			$this->setNome($nome);
			$this->setEmail($email);
			$this->setDataCad($dataCad);
		}
		
		public function getNome() {
			
			return $this->nome;
		}
		
		public function setNome($nome){
			
			$this->nome = $nome;
		}
		
		public function getEmail(){
			
			return $this->email;
		}
		
		public function setEmail($email){
			
			$this->email = $email;
		}
		
		public function getDataCad(){
			
			return $this->dataCad;
		}
		
		public function setDataCad($dataCad){
			
			$data = explode('/', $dataCad);
			$this->dataCad = "$data[2]-$data[1]-$data[0]";
		}
		
	}
?>
