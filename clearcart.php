<?php

	session_start();
	
	if($_GET['id']){
		
		unset($_SESSION["shoplist"][$_GET['id']]);
		echo "<script>alert('刪除成功');location.href='http://localhost/YouTube%20teach/mycart.php'</script>";
		
	}else{
	
		unset($_SESSION["shoplist"]);
		echo "<script>alert('刪除成功');location.href='http://localhost/YouTube%20teach/index.php'</script>";
		
	}
	
?>