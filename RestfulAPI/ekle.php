<?php

?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<title>Ekle</title>
</head>
<body>
Adı:<input id="adi" class="form-control"  style="width: 30%" type="text" name="adi"><br><br>
Yazarı:<input id="yazari" class="form-control" style="width: 30%" type="text" name="yazari">
<button type="button" class="btn btn-primary" onclick="gonder()">Ekle</button>
<button type="button" class="btn btn-danger" onclick="window.location = 'http://localhost/son'">Vazgeç</button>

</body>
</html>

<script type="text/javascript">
	function gonder(){
	 var adi=document.getElementById("adi").value;
	var yazari=document.getElementById("yazari").value;




var objx = {"adi":adi, "yazari":yazari };

var myJSON = JSON.stringify(objx);

var xhr = new XMLHttpRequest();
var url = "api/create.php";
xhr.open("POST", url, true);
xhr.setRequestHeader("Content-Type", "application/json");


xhr.send(myJSON);
window.location = 'http://localhost/son';
}
</script>