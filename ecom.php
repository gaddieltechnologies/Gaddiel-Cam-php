<?php

if(!empty($_REQUEST)){
		
		$image = $_REQUEST['image'];
		$latitude = $_REQUEST['Latitude'];
		$longitude = $_REQUEST['Longitude'];
        $category = $_REQUEST['Category'];
		$shop_name = $_REQUEST['Shop_name'];
		$address = $_REQUEST['Address'];
		$location = $_REQUEST['Location'];
        $remarks = $_REQUEST['Remarks'];
		$user = 'admin';
		
		require_once('connection.php');
		
		    $pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO ecom (CREATED_BY,CREATED_DATE,CATEGORY,IMAGE,LATITUDE,LONGITUDE,SHOP_NAME,ADDRESS,LOCATION,REMARKS) VALUES (?,now(),?,?,?,?,?,?,?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($user,$category,$image,$latitude,$longitude,$shop_name,$address,$location,$remarks));
			Database::disconnect();
			echo "Successfully Upload";
                
	}else{
		echo "Error";
	}