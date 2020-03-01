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
	<?php include("header.php"); ?>
	<center>
		<a href="post.php"><button>Post topic</button></a><br/><br/>
	<?php echo '<table border ="1px;">';?>
			<tr> <td><span>ID</span> </td>
					<td width="400px;" style="text-align: center" > Name </td>
					<td width="80px;" style="text-align: center" > View </td>
					<td width="80px;" style="text-align: center" > Creator </td>
					<td width="80px;" style="text-align: center" > Date </td>
			</tr>
	
	</center>
</body>
</html>

<?php
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
			die("kết nối thất bại " . $conn->connect_error);
		} 
	$sql = "SELECT * FROM topics";
	$result = $conn->query($sql);
	if(!@$_GET['date']){
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id=$row['topic_id'];
			echo "<tr>";
			echo "<td>".$row['topic_id']."</td>";
			echo "<td style='text-align:center;'><a href='topic.php?id=$id'>".$row['topic_name']."</a></td>";
			echo "<td>".$row['view']."</td>";
			$query_u = "SELECT * FROM users WHERE username='".$row['topic_creator']."'";
			$results_u = mysqli_query($db, $query_u);
			$i=0;
			while($row_u=mysqli_fetch_assoc($results_u)){
						$user_id=$row_u['id'];
						$i=$i+1;
			}
			if($i==0) $user_id=1000;
			echo "<td><a href='profile.php?id=$user_id'>".$row['topic_creator']."</a></td>";
			$get_date=$row['date'];
			echo "<td><a href='index.php?date=$get_date'>".$row['date']."</a></td>";
			echo "</tr>";
			
    }
}else {
		echo "Không bài viết";
	}
}
	
	
	if(@$_GET['date']){
		$query_d = "SELECT * FROM topics WHERE date='".$_GET['date']."'";
		$results_d = mysqli_query($db, $query_d);
		while($row_d=mysqli_fetch_assoc($results_d)){
			echo "<tr>";
			echo "<td>".$row_d['topic_id']."</td>";
			echo "<td style='text-align:center;'><a href='topic.php?id=$id'>".$row_d['topic_name']."</a></td>";
			echo "<td>".$row_d['view']."</td>";
			$query_u = "SELECT * FROM users WHERE username='".$row_d['topic_creator']."'";
			$results_u = mysqli_query($db, $query_u);
			$i=0;
			while($row_u=mysqli_fetch_assoc($results_u)){
				$user_id=$row_u['id'];
				$i=$i+1;
			}
			if($i==0) $user_id=1000;
			echo "<td><a href='profile.php?id=$user_id'>".$row_d['topic_creator']."</a></td>";
			$get_date=$row_d['date'];
			echo "<td><a href='index.php?date=$get_date'>".$row_d['date']."</a></td>";
			echo "</tr>";
			

		}
	}
echo "</table>";
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