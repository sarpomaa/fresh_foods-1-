<?php
 $host= "localhost";
$username = "root";
$password = "";
$database = "dbfresh";

//Database connection:


$connection = mysqli_connect ($host, $username , $password , $database );


 //Inserting records

 $insertQuery= mysqli_query ($connection,
"INSERT INTO products (product_id,product_cat, product_title,product_price,product_desc) 
							VALUES('1','Veggies','Tomatoes','750','fresh')"

 //check if insertion worked

if 
 ($insertQuery== TRUE ){
    
echo "Item inserted successfully"
 ;
}
else
{
    
echo "Item insertion failed :"
mysqli_error
( $connection\cf0 );
}