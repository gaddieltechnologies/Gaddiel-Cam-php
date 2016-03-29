<?php

if(!empty($_REQUEST)){
		
		$active_code = $_REQUEST['active_code'];
               $id= $_REQUEST['id'];
		$image = $_REQUEST['image'];
		$latitude = $_REQUEST['Latitude'];
		$longitude = $_REQUEST['Longitude'];
                $shortDescription = $_REQUEST['ShortDescription'];
		$description = $_REQUEST['Description'];
                $refno = $_REQUEST['RefNo'];
		$user = 'admin';
		
		require_once('connection.php');
		
		    $pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO photo_upload (CREATED_BY,CREATED_DATE,ACTIVE_CODE,IMAGE,LATITUDE,LONGITUDE,SHORT_DESCRIPTION,DESCRIPTION,REFNO) VALUES (?,now(),?,?,?,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($user,$active_code,$image,$latitude,$longitude,$shortDescription,$description,$refno));
			Database::disconnect();
			echo $id;
                
	}else{
		echo "Error";
	}