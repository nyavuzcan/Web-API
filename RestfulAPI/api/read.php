<?php
header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');

include_once '../config/Database.php';


include_once '../models/Post.php';


$database=new database();

$db=$database->connect();

$post=new post($db);

$result=$post->read();

$num=$result->rowCount();

if($num>0){

$posts_arr=array();
	
	while ($row=$result->fetch(PDO::FETCH_ASSOC)) {

		extract($row); //dizi anahtarları bu sayede değişkenmiş gibi davranarak aşağıdaki gibi erişebiliyoruz.

		$post_item=array(
		'sirasi'=>$sira, //$ olan veritabanındann gelen
		'kitapadi'=>$adi,
		'yazari'=>$yazari		

		);
		//Pushto 'data' array
		
		array_push($posts_arr,$post_item);// array içinde array ekledik

//echo $posts_arr['data'][0]['Sirasi']; Tekil Erişim
	}

	//Turn to Json
	echo json_encode($posts_arr);


}else{
//kitap yok
}
?>