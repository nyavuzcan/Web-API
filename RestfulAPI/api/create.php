<?php
header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');
header('Acces-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Acces-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../config/Database.php';


include_once '../models/Post.php';


$database=new database();

$db=$database->connect();

$post=new post($db);


//Get raw posted data;

$data=json_decode(file_get_contents("php://input"));

$post->adi=$data->adi;
$post->yazari=$data->yazari;
	
	if($post->create()){
		echo json_encode(
			array('message'=>'PostCreated')
	);
	}else {
		echo json_encode(array('message'=>'PostNotCreated'));
	}
	
?>