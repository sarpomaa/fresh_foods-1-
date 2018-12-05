<?php

include('../tables/dbh.php');


//if ($_SERVER["REQUEST_METHOD"]=="POST")
//{
//	inspectinsert();
//}


if (isset($_POST['name']))
{
	inspectAdmininsert();
}
elseif (isset($_POST['title'])){
    inspectProductinsert();
}

function inspectAdmininsert()
{

            $admin_name=$_POST['name'];
            $admin_lname=$_POST['lname'];
			$email=$_POST['email'];
			$password=$_POST['pass'];
            $position=$_POST['position'];
            $contact=$_POST['contact'];
            $address=$_POST['address'];
			$picture=$_FILES['picture'];
			$city=$_POST['city'];
			$destination = $_POST['description'];

            $imageName = $_FILES['picture']['name'];
            $imageTempName = $_FILES['picture']['tmp_name'];
            $imageSize = $_FILES['picture']['size'];
            $imageError = $_FILES['picture']['error'];
            $imageType = $_FILES['picture']['type'];


            $target_dir = "../../images/";
            $target_file = $target_dir . basename($_FILES["picture"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["picture"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                }
                else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["picture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    insertnewadmin($admin_name, $admin_lname, $email,$password, $position, $contact,  $address, $picture,$city);


            // $image_ex = explode('.', $imageName);
            // $Actual_image_ex = strtolower(end($image_ex));
            // //$destination = $imageName;
            // $format = array('jpg', 'jpeg', 'png');

            // if (in_array($Actual_image_ex, $format))
            // {
            //     if ($imageError === 0)
            //     {
            //         if ($imageSize < 100000000000)
            //         {
            //             $perm_name = uniqid('', true).".".$Actual_image_ex;
            //             $destination = '../../images/'.$perm_name;
            //             move_uploaded_file($imageTempName, $destination);

            //             //now insert
            //             insertnewadmin($admin_name, $admin_lname, $email,$password, $position, $contact,  $address, $destination,$city);

            //         }
            //         else
            //         {
            //             echo 'Image size is too large.'.  $imageSize;
            //         }
            //     }
            //     else
            //     {
            //         echo "An error occurred, please try again.";
            //     }
            // }
            // else
            // {
            //     echo "Image type must be jpg, jpeg or png";
            // }
}





function inspectProductinsert()
{

            $title=$_POST['title'];
			$category=$_POST['category'];
			$price=$_POST['price'];
			$picture=$_FILES['picture'];
			$comment = $_POST['comment'];

            $imageName = $_FILES['picture']['name'];
            $imageTempName = $_FILES['picture']['tmp_name'];
            $imageSize = $_FILES['picture']['size'];
            $imageError = $_FILES['picture']['error'];
            $imageType = $_FILES['picture']['type'];

            $image_ex = explode('.', $imageName);
            $Actual_image_ex = strtolower(end($image_ex));
            //$destination = $imageName;
            $format = array('jpg', 'jpeg', 'png');

            if (in_array($Actual_image_ex, $format))
            {
                if ($imageError === 0)
                {
                    if ($imageSize < 100000000000)
                    {
                        $perm_name = uniqid('', true).".".$Actual_image_ex;

                        $destination = '../../../images/'.$imageName;

                        //$destination = '../../images/'.$perm_name;
                        move_uploaded_file($imageTempName, $destination);

                        //now insert
                        insertnewproduct($title,$category,$price,$destination,$comment);

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

function insertnewproduct($title,$category,$price,$destination,$comment)
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
    $connecti = $someth->insert_prod($title,$category, $price, $destination, $comment);
// echo "connecti destination: " . $connecti;
    if(!($connecti)){
        echo "<p style='padding: 10px; background: orangered; color: white; font-weight: bolder; text-shadow: none;'>Oops! Your entry was bounced! </p>". $someth->error;
    }
    else{
        echo "<p style='padding: 10px; background: green; color: white; font-weight: bolder; text-shadow: none;'>Your product has been included in our store!</p>";
    }

}

function insertnewadmin($admin_name, $admin_lname, $email, $password, $position, $contact,  $address, $picture, $city)
{

    $some = new Dbh;
    $connec = $some->connect();

    if(!($connec)) {
        echo "Try again.";
    }
    else {
    }

    $someth = new Dbh;
    $connecti = $someth->insert_admin($admin_name, $admin_lname, $email, $password, $position, $contact,  $address, $picture, $city);

    if(!($connecti)){
        echo "<p style='padding: 10px; background: orangered; color: white; font-weight: bolder; text-shadow: none;'>Oops! Your entry was bounced! </p>". $someth->error;
    }
    else{
        echo "<p style='padding: 10px; background: green; color: white; font-weight: bolder; text-shadow: none;'>Your Entry has been included in our system!</p>";
    }

}


function insertnewprod($category, $title, $price, $desc, $destination, $keyword)
{

$some1 = new Dbh;
$connec1 = $some1->connect();

	if(!($connec1)) {
		echo "Try again.";
	}
	else {
		//echo "Connection made";
	}

    $someth1 = new Dbh;
    $connecti1 = $someth1->insert_prod($category, $title, $price, $desc, $destination, $keyword);
	if(!($connecti1)){
		echo "Oops! Your entry was bounced! ". $someth1->error;
	}
	else{
		echo "New records created successfully <br><br>";
        echo "Your product has been included in our store!<br><br>";
	}

}
