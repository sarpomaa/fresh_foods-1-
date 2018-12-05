<?php

include('dbh.php');


if ($_SERVER["REQUEST_METHOD"]=="POST")
{
	inspectinsert();
}

function inspectinsert()
{


			$admin_name=$_POST['name'];
			$email=$_POST['email'];
			$password=$_POST['pass'];
			$picture=$_POST['picture'];
			$city=$_POST['city'];
			//$destination = "";
			//if(isset($_POST['submit'])) {
				$imageName = $_FILES['picture']['name'];
			 	$imageTempName = $_FILES['picture']['tmp_name'];
			 	$imageSize = $_FILES['picture']['size'];
			 	$imageError = $_FILES['picture']['error'];
			 	$imageType = $_FILES['picture']['type'];

			 	$image_ex = explode('.', $imageName);
			 	$Actual_image_ex = strtolower(end($image_ex));
			 	//$destination = $imageName;
			 	$format = array('jpg', 'jpeg', 'png');
			 	//echo "This is a nigga16";
			 	if (in_array($Actual_image_ex, $format)) 
			 	{
			 		//echo "This is a nigga1";
			 		if ($imageError === 0) 
			 		{
			 			//echo "This is a nigga2";
			 			if ($imageSize < 100000000000) 
			 			{
			 				//echo "This is a nigga";
			 				$perm_name = uniqid('', true).".".$Actual_image_ex;
			 				$destination = 'Images/'.$perm_name;
			 				//echo "This is a nigga";
			 				move_uploaded_file($imageTempName, $destination);
			 				//header("Location: homepage1.php?uploadsuccess");

			 				//now insert
			 				insertnewprod($admin_name,$email,$password,$picture,$city);

			 			} 
			 			else 
			 			{
			 				echo 'Image size is too large.'.  $imageSize;
			 			}
			 		} 
			 		else 
			 		{
			 			echo "An error occurred, please try again.";
			 		}
			 	} 
			 	else 
			 	{
			 		echo "Image type must be jpg, jpeg or png";
			 	}

}

function insertnewprod($admin_name,$email,$password,$picture,$city)
{

$some = new Dbh;
$connec = $some->connect();

	if(!($connec)) {
		echo "Try again.";
	}
	else {
		//echo "Connection made";
	}

$someth = new Dbh;
$connecti = $someth->insert_prod($admin_name,$email,$password,$picture,$city);
// echo "connecti destination: " . $connecti;
	if(!($connecti)){
		echo "Oops! Your entry was bounced! ". $someth->error;
	}
	else{
		echo "New records created successfully <br><br>";
        echo "Your product has been included in our store!<br><br>";
	}

} 

echo inspectinsert();