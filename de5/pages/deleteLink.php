<?php
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$query =  "DELETE FROM link_web WHERE id = '". $id."'";

		$conn->query($query);

		header("location: index.php?act=listLink");
	}else{
		header("location: index.php?listLink");
	}

 ?>