<?php

require_once 'controlador.php';

class Usuarios extends Controlador{
	
		protected $table = 'usuarios';
		private $login;
		private $senha;	
		private $nome;
		private $telefone;
		private $endereco;
			
		public function setLogin($login){
			$this->login = $login;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}
		public function setEndereco($endereco){
			$this->endereco = $endereco;
		}
		
		public function insert(){
		
			$sql = "INSERT INTO $this->table (login, senha, nome, telefone, endereco) values (:login, :senha, :nome, :telefone, :endereco)";
			$stmt = BD::prepare($sql);
			$stmt->bindParam(':login', $this->login);
			$stmt->bindParam(':senha', $this->senha);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':telefone',$this->telefone);
			$stmt->bindParam(':endereco',$this->endereco);
			return $stmt->execute();
		}	
		
		public function update($id){
			$sql = "UPDATE $this->table SET login= :login, senha= :senha, nome= :nome, telefone= :telefone, endereco= :endereco where id=:id ";
			$stmt = BD::prepare($sql);
			$stmt->bindParam(':login', $this->login);
			$stmt->bindParam(':senha', $this->senha);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':telefone',$this->telefone);
			$stmt->bindParam(':endereco',$this->endereco);
			$stmt->bindParam(':id',$id);
			return $stmt->execute();
		
		}
	}	