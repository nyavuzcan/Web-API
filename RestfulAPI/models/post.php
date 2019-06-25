<?php

	class post {
		private $conn;
		private $table='kitaplar';
		public $sira;
		public $adi;
		public $yazari;
		public $db;


	    function __construct($db){
				$this->conn=$db;
			}




			
			
		public function read(){
				$query="SELECT * FROM kitaplar";
			$stmt=$this->conn->prepare($query);
			$stmt->execute();

		


				return $stmt;
		}

			public function read_single(){
	$query="SELECT * FROM kitaplar WHERE sira=?";
			$stmt=$this->conn->prepare($query);
			//Bind Id
			$stmt->bindParam(1,$this->sira);
			$stmt->execute();

			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			//set propreties

			$this->sira=$row['sira'];
			$this->adi=$row['adi'];
			$this->yazari=$row['yazari'];

			}

	public function create(){

		//Create query

		$query="INSERT INTO kitaplar SET adi=:adi, yazari=:yazari";
	


$stmt=$this->conn->prepare($query);
		
		 $stmt->bindParam(':adi',$this->adi);
		 $stmt->bindParam(':yazari',$this->yazari);
if($stmt->execute()) return true;
return false;
		



	}


	public function update(){

		//update query

		$query="UPDATE kitaplar SET adi=:adi, yazari=:yazari where sira=:sira";
	


$stmt=$this->conn->prepare($query);
		$stmt->bindParam(':sira',$this->sira);
		 $stmt->bindParam(':adi',$this->adi);
		 $stmt->bindParam(':yazari',$this->yazari);
if($stmt->execute()) return true;
return false;
		



	}


	//Delete

	public function delete(){

		$query="DELETE FROM kitaplar WHERE sira=?";
	$stmt=$this->conn->prepare($query);	
	$stmt->bindParam(1,$this->sira); //1.parametre şeklinde
if($stmt->execute()) return true;
return false;


	}
}
	
	
?>