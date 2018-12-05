
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



	function insert_prod($admin_name,$email,$password,$picture,$city)
	{
		
			$sql = ("INSERT INTO admin (admin_name, admin_email, admin_pass, admin_image, admin_city)
			 VALUES ('$admin_name','$email','$password','$picture','$city')");

			$values = $this->connect()-> query($sql);
			if ($values) {
				return "yes";
			}else{
				return "failed ".$this->connect()->error;
			}
    		// return $values;	    
	}
}