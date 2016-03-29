<?php
$dbh = new PDO("mysql:;dbname=", "", "");

$active_code= $_REQUEST['active_Code'];

$sql = "SELECT ACTIVE_CODE
FROM users
WHERE  ACTIVE_CODE =  '$active_code'";

$result = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//To output as-is json data result
//header('Content-type: application/json');
//echo json_encode($result);

//Or if you need to edit/manipulate the result before output
$return = array();
foreach ($result as $row){
    $return[]=array('activate_code'=>$row['ACTIVE_CODE']);
}
$dbh = null;
header('Content-type: application/json');
echo json_encode($return);
	
?>
