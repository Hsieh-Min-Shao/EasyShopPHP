<?php
	session_start();

?>
<html>
	
	<body>
		<center>
		
		<h3><h3>
		
		
			<?php
			 require("dbconfig.php");
			$link = @mysqli_connect(HOST,USER,PASS)or die("數據庫連接失敗");
			mysqli_select_db($link,DBNAME);
			
			$sql="select * from book where id={$_GET['id']}";
			$result = mysqli_query($link,$sql);
			
			if(empty($result) || mysqli_num_rows($result)==0){
				die("沒有找到要購買的訊息!");
			}else{
				$shop = mysqli_fetch_assoc($result);
			}
			
			$shop["num"]=1;
			
			if(isset($_SESSION["shoplist"][$shop['id']])){
				$_SESSION["shoplist"][$shop['id']]["num"]++;
				echo "<script>alert('加入成功');location.href='http://localhost/YouTube%20teach/index.php'</script>";
			}else{
				$_SESSION["shoplist"][$shop['id']]=$shop;
				echo "<script>alert('加入成功');location.href='http://localhost/YouTube%20teach/index.php'</script>";
			}
			?>
		
		
		</center>
	</body>
</html>