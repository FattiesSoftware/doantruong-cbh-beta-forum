<?php 
	session_start();
	require('connect.php');
	if ($_SESSION['username']) {
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$errors = array(); 
	if(empty($_POST['pay'])){
		$error['pay']= "Bạn cần chọn lớp báo cáo";
	}
	$tong=0;
	$pay="";
	$list_cat= array (
		1=>"Loi 1",
		2=>"Loi 2",
		3=>"Loi 3",
	);
	//$date=date("d-m-Y H:i:s");
	$date=date("Y-m-d");
	if(isset($_POST['pay'])){
		$pay=$_POST['pay'];
	}
	
	if(isset($_POST['cat'])){
		foreach($_POST['cat'] as $v){
			if ($list_cat[$v]=="Loi 1") $tong=$tong+5;
			if ($list_cat[$v]=="Loi 2") $tong=$tong+5;
			if ($list_cat[$v]=="Loi 3") $tong=$tong+5;
		}
	}
	if (empty($error['pay'])) {
			$query = "INSERT INTO baocao (classname,tong,userbaocao,date) 
					  VALUES('$pay','$tong','".$_SESSION['username']."','$date')";
			mysqli_query($db, $query);
			
			echo "Báo cáo thành công !<br/>";
			//header('location: index.php');
	}
		
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset ="uft-8"> 
	<title>Báo cáo</title>

</head>
<body>
	<center><h1> Báo cáo </h1></center>
	<?php include("header.php"); ?>
	<form action="" method="POST">
		<select name="pay">  
			<option value="">--Chọn tên lớp--</option>
			<option <?php if(isset($pay)&& $pay=='9A1') echo "selected=\"selected\""; ?> value="9A1">Lớp 9A1 </option>
			<option <?php if(isset($pay)&& $pay=='9A2') echo "selected=\"selected\""; ?> value="9A2">Lớp 9A2 </option>
		</select><br/><br/>
		<!--<label>Tên lớp</label>
		<input type="text" name="classname" value="<?php echo $classname; ?>"><br/><br/>-->
		<input type="checkbox" name="cat[]" value="1" id="cat_1">
		<label for=cat_1">Lỗi 1</label><br/><br/>
		<input type="checkbox" name="cat[]" value="2" id="cat_2">
		<label for=cat_2">Lỗi 2</label><br/><br/>
		<input type="checkbox" name="cat[]" value="3" id="cat_3">
		<label for=cat_3">Lỗi 3</label><br/><br/>
		<span style="color : red;"> <?php if(isset($error['pay'])) echo $error['pay']; ?> </span><br/><br/>
		<input type="submit" name="add_post" value="Gửi thông tin">
	</form>
</body>
</html>
<?php

	if(@$_GET['action']=="logout")
	{
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
	}else {
		echo " bạn cần đăng nhập ";
		header('location: login.php');
	}
?>