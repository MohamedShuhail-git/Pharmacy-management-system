<?php
	include('../includes/config.php');

	if(isset($_POST['insert_brand_btn'])){
		$brand_title=$_POST['brand_title'];
		$insert_query="INSERT INTO `brand_tb`(brand_title) VALUES('$brand_title')";
		$run_query=mysqli_query($con, $insert_query);

		if($run_query){
			echo "<script> alert('Brand Inserted Successfully') </script>";
		}
	}
?>

<!-- Add new Brands form -->
<form action="" method="POST">
	<div class="input-group mb-3">
	  <span class="input-group-text" id="basic-addon1">Brand Name</span>
	  <input type="text" class="form-control" name="brand_title" placeholder="Enter Brand Name">
	</div>

	<div class="input-group mb-3 w-10">
	  <input type="submit" class="form-control bg-success w-10" name="insert_brand_btn" value="Insert Brand">
	</div>
</form>

<!-- View Existing Brands -->
<div class="mt-5">
	<h4> Existing Brands</h4>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Brand Name</th>	
			</tr>
		</thead>
		<tbody>
			<?php
				$select_query="SELECT * FROM `brand_tb`";
				$run_select_query=mysqli_query($con, $select_query);
				$num_of_rows=mysqli_num_rows($run_select_query); //Count rows

				if($num_of_rows>0){
					while($row=mysqli_fetch_assoc($run_select_query)){
						echo "<tr>";
						echo "<td>".$row['brand_id']."</td>";
						echo "<td>".$row['brand_title']."</td>";
						echo "</tr>";
					}
				}

			?>
		</tbody>
	</table>
</div>