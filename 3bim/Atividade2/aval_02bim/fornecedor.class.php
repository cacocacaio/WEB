<?php
	class Fornecedor{
		
		private $nome;
		private $email;
		private $dataFun;
		
		public function __construct($nome, $email, $dataFun){
			
			$this->setNome($nome);
			$this->setEmail($email);
			$this->setDataFun($dataFun);
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
		
		public function getDataFun(){
			
			return $this->dataFun;
		}
		
		public function setDataFun($dataFun){
			
			$data = explode('/', $dataFun);
			$this->dataFun = "$data[2]-$data[1]-$data[0]";
		}
	}
?>
