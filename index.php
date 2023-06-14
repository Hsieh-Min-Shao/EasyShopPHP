<html>
	<head>
		<title>商品信息管理</title>
	</head>
	<body>
		<center>
		<?php include("menu.php");?>
		<h3>瀏覽商品訊息<h3>
		
		<table border="1" width="700">
			<tr>
				<th>商品編號</th>
				<th>商品名稱</th>
				<th>價錢</th>
				<th>圖片</th>
				<th>賣家</th>
				<!--<th>添加時間</th> -->
				<th>操作</th>
			</tr>
			<?php
			 require("dbconfig.php");
			$link = @mysqli_connect(HOST,USER,PASS)or die("數據庫連接失敗");
			mysqli_select_db($link,DBNAME);
			
			$sql="select * from book";
			$result = mysqli_query($link,$sql);
			
			while($row=mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td align='center'>{$row['id']}</td>";
				echo "<td align='center'>{$row['name']}</td>";
				echo "<td align='center'>{$row['price']}</td>";
				echo "<td align='center'><img src='./upload/s_{$row['picture']}'></td>";
				echo "<td align='center'>{$row['seller']}</td>";
				//echo "<td>".DateTime('Y- m - d  H : i : s')."</td>";
				echo "  <td>
							<a href='action.php?action=del&id={$row['id']}&picname={$row['picture']}'> 刪除 </a>	
							<a href='eidt.php?action=del&id={$row['id']}'>修改</a>
							<a href='addshoppingcart.php?id={$row['id']}'>放入購物車</a>
						</td>";
				echo "</tr>";
			}
			
			?>
		</table>
		
		</center>
	</body>
</html>