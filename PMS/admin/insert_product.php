<?php
include('../includes/config.php');

if(isset($_POST['insert_product_btn'])){
	$product_title = $_POST['product_title'];
	$product_price = $_POST['product_price'];
	$product_detail = $_POST['product_detail'];
	$product_cat = $_POST['product_cat'];
	$product_brand = $_POST['product_brand'];

	//Accessing Images
	$product_image1 = $_FILES['product_image_1']['name'];
	$product_image2 = $_FILES['product_image_2']['name'];

	//Tmp Name
	$tmp_product_image1 = $_FILES['product_image_1']['tmp_name'];
	$tmp_product_image2 = $_FILES['product_image_2']['tmp_name'];

	// Check for empty conditions
	if($product_title=="" or $product_price=="" or $product_detail=="" or $product_cat=="" or $product_brand=="" or  $product_image1=="" or $product_image2==""){
		echo "<script>alert('Please fill all the fields')</script>";
		exit();
	}
	else{
		move_uploaded_file($tmp_product_image1,"./product_images/$product_image1");
		move_uploaded_file($tmp_product_image2,"./product_images/$product_image2");

		//Insert Query
		$insert_query="INSERT INTO `products_tb`(product_title, product_price, product_detail, brand_id, cat_id, product_image1, product_image2)
		VALUES('$product_title', '$product_price','$product_detail', '$product_brand', '$product_cat', '$product_image1', '$product_image2')";
		$run_query=mysqli_query($con, $insert_query);
		if($run_query){
			echo "<script>alert('Produce Inserted!') </script>";
		}
	}
}

?>

<form action="" method="POST" enctype="multipart/form-data">
	<div class="input-group mb-3">
	  <span class="input-group-text" id="basic-addon1">Product Title</span>
	  <input type="text" class="form-control" name="product_title" placeholder="Enter Product Name">
	</div>

	<div class="input-group mb-3">
	  <span class="input-group-text" id="basic-addon1">Product Price</span>
	  <input type="text" class="form-control" name="product_price" placeholder="Enter Product Price">
	</div>

	<div class="input-group mb-3">
	  <span class="input-group-text" id="basic-addon1">Product Detail</span>
	  <input type="text" class="form-control" name="product_detail" placeholder="Enter Product Detail">
	</div>

	<!-- Categories -->
	<div class="input-group mb-3">
	  <span class="input-group-text" id="basic-addon1">Select Category</span>
	  <select name="product_cat" id="" class="form-select">
	  	<?php
	  	$select_query = "SELECT * FROM `cat_tb`";
	  	$run = mysqli_query($con, $select_query);
	  	while($row=mysqli_fetch_assoc($run)){
	  		$cat_title = $row['cat_title'];
	  		$cat_id = $row['cat_id'];
	  		echo "<option value='$cat_id'> $cat_title </option>";
	  	}
	  	?>
	  </select>
	</div>

	<!-- Brands -->
	<div class="input-group mb-3">
	  <span class="input-group-text" id="basic-addon1">Select Brand</span>
	  <select name="product_brand" id="" class="form-select">
	  	<?php
	  	$select_query = "SELECT * FROM `brand_tb`";
	  	$run = mysqli_query($con, $select_query);
	  	while($row=mysqli_fetch_assoc($run)){
	  		$brand_title = $row['brand_title'];
	  		$brand_id = $row['brand_id'];
	  		echo "<option value='$brand_id'> $brand_title </option>";
	  	}
	  	?>
	  </select>
	</div>

	<div class="input-group mb-3">
	  <span class="input-group-text" id="basic-addon1">Product Image 1</span>
	  <input type="file" class="form-control" name="product_image_1">
	</div>

	<div class="input-group mb-3">
	  <span class="input-group-text" id="basic-addon1">Product Image 2</span>
	  <input type="file" class="form-control" name="product_image_2">
	</div>

	<div class="input-group mb-3 w-10">
	  <input type="submit" class="form-control bg-success w-10" name="insert_product_btn" value="Insert product">
	</div>
</form>