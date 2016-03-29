<?php
$dbh = new PDO("mysql:;dbname=", "", "");

if(!empty($_REQUEST['active_Code'])){
$active_code= $_REQUEST['active_Code'];
$sql = "SELECT REFNO
FROM photo_upload
WHERE  ACTIVE_CODE =  '$active_code'";

$result = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//To output as-is json data result
//header('Content-type: application/json');
//echo json_encode($result);

//Or if you need to edit/manipulate the result before output
$return = array();
foreach ($result as $row){
    $return[]=array('refno'=>$row['REFNO']);
}
$dbh = null;
header('Content-type: application/json');
echo json_encode($return);
	}
	
	if(!empty($_REQUEST['referenceNo'])){
$ref_no= $_REQUEST['referenceNo'];

$sql = "SELECT *
FROM photo_upload
WHERE  REFNO =  '$ref_no'";

$result = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$return = array();
foreach ($result as $row){	
$img=$row['IMAGE'];
header('content-type: image/jpeg');

	echo base64_decode($img);
}

	}
?>
