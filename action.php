<?php

	session_start();

	require("dbconfig.php");
	require("function.php");
	
	$link = mysqli_connect(HOST,USER,PASS) or die ("數據庫失敗!");
	mysqli_select_db($link,DBNAME);

	switch($_GET["action"]){
		case "add":
		$name = $_POST["name"];
		$price = $_POST["price"];
		$seller = $_POST["seller"];
		$addtime = time();
		
		if(empty($name)){
			die("商品需要有值");
		}
		
		$upinfo = uploadFile("picture","./upload/");
		if($upinfo["error"]===false){
			die("圖片訊息上傳失敗 原因：".$upinfo["info"]);
		}else{
			$picture=$upinfo["info"];
		}
		
		ImageUpdateSize('./upload/'.$picture,100,100);
		
		$sql = "insert into book values(null,'{$name}','{$price}','{$picture}','{$seller}')";
		echo $sql;
		mysqli_query($link,$sql);
		
		if(mysqli_insert_id($link)>0){
			echo "<script>alert('商品發布成功');location.href='http://localhost/YouTube%20teach/index.php'</script>";
		}else{
			echo"商品發布失敗!".mysqli_error();
		}
		echo "<br/><a href='index.php'>查看商品訊息<a>";
		break;
		
		case "del":
		
		$sql = "delete from book where id = {$_GET['id']}";
		mysqli_query($link,$sql);
		
		if(mysqli_affected_rows($link)>0){
			@unlink("./upload/".$_GET['picname']);
			unlink("./upload/s_".$_GET['picname']);
		}
		
		unset($_SESSION["shoplist"][$_GET['id']]);
		
		echo "<script>alert('刪除成功');location.href='http://localhost/YouTube%20teach/index.php'</script>";
		
		break;
		
		case "update":
		
		$name = $_POST["name"];
		$price = $_POST["price"];
		$seller = $_POST["seller"];
		$id = $_POST['id'];
		$picture = $_POST['oldpicture'];
		
		if(empty($name)){
			die("商品需要有值");
		}
		
		if($_FILES['picture']['error']!=4){
		$upinfo = uploadFile("picture","./upload/");
		
			if($upinfo["error"]===false){
				die("圖片訊息上傳失敗 原因：".$upinfo["info"]);
			}else{
				$picture=$upinfo["info"];
				
				ImageUpdateSize('./upload/'.$picture,100,100);
			}	
		}
		
		$sql = "update book set name='{$name}',price='{$price}',seller='{$seller}',picture='{$picture}' where id={$id}";
		
		mysqli_query($link,$sql);
		
		if(mysqli_affected_rows($link)>0){
			if($_FILES['picture']['error']!=4){
			
				@unlink("./upload/".$_POST['oldpicture']);
				unlink("./upload/s_".$_POST['oldpicture']);
			}
			
			
			echo "<script>alert('修改成功');location.href='http://localhost/YouTube%20teach/index.php'</script>";
		}else{
			echo "<script>alert('修改失敗');location.href='http://localhost/YouTube%20teach/index.php'</script>";
		}
		break;
	}

mysqli_close($link);


//<script language="JavaScript">alert("提示內容";location.href='http://localhost/YouTube%20teach/index.php')</script>"

?>