<?php
	class Cliente{
		private $nome;
		private $dataCad;
		private $email;
		
		public function __construct($nome, $dataCad, $email){
			$this->setNome($nome);
			$this->setDataCad($dataCad);
			$this->setEmail($email);
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getDataCad(){
			return $this->dataCad;
		}
		public function setDataCad($dataCad){
			$data = explode('/',$dataCad);
			$this->dataCad = $data[2]-$data[1]-$data[0];
		}
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		
		
	}
?>
