<?php
	require('connect.php');
	if(@$_SESSION['username']){
		
?>

	<center><a href ="index.php">Trang chủ</a> | <a href ="account.php">Tài khoản</a> | <a href ="members.php">Thành viên</a> | <a href ="baocao.php">Báo cáo</a> | <a href ="xephang.php">Xếp hạng</a> | <?php 
	$query = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
	$results = mysqli_query($db, $query);
	$rows= mysqli_num_rows($results);
	while($row = mysqli_fetch_assoc($results)){
		$id= $row["id"];
	}
	echo "Đăng nhập với tư cách là <a href='profile.php?id=$id'>"; 
	echo $_SESSION['username']."</a> | ";
	?>
	<a href ="index.php?action=logout">Đăng xuất</a><br/>

<?php
	}else
	{
		header("Location: Login.php");
	}		
?>