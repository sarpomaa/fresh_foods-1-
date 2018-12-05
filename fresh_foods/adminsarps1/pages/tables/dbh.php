
<?php

/**
 * 
 */
class Dbh
{
	
	private $servername;
	private $username;
	private $password;
	private $dbname;

	public function connect()
	{
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "dbfresh";

		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		return $conn;
	}



	function insert_admin($admin_name, $admin_lname, $email,$password, $position, $contact,  $address, $picture,$city)
	{
		
			$sql = ("INSERT INTO admin (admin_fname, admin_lname, admin_email, admin_pass, admin_postion, admin_contact, admin_address, admin_image, admin_city)
			 VALUES ('$admin_name', '$admin_lname', '$email','$password', '$position', '$contact',  '$address', '$picture','$city')");

			$values = $this->connect()-> query($sql);
    		 return $values;
	}


	function insert_prod($title,$category, $price, $destination, $comment)
	{
		
			$sql = ("INSERT INTO products (product_cat, product_title, product_price, product_desc, product_image) 
		    VALUES ('$category', '$title', '$price', '$comment', '$destination')");

			$values = $this->connect()-> query($sql);
    		return $values;	    
		   
   }


   function selectBrandCategory($conn,$sql){
   	$brandCat = array();
   	$query = mysqli_query($conn,$sql);
   	$ray = mysqli_fetch_all($query,MYSQLI_ASSOC);
   	$brandCat[] = $ray;

   	echo json_encode($brandCat);
		}



}