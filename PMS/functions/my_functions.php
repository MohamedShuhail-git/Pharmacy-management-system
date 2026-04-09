<?php
// include database location
include('./includes/config.php');

// Get Products
function getProducts(){
	global $con;
	$select_query = "SELECT * FROM `products_tb`";
	$run_select_query = mysqli_query($con, $select_query);
	while($row = mysqli_fetch_assoc($run_select_query)) {
	$product_id = $row['product_id'];
	$product_title = $row['product_title'];
	$product_price = $row['product_price'];
	$product_detail = $row['product_detail'];
	$product_image1 = $row['product_image1'];

	echo "
	<div class='col-md-4'>
	  <div class='card h-100 shadow-sm border-0'>
	    <img src='./admin/product_images/$product_image1' class='card-img-top' alt='Product Image'>
	    <div class='card-body'>
	      <h5 class='card-title'>$product_title</h5>
	      <p class='card-text small text-muted'>$product_detail</p>
	      <p class='product-price'>Rs. $product_price</p>
	      <p class='text-muted small'>In Stock: 50</p>
	      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary w-100'>Add to Cart</a>
	      <a href='product.php?product_id=$product_id' class='btn btn-success w-100'>View Details</a>
	    </div>
	  </div>
	</div>";
	}
}


function getBrands(){
	global $con;
	$select_brands="SELECT * FROM `brand_tb`";
	$run_query_select_brands=mysqli_query($con, $select_brands);

	while($row_data=mysqli_fetch_assoc($run_query_select_brands)){
	$brand_id= $row_data['brand_id'];
	$brand_title= $row_data ['brand_title'];
	echo" <li class='list-group-item'>
	    <a href='index.php?brand=$brand_id'class='nav-link text-dark'> $brand_title
	        </a></li>
	   ";
	}
}

function getCat(){
	global $con;
	$select_cat="SELECT * FROM `cat_tb`";
	$run_query_select_cat=mysqli_query($con, $select_cat);

	while($row_data=mysqli_fetch_assoc($run_query_select_cat)){
	$cat_id= $row_data['cat_id'];
	$cat_title= $row_data ['cat_title'];
	echo" <li class='list-group-item'>
	    <a href='index.php?cat=$cat_id'class='nav-link text-dark'> $cat_title
	        </a></li>
	   ";
	}
}

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}

// $user_ip = get_client_ip();
// echo "Your IP address is: " . $user_ip;


// Add to Cart Function
function cart_function(){
if(isset($_GET['add_to_cart'])){
		global $con;
		$user_ip = get_client_ip();
		$get_product_id = $_GET['add_to_cart'];
		$select_query = "SELECT * FROM `cart_details` WHERE ip='$user_ip' AND product_id=$get_product_id";

		$run_query=mysqli_query($con, $select_query);
		$num_of_rows =  mysqli_num_rows($run_query);
		if($num_of_rows>0){
			echo"<script>alert('Item already in cart')</script>";
			echo"<script>window.open('index.php','_self')</script>";
		}
		else{
			$insert_query = "INSERT INTO `cart_details`(`product_id`, `ip`, `qty`) VALUES ($get_product_id,'$user_ip',1)";
			$run_query=mysqli_query($con, $insert_query);
			echo"<script>alert('Item added to cart successfully')</script>";
			echo"<script>window.open('index.php','_self')</script>";
		}
	}
}

function count_cart_items(){
	if(isset($_GET['add_to_cart'])){
		global $con;
		$user_ip = get_client_ip();
		$select_query = "SELECT * FROM `cart_details` WHERE ip='$user_ip'";
		$run_query=mysqli_query($con, $select_query);
		$num_of_rows =  mysqli_num_rows($run_query);
	}
	else{
		global $con;
		$user_ip = get_client_ip();
		$select_query = "SELECT * FROM `cart_details` WHERE ip='$user_ip'";
		$run_query=mysqli_query($con, $select_query);
		$num_of_rows =  mysqli_num_rows($run_query);
	}
	echo $num_of_rows;
}
?>