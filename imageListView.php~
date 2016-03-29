<?php
$dbh = new PDO("mysql:;dbname=", "", "");
	if(!empty($_REQUEST)){
$ref_no= $_REQUEST['referenceNo'];
$sql = "SELECT *
FROM photo_upload
WHERE  REFNO =  '$ref_no'";

$result = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//To output as-is json data result
//header('Content-type: application/json');
//echo json_encode($result);

//Or if you need to edit/manipulate the result before output
$return = array();
foreach ($result as $row){	$return[]=array('image'=>$row['IMAGE'],'lat'=>$row['LATITUDE'],'lng'=>$row['LONGITUDE'],'desc'=>$row['DESCRIPTION']);
}
$dbh = null;
header('Content-type: application/json');
echo json_encode($return);
	}
?>
