﻿
<?php
 require_once 'BD.php';

 
 abstract class Controlador extends BD{
 
 
		protected $table;
		
		abstract public function insert();
		abstract public function update($id);
		
		
		public function find($id){
			$sql = " SELECT * FROM $this->table where id= :id";
			$stmt = BD::prepare($sql);
			$stmt->bindParam(':id',$id, PDO::PARAM_INT); //paramentro inteiro
			$stmt->execute();
			return $stmt->fetch();
		
		}
		
		
		public function findAll(){
		
			$sql = "SELECT * FROM  $this->table";
			$stmt = BD::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		
		}
		
		public function delete($id){
			
			$sql = "DELETE FROM $this->table where id=:id";
			$stmt = BD::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute();
			
		
		}
		
	}