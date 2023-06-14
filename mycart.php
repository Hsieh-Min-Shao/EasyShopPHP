<?php
	session_start();

?>
<html>
	<head>
		<title>商品信息管理</title>
	</head>
	<body>
		<center>
			<?php include("menu.php");?>
			<h3>查看我的購物車<h3>
			
			<table border="1" width="600">
				<tr>
					
					<th>商品ID</th><th>商品名稱</th><th>商品價錢</th>
					<th>商品圖片</th><th>商品賣家</th>
					<th>數量</th><th>小計</th><th>操作</th>
				</tr>
				
				<?php
						$sum = 0;
				    if(isset($_SESSION["shoplist"])){
					
						foreach($_SESSION["shoplist"] as $v){	
						echo "<tr>";
						echo "<td align='center'>{$v['id']}</td>";
						echo "<td align='center'>{$v['name']}</td>";
						echo "<td align='center'>{$v['price']}</td>";
						echo "<td align='center'><img src='./upload/s_{$v['picture']}'/></td>";
						echo "<td align='center'>{$v['seller']}</td>";
						echo "  <td align='center'>
									<button onclick='window.location.href=\"updatecart.php?id={$v['id']}&num=-1\"'>-</button>
									{$v['num']}
									<button onclick='window.location.href=\"updatecart.php?id={$v['id']}&num=+1\"'>+</button>
								</td>";
						echo "<td>".($v['price']*$v['num'])."</td>";
						echo "<td align='center'><a href='clearcart.php?id={$v['id']}'>刪除</a></td>";
						echo "</tr>";
						
						$sum+=$v['price']*$v['num'];
						
						}
					}
				?>
				
				<tr>
					<th>總計金額：</th>
					<th colspan="6" align = "right"><?php echo $sum; ?></th>
					<th>&nbsp;</th>
				</tr>
				
			</table>
		</center>
	</body>
</html>