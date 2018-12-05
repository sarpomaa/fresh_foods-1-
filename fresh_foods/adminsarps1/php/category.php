<?php

include('../pages/tables/dbh.php');

	define("servername", "localhost",TRUE);
	define("database", "dbfresh",TRUE);
	define("username", "root",TRUE);
	define("password", "",TRUE);

	$connection = new Dbh(servername,database,username,password);

	$conn = $connection->connect();
	
	//$brandSelect = "SELECT * FROM brands";
	$catSelect = "SELECT * FROM categories";

	$brand_cat = $connection->selectBrandCategory($conn,$catSelect);
	echo $brand_cat;



?>
