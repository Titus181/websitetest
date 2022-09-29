<?php
	session_start();
	mb_internal_encoding('utf-8');
	//$_POST使用者名稱和密碼
	$username = $_POST['username'];
	$password = $_POST['password'];
	//連線mysql
	$con = mysqli_connect('localhost','root','', 'test');
	//驗證mysql連線是否成功
	if(mysqli_errno($con)){
   
       
		echo "連線mysql失敗：".mysqli_error($con);
		exit;
	}
	//sql查詢語句
	$sql = "select user_id from test where username='$username' and password='$password'";
	//執行
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result); // 函式返回結果集中行的數量
	if($num){
   
       
		echo "<script>alert('登入成功');</script>";
	} else{
   
       
		echo "<script>alert('登入失敗，不存在此使用者');</script>";
	}
	
	$row = mysqli_fetch_assoc($result);
	$_SESSION['userid'] = $row['user_id']; // session
	
	mysqli_close($con);
	
	echo "<script>window.location.href = 'show.php'</script>";
?>
