<?php


class config{

	public $pdo ;
	
			
	public function db(){
		$this->pdo = new PDO('mysql:host=localhost:3307;dbname=studentportal;charset=utf8mb4','root','');
		return $this->pdo;
	}

}



?>