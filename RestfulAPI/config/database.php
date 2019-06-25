<?php

	class database{
private $host='localhost';

private $db_name='newdb';

private $username='root';

private $password= 'nevzat1234';

private $conn;
		
		public function connect(){

			$this->conn=null;

			try{
			$this->conn= new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);

			

			}  catch(PDOException $e){
				echo $e->getMessage();
			}



					return $this->conn;
		}



	}

	
?>