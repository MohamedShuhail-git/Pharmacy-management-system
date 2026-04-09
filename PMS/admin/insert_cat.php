<?php
	include('../includes/config.php');

	if(isset($_POST['insert_cat_btn'])){
		$cat_title=$_POST['cat_title'];
		$insert_query="INSERT INTO `cat_tb`(cat_title) VALUES('$cat_title')";
		$run_query=mysqli_query($con, $insert_query);

		if($run_query){
			echo "<script> alert('Category Inserted Successfully') </script>";
		}
	}
?>

<form action="" method="POST">
	<div class="input-group mb-3">
	  <span class="input-group-text" id="basic-addon1">Category Name</span>
	  <input type="text" class="form-control" name="cat_title" placeholder="Enter Category Name">
	</div>

	<div class="input-group mb-3 w-10">
	  <input type="submit" class="form-control bg-success w-10" name="insert_cat_btn" value="Insert Category">
	</div>
</form>


<!-- View Existing Categories -->
<div class="mt-5">
	<h4> Existing Categories</h4>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Category Name</th>	
			</tr>
		</thead>
		<tbody>
			<?php
				$select_query="SELECT * FROM `cat_tb`";
				$run_select_query=mysqli_query($con, $select_query);
				$num_of_rows=mysqli_num_rows($run_select_query); //Count rows

				if($num_of_rows>0){
					while($row=mysqli_fetch_assoc($run_select_query)){
						echo "<tr>";
						echo "<td>".$row['cat_id']."</td>";
						echo "<td>".$row['cat_title']."</td>";
						echo "</tr>";
					}
				}

			?>
		</tbody>
	</table>
</div>