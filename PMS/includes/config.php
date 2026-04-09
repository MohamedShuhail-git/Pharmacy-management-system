<?php

	$server="localhost";
	$username="root";
	$password="";
	$db="pdb";

	$con=mysqli_connect($server, $username, $password, $db);

	if(!$con){
		die(mysqli_error($con));
	}
?>