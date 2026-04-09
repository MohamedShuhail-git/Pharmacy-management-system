<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    
	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../includes/css/style.css">
</head>
<body>
	<!-- Navbar: START -->
	<div class="container-fluid p-0">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<h3>LOGO</h3>
			<nav class="navbar navbar-expand-lg">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="#">Welcome Admin</a>
					</li>
				</ul>
			</nav>
		</nav>
		<!-- Navbar: END -->

		<div class="bg-light">
			<h3 class="text-center">Manage Products and Brands</h3>
		</div>

		<!-- Action Buttons: START -->
		<div class="row">
			<div class="col-md-12">
				<div class="button text-center">
					<button> <a href="index.php?insert_brand" class="nav-link p-1"> Insert Brand </a> </button>
					<button> <a href="index.php?insert_cat" class="nav-link p-1"> Insert Category </a> </button>
					<button> <a href="index.php?insert_product" class="nav-link p-1"> Insert Product </a> </button>
				</div> 
			</div>
		</div>
		<!-- Action Buttons: END -->
	</div>


	<!-- View Pages: START -->
	<div class="container mt-4">
		<?php
		
		if(isset($_GET['insert_brand'])){
			include('insert_brand.php');
		}

		if(isset($_GET['insert_cat'])){
			include('insert_cat.php');
		}

		if(isset($_GET['insert_product'])){
			include('insert_product.php');
		}

		?>
	</div>
	<!-- View Pages: END -->
	
</body>
</html>