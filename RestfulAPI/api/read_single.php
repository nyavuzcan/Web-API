<?php
header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');

include_once '../config/Database.php';


include_once '../models/Post.php';


$database=new database();

$db=$database->connect();

$post=new post($db);

//Get ID
//iset ile tanımlı mı ona bakıyoruz sira
$data=json_decode(file_get_contents("php://input"));
//Get post
$post->sira=$data->sira;
$post->read_single();


$post_arr=array(
	'sira'=>$post->sira,
	'adi'=>$post->adi,
	'yazari'=>$post->yazari

);


//json

echo json_encode($post_arr);

?>