<?php 
	if(isset($_GET['ma'])){
		$ma = $_GET['ma'];

		$query =  "DELETE FROM students WHERE maSV = '". $ma."'";

		$conn->query($query);

		header("location: index.php?act=list");
	}else{
		header("location: index.php?act=list");
	}
?>