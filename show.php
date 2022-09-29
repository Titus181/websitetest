<?php
	session_start();
	$userid = $_SESSION['userid'];
	//連線mysql
	$con = mysqli_connect('localhost','root','', 'gamesweb');
	//驗證mysql連線是否成功
	if(mysqli_errno($con)){
   
       
		echo "連線mysql失敗：".mysqli_error($con);
		exit;
	}
	//sql查詢語句
	$sql = "select username, talk from test where user_id='{
     
         $userid}'";
	//執行
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$name = $row['username'];
	$talk= $row['talk'];
	mysqli_close($con);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>使用者資訊</title>
	</head>
	
	<body>
		<p>
			使用者名稱：
			<?php  
				echo $name;
			?>
		</p>
		
		<p>
			個人簡介：
			<?php  
				echo $talk;
			?>
		</p>
	</body>
</html>
