<?php
	include("./dbconnection.php");
	echo $_POST["username"];
	echo $_POST["pass"];
	$sql = "SELECT * FROM `admin` WHERE `Name` ='".$_POST["username"]."' AND `Password` = '".$_POST["pass"]."';";
	$result = mysqli_query($conn,$sql); 
	if($result->num_rows>0){
		header("Location: adminpanel.html");
	}else{
		echo "<script>alert('INVALID LOGIN !!!');window.location.href = 'login.html';</script>";
	}
?>