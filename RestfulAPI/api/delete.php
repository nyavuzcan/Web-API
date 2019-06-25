<?php
header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');
header('Acces-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Acces-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../config/Database.php';


include_once '../models/Post.php';


$database=new database();

$db=$database->connect();

$post=new post($db);


//Get raw posted data;
$data=json_decode(file_get_contents("php://input"));
$post->sira=$data->sira;


	if($post->delete()){
	
	}else {
		echo json_encode(array('message'=>'PostNotDeleted'));
	}
	
?>