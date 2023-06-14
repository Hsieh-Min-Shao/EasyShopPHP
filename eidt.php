<html>
	<head>
	<title>商品信息管理</title>
	
	</head>
	<body>
		<center>
		<?php include("menu.php") ;
		
			require("dbconfig.php");
			$link = @mysqli_connect(HOST,USER,PASS)or die("數據庫連接失敗");
			mysqli_select_db($link,DBNAME);
			
			$sql="select * from book where id={$_GET['id']}";
			$result = mysqli_query($link,$sql);
		
			if($result && mysqli_num_rows($result)>0){
				$shop = mysqli_fetch_assoc($result);
			}else(
				die("沒有找到要修改的商品訊息")
			)
		
		
		?>
		<h3>編輯商品訊息<h3>
		
		<form action="action.php?action=update" enctype="multipart/form-data" method="post"> 
			<input type="hidden" name="id"	value="<?php echo $shop['id']; ?>"/>
			<input type="hidden" name="oldpicture"	value="<?php echo $shop['picture']; ?>"/>
		
		<table border = "0" width = "700">
			<tr>
				<td align="right">名稱：</td>
				<td><input type = "text" name = "name" value="<?php echo $shop['name']; ?>" </td>
			</tr>
			
			<tr>
				<td align="right">價錢：</td>
				<td><input type = "text" name = "price" value="<?php echo $shop['price']; ?>" </td>
			</tr>
			
			<tr>
				<td align="right">圖片：</td>
				<td><input type = "file" name = "picture" </td>
			</tr>
			
			<tr>
				<td align="right">賣家：</td>
				<td><input type = "text" name = "seller" value="<?php echo $shop['seller']; ?>" </td>
			</tr>
			
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value="修改"/>&nbsp;&nbsp;&nbsp;
				<input type="reset" value="重製"/>
				</td>
				
			</tr>
			
			<tr>
				<td align="right" valign = "top">&nbsp;</td>
				<td><img src = "./upload/<?php echo $shop['picture']?>"</td>
			</tr>
			
			</table>
			
			</form>
			
		</center>
	</body>



</html>