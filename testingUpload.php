<!DOCTYPE html>
<html>
  <head>
    <title>How to Upload multiple images jQuery Ajax using PHP | PGPGang.com</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>
    <link href="css/uploadfilemulti.css" rel="stylesheet">
<script src="js/jquery-1.8.0.min.js"></script>
<script src="js/jquery.fileuploadmulti.min.js"></script>
  </head>
  <body>
<form action="testingUpload.php" method="POST" enctype="multipart/form-data">
    <label>File: </label><input type="file" name="image" />
    <input type="submit" name="upload" />
<?php
$output_dir = "uploads/";
require_once('connection.php');
if(isset($_POST['upload']))
{ if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { 
	$imagename="coffeeShop";
	$imagedetails="Perlacaffe";
	$lat="10.767525";
	$lng="78.683591";
	 $image = fopen($_FILES['image']['tmp_name'], 'rb');
       $content = fread($image , $_FILES['image']['size']);
	$user = 'admin';
	$refno="32145689465";
    $active_code="101";
		
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO photo_upload (CREATED_BY,CREATED_DATE,ACTIVE_CODE,IMAGE,LATITUDE,LONGITUDE,SHORT_DESCRIPTION,DESCRIPTION,REFNO) VALUES (?,now(),?,?,?,?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(1, $user);
		$stmt->bindParam(2, $active_code, PDO::PARAM_INT);
        $stmt->bindParam(3, $content , PDO::PARAM_LOB);
        $stmt->bindParam(4, $lat, PDO::PARAM_STR);
        $stmt->bindParam(5, $lng,  PDO::PARAM_STR);
        $stmt->bindParam(6, $imagename);
        $stmt->bindParam(7, $imagedetails);
        $stmt->bindParam(8, $refno,  PDO::PARAM_INT);
		$stmt->execute();
		Database::disconnect();
}
}


	?>		 

</form>
</body>
</html>