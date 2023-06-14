<html>
	<head>
	<title>商品信息管理</title>
	
	</head>
	<body>
		<center>
		<?php include("menu.php") ?>
		<h3>發布商品訊息<h3>
		
		<form action="action.php?action=add" enctype="multipart/form-data" method="post"> 
		
		<table border = "0" width = "400">
			<tr>
				<td align="right">名稱：</td>
				<td><input type = "text" name = "name"</td>
			</tr>
			
			<tr>
				<td align="right">價錢：</td>
				<td><input type = "text" name = "price"</td>
			</tr>
			
			<tr>
				<td align="right">圖片：</td>
				<td><input type = "file" name = "picture"</td>
			</tr>
			
			<tr>
				<td align="right">賣家：</td>
				<td><input type = "text" name = "seller"</td>
			</tr>
			
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value="添加"/>&nbsp;&nbsp;&nbsp;
				<input type="reset" value="重製"/>
				</td>
				
			</tr>
			
			</table>
			
			</form>
			
		</center>
	</body>



</html>