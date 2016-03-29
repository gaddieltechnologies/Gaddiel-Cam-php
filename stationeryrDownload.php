<?php
header("Access-Control-Allow-Origin: *");
$dbh = new PDO("mysql:;dbname=", "", "");

//$category= $_REQUEST['Category'];
$category= "Stationery";
$sql = "SELECT *
FROM ecom
WHERE  CATEGORY=  '$category'";

$result = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//To output as-is json data result
//header('Content-type: application/json');
//echo json_encode($result);

//Or if you need to edit/manipulate the result before output
$return = array();
foreach ($result as $row){	$return[]=array('image'=>$row['IMAGE'],'lat'=>$row['LATITUDE'],'lng'=>$row['LONGITUDE'],'shopname'=>$row['SHOP_NAME'],'address'=>$row['ADDRESS'],'remarks'=>$row['REMARKS'],'location'=>$row['LOCATION']);
}
$dbh = null;
header('Content-type: application/json');
echo json_encode($return);
	
	
	
	?>
	
