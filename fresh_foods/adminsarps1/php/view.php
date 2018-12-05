<?php

class Display {

	public function ViewCustomers() {
	// to display the goods that are in the cart of a client with a particular customer id

	$ip_add= $_SERVER['SERVER_ADDR'];
	$con = mysqli_connect("localhost","root","","dbfresh");
	
	$sql= "SELECT `customer_id`, `customer_fname`, `customer_lname`, customer_email,customer_contact, customer_address,customer_city,customer_image from customer";

	$result= mysqli_query($con,$sql) or die($con->error);

	while($row = $result->fetch_assoc()):
		$array[] = array("customer_id"=>$row['customer_id'],
			"customer_fname"=>$row['customer_fname'],
			"customer_lname"=>$row['customer_lname'],
			"customer_email"=>$row['customer_email'],
			"customer_contact"=> $row['customer_contact'],
			"customer_address" => $row['customer_address'],
			"customer_city" => $row['customer_city'],
			"customer_image"=>$row['customer_image']
		);
	endwhile;
	echo json_encode($array); 
	}
}

$array1 = new Display;
$array1->ViewCustomers();



?>