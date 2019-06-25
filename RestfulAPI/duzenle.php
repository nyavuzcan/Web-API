<?php
 if( $sira       =$_POST['sira']){


	 		$url = 'http://localhost/son/api/read_single.php';
 
//Initiate cURL.
$ch = curl_init($url);
 
//The JSON data.
$jsonData = array(
   'sira'=>$sira
);
 
//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);
 
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
 
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
 
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
 
//Execute the request
?> 
<!DOCTYPE html>
<html>
<head>
	    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<title>Duzenle</title>
</head>
<body>
<div style="visibility: hidden;" id="dv"><?php curl_exec($ch);?></div>

Adı:<input id="adi" class="form-control"  style="width: 30%" type="text" name="adi"><br><br>
Yazarı:<input id="yazari" class="form-control" style="width: 30%" type="text" name="yazari">
<button type="button" class="btn btn-success" onclick="gonder()">Kaydet</button>
<button type="button" class="btn btn-danger" onclick="window.location = 'http://localhost/son'">Vazgeç</button>


</body>
</html>

<script type="text/javascript">
	var json=document.getElementById("dv").innerHTML;
	
	var obj = JSON.parse(json);
	document.getElementById("adi").value=obj.adi;
	document.getElementById("yazari").value=obj.yazari;


</script>
<script type="text/javascript">
	function gonder(){
	 var adi=document.getElementById("adi").value;
	var yazari=document.getElementById("yazari").value;
	var json=document.getElementById("dv").innerHTML;
	
 var obj2 = JSON.parse(json);

var sira=obj.sira;



var objx = { "sira":sira, "adi":adi, "yazari":yazari };

var myJSON = JSON.stringify(objx);

var xhr = new XMLHttpRequest();
var url = "api/update.php";
xhr.open("POST", url, true);
xhr.setRequestHeader("Content-Type", "application/json");


xhr.send(myJSON);
window.location = 'http://localhost/son';
}
</script>

<?php 

 
}
?>