<?php

	session_start();
	require('connect.php');
	if ($_SESSION['username']) {
?>
<html>
<head>
	<title>Trang chủ</title>
</head>
<body>
	<center><h1> Diễn đàn </h1></center>
	<?php include("header.php"); 
	$i=1;
	$baocao=array();
// tạo connection
	
	$conn = new mysqli($servername, $username, $password, $dbname);
// kiểm connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
 
	$sql = "SELECT id, classname, userbaocao,tong FROM baocao";
	$result = $conn->query($sql);
 
	if ($result->num_rows > 0) {
    // output dữ liệu trên trang
    while($row = $result->fetch_assoc()) {
		$userbaocao=$row["userbaocao"];
		$query_u = "SELECT * FROM users WHERE username='$userbaocao'";
		$results_u = mysqli_query($db, $query_u);
		if (mysqli_num_rows($results_u) !=0) {
			while($row_u = mysqli_fetch_assoc($results_u)){
					$user_id=$row_u['id'];
				}
		}
		$new_baocao = array
		(
		'STT' => $row["id"],
		'classname' => $row["classname"],
		'tong' => $row["tong"],
		'userbaocao'=> $row["userbaocao"]
		);
		$baocao[] = $new_baocao;
    }
}	
 else {
    echo "0 results";
}
	

	function storey_sort($classname_a, $classname_b) {
    return $classname_a["tong"] - $classname_b["tong"];
}
	usort($baocao, "storey_sort");
	foreach($baocao as $top_tong) {
    list($STT, $classname, $tong) = array_values($top_tong);
    echo "Lớp xếp thứ ".$i. " Số thứ tự : " .$STT." thuộc lớp :  ".$classname." co tong so diem la : ".$tong.". Xung kích liên quan <a href='profile.php?id=$user_id'>". $userbaocao." </a><br/><br/>";$i=$i+1;
}

$conn->close();
	?>
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
