<?php

	session_start();
	
	$id=$_GET['id'];
	$num=$_GET['num'];
	
	$_SESSION["shoplist"][$id]["num"]+=$num;
	
	if($_SESSION["shoplist"][$id]["num"]<1){
		
		$_SESSION["shoplist"][$id]["num"]=1;
		
	}
	
	
	
	header('Location: http://localhost/YouTube%20teach/mycart.php');
?>