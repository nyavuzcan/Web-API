<!doctype html>
<html>
<head>
    <meta charset="utf-8">
   
    <title>Kitaplık</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


</head>
<body>
    <div ng-app="myApp" ng-controller="controller">
        <div class="container">
            <br/>
            <h1 align="center">Kitaplık</h1>
            <img src="img/kitap.jpg" width="20%" height="30%" style="margin-left: 40%">
            <h3 align="center">Kitaplar</a></h3>
           
            <br/>
            <div class="row">
                <div class="col-sm-2 pull-left">
                    <label>Kaç Adet Listelensin:</label>
                    <select ng-model="data_limit" class="form-control">
                        <option>10</option>
                        <option>20</option>
                        <option>50</option>
                        <option>100</option>
                        <option>200</option>
                    </select>
                </div>
                <div class="col-sm-6 pull-right">
                    <label>Ara:</label>
                    <input type="text" ng-model="search" ng-change="filter()" placeholder="Kitap veya Yazar Ara" class="form-control" />
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-12" ng-show="filter_data > 0">
                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                            <th>Sırası&nbsp;<a ng-click="sort_with('sirasi');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Kitap Adı&nbsp;<a ng-click="sort_with('kitapadi');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Yazarı&nbsp;<a ng-click="sort_with('yazari');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>İşlemler&nbsp;</th>
                            
                        </thead>
                        <tbody>
                            <tr ng-repeat="data in searched = (file | filter:search | orderBy : base :reverse) | beginning_data:(current_grid-1)*data_limit | limitTo:data_limit">
                                <td>{{data.sirasi}}</td>
                              <td>{{data.kitapadi}}</td>
                                 <td>{{data.yazari}}</td>  </td> 

 <td><form method="POST" action="duzenle.php"><input style="visibility: hidden; float: left " id="form2" type="JSON" name="sira" value="{{data.sirasi}}"> <button class="btn btn-success"  type="submit">Düzenle</button> </form>&nbsp;&nbsp;&nbsp;  <form method="POST" action="index.php"><input style="visibility: hidden; float: left " id="form" type="JSON" name="sira" value="{{data.sirasi}}"> <button class="btn btn-danger"  type="submit">Sil</button> </form>
    <button style="margin-left: 27%; margin-top: 5px" class="btn btn-primary" onclick="window.location = 'http://localhost/son/ekle.php'"  type="submit">Ekle</button>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12" ng-show="filter_data == 0">
                    <div class="col-md-12">
                        <h4>Kitap Bulunamadı</h4>
                    </div>
                </div>
                <div class="col-md-12">
                    
                    <div class="col-md-6" ng-show="filter_data > 0">
                        <div pagination="" page="current_grid" on-select-page="page_position(page)" boundary-links="true" total-items="filter_data" items-per-page="data_limit" class="pagination-small pull-right" previous-text="&laquo;" next-text="&raquo;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.12/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.10.0/ui-bootstrap-tpls.min.js"></script>
    <script src="myapp.js"></script>

<?php

   if( $sira       =$_POST['sira']){
   

 
$url = 'http://localhost/son/api/delete.php';
 
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
$result = curl_exec($ch);

}
?>

</body>
</html>