<?php

$con = mysqli_connect("localhost","root","","dbfresh");

if (mysqli_connect_errno())
{
	echo "Failed to connect to the database: " . mysqli_connect_error();
}

//getting the catagories

function getCategories(){

	global $con;

	$get_cats = "select * from categories";

	$run_cats = mysqli_query($con, $get_cats);

	while ($row_cats = mysqli_fetch_array($run_cats)){

	$cat_id = $row_cats['cat_id'];
	$cat_title = $row_cats['cat_name'];

	echo "<li><a href='#'>$cat_title</a></li>";

	}
}

function getProduct()
{
	global $con;
	$get_product = "select * from products order by RAND() LIMIT 0, 6";

	// $get_product = "select * from products";
	$run_product = mysqli_query($con, $get_product);

	while($row_product = mysqli_fetch_array($run_product))
	{
		$product_id = $row_product['product_id'];
		$product_cat = $row_product['product_cat'];
		$product_title = $row_product['product_title'];
		$product_price = $row_product['product_price'];
		$product_desc = $row_product['product_desc'];
		$product_image = $row_product['product_image'];
		
		echo " <div class='col-sm-6 col-lg-4 mb-4' data-aos='fade-up'>
                <div class='block-4 text-center border'>
                  <figure class='block-4-image'>
                    <a href='shop-single.html'><img src='images/product_images/$product_image' alt='Image placeholder' class='img-fluid'></a>
                  </figure>
                  <div class='block-4-text p-4'>
                    <h3><a href='shop-single.html'>$product_title</a></h3>
                    <p class='mb-0'>$product_desc</p>
                    <p class='text-primary font-weight-bold'>GHC $product_price</p>
                  </div>
                </div>
              </div>
			 ";

			 
	}
}

?>