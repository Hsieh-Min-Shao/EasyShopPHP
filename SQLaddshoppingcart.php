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
			$row=mysqli_fetch_assoc($result);
			
			$book_id=$row['id'];
			$name=$row['name'];
			$price=$row['price'];
			$picture=$row['picture'];
			$seller=$row['seller'];
			
			
			
			$Aintosql = "insert into cart values(null,'1','{$book_id}','1','{$name}','{$price}','{$picture}','{$seller}')";
			$ASQLresult=mysqli_query($link,$Aintosql);	
			
			$outputsql="select * from cart where book_id={$book_id} AND user_id=1 ";
			$OSQLresult=mysqli_query($link,$outputsql);
			$Arow=mysqli_fetch_assoc($OSQLresult);
			
			
			
			$id=$Arow['ID'];
			
			
			echo $id;
			echo $Arow['book_id'];
			
			
			if (!$OSQLresult) {
			echo "fuck1111";	
			exit();
			}
			
			
			$sqlnum["num"]=0;
			echo $sqlnum["num"];
			
							
			
			
			if(mysqli_num_rows($OSQLresult)==0){
				
				
				$intosql = "insert into cart values('null','1','{$book_id}','1','{$name}','{$price}','{$picture}','{$seller}') where id={$id} ";
				$SQLresult=mysqli_query($link,$intosql);
				echo "1";
			
			}else{
				$sqlnum["num"]=$sqlnum["num"]+2;
				$intosql = "insert into cart values('null','1','{$book_id}','{$sqlnum["num"]}','{$name}','{$price}','{$picture}','{$seller}') where id={$id}";
				$SQLresult=mysqli_query($link,$intosql);
				echo "0";
				echo $sqlnum["num"];
				
			}
			
			
			
			//echo "<script>alert('加入成功');location.href='http://localhost/YouTube%20teach/index.php'</script>";
			
			
			?>
		
		
		</center>
	</body>
</html>